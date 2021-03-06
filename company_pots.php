<?php
  require("connection/bd_connection.php");
  require("func/func.php");
?>
<!DOCUMENT html>
<html>
  <head>
    <meta charset="utf-8">
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" href="css/materialize.css" />
     <link rel="stylesheet" href="css/style.css"/>


     <style>
      #div_background{
        background-image: url("images/marmita.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
      }

      #cep{
        background-color: #fff;
        border-radius: 5px;
        width: 30%;
        padding-left: 15px;
      }

      #btn_buscar{
        height:40px;
      }
     </style>

  </head>
  <body>
    <?php echo menu()?>

    <div class="row">
      <div class="col s12" >

      <?php
      $i =  $_GET['i'];

      $SQL = "SELECT * FROM pots WHERE MD5(id_user) = '$i' AND entry_date=CURDATE()";      $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
        if($result){
          if(mysqli_num_rows($result) > 0){
            ?>
            <div class="col s12 ">
              <h4> Opções de hoje: </h4>
            </div>
            <?php
            ?>
              <?php
                while($linha = mysqli_fetch_assoc($result)){
                    ?>
                     <div class="col s12 m6">
                      <div class="card  ">
                        <div class="card-content">
                          <span class="card-title">Opção <?php echo $linha['id'] ?></span>
                          Tipo de arroz
                          <ol>
                           <?php
                           $SQLarroz = "SELECT * from pots_rice WHERE id_pot='".$linha['id']."'";
                           $result_rice = mysqli_query($con, $SQLarroz) or die(mysql_error($con));
                            while($linha_rice = mysqli_fetch_assoc($result_rice)){
                              echo "<li>".$linha_rice['name']."</li>";
                            }
                           ?>
                         </ol><br>
                         Tipo de Feijões
                         <ol>
                          <?php
                          $SQLfeijao = "SELECT * from pots_beans WHERE id_pot='".$linha['id']."'";
                          $result_feijao = mysqli_query($con, $SQLfeijao) or die(mysql_error($con));
                           while($linha_feijao = mysqli_fetch_assoc($result_feijao)){
                             echo "<li>".$linha_feijao['name']."</li>";
                           }
                          ?>
                        </ol><br>
                        Tipo de Misturas
                        <ol>
                         <?php
                         $SQLmixture = "SELECT * from pots_mixture WHERE id_pot='".$linha['id']."'";
                         $result_mixture = mysqli_query($con, $SQLmixture) or die(mysql_error($con));
                          while($linha_mixture = mysqli_fetch_assoc($result_mixture)){
                            echo "<li>".$linha_mixture['name']."</li>";
                          }
                         ?>
                        </ol>
                        </div>
                        <div class="card-action">
                          <a href="pots_details.php?i=<?php echo md5($linha['id'])?>&i_u=<?php echo $i?> ">Ver mais</a>
                        </div>
                      </div>
                    </div>
                    <?php
                       }
                     }else {
                        ?>
                        <h4>Nenhum cardápio cadastrado no dia de hoje.</h4>
                        <?php
                     }
                   }else{
                     echo "deu ruim";
                   }
                 ?>


             </div>

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="components_sys/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="components_sys/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="components_sys/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
    $(document).ready(function(){
      $("#cep").inputmask('99999-999');

      $("#btn_buscar").on('click',function(){
        event.preventDefault();
        var vcep = $("#cep").val();
        var cep = vcep.replace("-","");
        $.getJSON("https://viacep.com.br/ws/"+cep+"/json/", function(jd) {
          console.log(jd);
          window.location = "searchnearby.php?nboor="+jd.bairro+"&city="+jd.localidade;
        })
        .fail(function() {
          alert("Nenhum endereço encontrado.");
          $("#div_addresses").fadeIn(200);
        });
      });
    });
    </script>
  </body>
</html>
