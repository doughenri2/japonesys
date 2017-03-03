<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
   $drink_name = $_POST['drink_name'];
   $drink_price = $_POST['drink_price'];
   $qtd_drink = $_POST['qtd_drink'];


   $SQL = "INSERT INTO drinks(id_user, drink_name, drink_price, qtd_drink)
   VALUES('".$_SESSION['id_user']."', '$drink_name', '$drink_price', '$qtd_drink')";
   $resultado = mysqli_query($con, $SQL) or die(mysqli_error($con));
   if($resultado){
     $array = array("message" => "Cadastrado com sucesso.", "status" => true);
     echo json_encode($array);
   }else{
     $array = array("message" => "Erro ao cadastrar.", "status" => false);
     echo json_encode($array);
   }
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
