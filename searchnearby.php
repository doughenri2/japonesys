<?php
  require("connection/bd_connection.php");
  session_start();

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
      <div class="col s6" >

      <?php
      $nboor =  $_GET['nboor'];

      // $SQL = "SELECT id_user FROM user_f  WHERE nboor like '%$nboor%' UNION SELECT id_user FROM user_j WHERE nboor like '%$nboor%'";
      $SQL = "SELECT * FROM
      (SELECT id_user,logo_address, user_name, start_hour, finish_hour, city, uf, street, number, nboor FROM user_f WHERE nboor = 'Vila betania'
        UNION
        SELECT id_user,logo_address, social_name, start_hour, finish_hour, city, uf, street, number, nboor as user_name FROM user_j WHERE nboor = 'Vila betania')
       AS t";
      $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
        if($result){
          if(mysqli_num_rows($result) > 0){
            ?>
            <div class="col s12 ">
              <h4> Restaurantes próximos a você: </h4>
            </div>
            <?php
            ?>
              <?php
                    while($linha = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="col s12 ">
                      <div class="card horizontal">
                        <div class="card-image">
                          <?php
                            if($linha['logo_address'] != ""){
                              ?>
                              <img src="sys/<?php echo $linha['logo_address']?>">
                              <?php
                            }else{
                              ?>
                              <img src="http://lorempixel.com/100/190/nature/6">
                              <?php
                            }
                           ?>
                        </div>
                        <div class="card-stacked">
                          <div class="card-content">
                            <h4> <?php echo utf8_encode($linha['user_name'])?> </h4>
                            <p><?php echo utf8_encode("Estado: ".$linha['uf']."<br> ".$linha['street'].", ".$linha['number'].", ".$linha['nboor'].", ".$linha['city'] ); ?> </p>
                          </div>
                          <div class="card-action">
                            <a href="company_pots.php?i=<?php echo md5($linha['id_user'])?>">Ver mais</a>
                          </div>
                        </div>
                      </div>
                    </div>
                        <?php
                       }
                     }else {
                       ?>
                       <h4>Nenhum estabelecimento perto</h4>

                       <?php
                     }
                   }else{
                     echo "Erro";
                   }
                 ?>
             </div>
             <div class="col s6"  >
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
