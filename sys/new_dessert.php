<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
   $dessert_name = $_POST['dessert_name'];
   $dessert_price = $_POST['dessert_price'];
   $qtd_dessert = $_POST['qtd_dessert'];


   $SQL = "INSERT INTO dessert(id_user, dessert_name, price, qtd_dessert, entry_date)
   VALUES('".$_SESSION['id_user']."', '$dessert_name', '$dessert_price', '$qtd_dessert', CURDATE())";
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
