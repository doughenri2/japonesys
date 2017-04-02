<?php
  require("connection/bd_connection.php");
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
    <nav>
      <div class="nav-wrapper grey darken-4">
        <a href="#" class="brand-logo"><img src="images/logo.png" height="50" style="margin:8px;"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="sass.html">Como pedir</a></li>
          <li><a href="badges.html">Quem somos</a></li>
          <li class="active"><a href="sys/">Entrar</a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col s12" >

      <?php
      $i =  $_GET['i'];

      // $SQL = "SELECT id_user FROM user_f  WHERE nboor like '%$nboor%' UNION SELECT id_user FROM user_j WHERE nboor like '%$nboor%'";
      $SQL = "SELECT * FROM pots WHERE MD5(id_user) = '$i' AND entry_date=CURDATE()";
      $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
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
                     <div class="col s12 m12">
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
                          </ol>
                        </div>
                        <div class="card-action">
                          <a href="#">Ver mais</a>
                        </div>
                      </div>
                    </div>
                    <?php
                       }
                     }else {

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
