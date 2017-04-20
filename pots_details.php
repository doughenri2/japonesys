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
      <div class="col s12">
        <?php
        $i =  $_GET['i'];
        ?>
        <div class="card">
        <div class="card-content">
        <center>  <h4> Montar marmita </h4> </center>
          <p>Vamos lá! Selecione as opções e finalize o pedido! ;) </p><br>
          <form action="create_request_post/" method="post" id='new_pot_request'>
          <label> Selecione o arroz </label>
          <br>
           <select class="browser-default" id="rice"  name='rice'>
             <option value="0"> SELECIONE </option>
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
         <label> Selecione o feijão </label>
         <br>
          <select class="browser-default" id="beans" name='beans' >
            <option value="0"> SELECIONE </option>
           <?php
           $SQL_feijao = "SELECT * FROM pots_beans WHERE MD5(id_pot) = '$i'";
            $result_feijao = mysqli_query($con, $SQL_feijao) or die(mysqli_error());
            while($linha_feijao = mysqli_fetch_assoc($result_feijao)){
              ?>
              <option value="<?php echo $linha_feijao['id']?>"><?php echo $linha_feijao['name']?></option>
              <?php
            }
           ?>
        </select>
        <br>
        <label> Selecione a guarnição </label>
        <br>
         <select class="browser-default" id="garrison" name='garrison'>
           <option value="0"> SELECIONE </option>
          <?php
          $SQL_feijao = "SELECT * FROM pots_garrison WHERE MD5(id_pot) = '$i'";
           $result_feijao = mysqli_query($con, $SQL_feijao) or die(mysqli_error());
           while($linha_feijao = mysqli_fetch_assoc($result_feijao)){
             ?>
             <option value="<?php echo $linha_feijao['id']?>"><?php echo $linha_feijao['name']?></option>
             <?php
           }
          ?>
       </select>
       <br>
       <label> Selecione a sua mistura </label>
       <br>
        <select class="browser-default"  id="mixture" name='mixture' >
          <option value="0"> SELECIONE </option>
         <?php
         $SQL_feijao = "SELECT * FROM pots_mixture WHERE MD5(id_pot) = '$i'";
          $result_feijao = mysqli_query($con, $SQL_feijao) or die(mysqli_error());
          while($linha_feijao = mysqli_fetch_assoc($result_feijao)){
            ?>
            <option value="<?php echo $linha_feijao['id']?>"><?php echo $linha_feijao['name']?></option>
            <?php
          }
         ?>
      </select>
      <br>
      <label> Selecione a sua salada </label>
      <br>
       <select class="browser-default" id="salad" name='salad'>
         <option value="0"> SELECIONE </option>
        <?php
        $SQL_feijao = "SELECT * FROM pots_salad WHERE MD5(id_pot) = '$i'";
         $result_feijao = mysqli_query($con, $SQL_feijao) or die(mysqli_error());
         while($linha_feijao = mysqli_fetch_assoc($result_feijao)){
           ?>
           <option value="<?php echo $linha_feijao['id']?>"><?php echo $linha_feijao['name']?></option>
           <?php
         }
        ?>
     </select>

     <br>
     <label> Selecione a sua salada </label>
     <br>
      <select class="browser-default" id="drinks" name='drinks'>
        <option value="0"> SELECIONE </option>
       <?php
       $SQL_feijao = "SELECT * FROM drinks WHERE MD5(id_user) = '".$_GET['i_u']."'";
        $result_feijao = mysqli_query($con, $SQL_feijao) or die(mysqli_error());
        while($linha_feijao = mysqli_fetch_assoc($result_feijao)){
          ?>
          <option value="<?php echo $linha_feijao['id']?>"><?php echo $linha_feijao['drink_name']?></option>
          <?php
        }
       ?>
    </select>
     <br>
     <label> Selecione o tamanho </label>
     <br>
      <select class="browser-default" id="pots"  name='pots'>
        <option value="0"> SELECIONE </option>
       <?php
       $SQL_feijao = "SELECT * FROM pots WHERE MD5(id) = '$i'";
        $result_size = mysqli_query($con, $SQL_feijao) or die(mysqli_error());
        $linha_size = mysqli_fetch_assoc($result_size);
         ?>
         <option value='1'> MINI - R$ <?php echo str_replace(".", ",", $linha_size['mini_size'] ); ?> </option>
         <option value='2'> NORMAL - R$<?php echo str_replace(".", ",", $linha_size['normal_size']);?>  </option>
         <option value='3'> GRANDE - R$<?php echo  str_replace(".", ",", $linha_size['big_size']);?>  </option>
    </select>
    <br>
    <label> Selecione o sobremesa </label>
    <br>
    <select class="browser-default" id="drinks"  name='dessert'>
      <option value="0"> SELECIONE </option>
       <?php
       $SQL_feijao = "SELECT * FROM dessert WHERE MD5(id_user) = '".$_GET['i_u']."'";
        $result_feijao = mysqli_query($con, $SQL_feijao) or die(mysqli_error());
        while($linha_feijao = mysqli_fetch_assoc($result_feijao)){
          ?>
          <option value="<?php echo $linha_feijao['id']?>"><?php echo $linha_feijao['dessert_name']?></option>
          <?php
        }
       ?>
  </select>
  <br>

 
  <label> Digite o seu endereço </label>
  <textarea name="address">

  </textarea>
  <br>
    <br>
    <?php
    if(isset($_SESSION['name']) && $_SESSION['name']!=""){
      ?>
      <input type="hidden" value="<?php echo $_SESSION['id_user']?>" name='uid'>
      <input type='hidden' value="<?php echo $_GET['i_u']?>" name='company'>
      <button type="submit" class='btn btn-primary'> Solicitar </button>
      <?php
    }else {
      echo "<h4> Você deve logar para solicitar a marmita. </h4>";
    }
    ?>
   </form>
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
