<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
   $cep = $_POST['cep'];
   $city= $_POST['city'];
   $uf = $_POST['uf'];
   $number = $_POST['number'];
   $nboor = $_POST['nboor'];
   $complement = $_POST['complement'];
   $street = $_POST['street'];

   $SQL = "INSERT INTO adresses(id_user, cep, city, uf, street, number, neighborhood, complement)
   VALUES('".$_SESSION['id_user']."', '$cep', '$city', '$uf', '$street', '$number', '$nboor', '$complement')";
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
