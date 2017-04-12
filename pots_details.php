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
      <div class="col s6" >
        <?php
        $i =  $_GET['i'];
        ?>
        <div class="card">
        <div class="card-content">
          <h4> Montar marmita </h4>
          <p>Vamos lá! Selecione as opções e finalize o pedido! ;)
          </p>
        </div>
        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width">
            <li class="tab"><a href="#arroz">Comidas</a></li>

            <li class="tab"><a href="#bebida"> Bebida/ Sobremesa </a> </li>
          </ul>
        </div>
        <div class="card-content grey lighten-4">
          <div id="arroz">


            <label> Selecione o arroz </label>
            <br>
             <select class="browser-default" >
              <?php
               $SQL_arroz = "SELECT * FROM pots_rice WHERE MD5(id_pot) = '$i'";
               $result_arroz = mysqli_query($con, $SQL_arroz) or die(mysqli_error());
               while($linha_arroz = mysqli_fetch_assoc($result_arroz)){
                 ?>
                 <option value="<?php echo $linha_arroz['id']?>"><?php echo $linha_arroz['name']?></option>
                 <?php
               }
              ?>
           </select>

           <br>
           <label> Selecione o arroz </label>
           <br>
            <select class="browser-default" >
             <?php
              $SQL_feijao = "SELECT * FROM pots_bean WHERE MD5(id_pot) = '$i'";
              $result_feijao = mysqli_query($con, $SQL_feijao) or die(mysqli_error());
              while($linha_feijao = mysqli_fetch_assoc($result_feijao)){
                ?>
                <option value="<?php echo $linha_feijao['id']?>"><?php echo $linha_feijao['name']?></option>
                <?php
              }
             ?>
          </select>
          </div>
          <div id="bebida">Bebida</div>
        </div>
      </div>
      </div>
    </div><script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="components_sys/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="components_sys/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="components_sys/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
    $(document).ready(function(){
      $("#cep").inputmask('99999-999');
    });
    </script>
  </body>
</html>
