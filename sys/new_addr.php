<?php
  //require bc connection
  require("../connection/bd_connection.php");

  if(!empty($_POST)){
   $cep = $_POST['cep'];
   $city= $_POST['city'];
   $uf = $_POST['uf'];
   $number = $_POST['number'];
   $nboor = $_POST['nboor'];
   $complement = $_POST['complement'];
   $street = $_POST['street'];


   $SQL = "INSERT INTO adresses(id_user, cep, city, uf, street, number, complement)
   VALUES('".$_SESSION['id_user']."', '$cep', '$city', '$uf', '$street', '$number', '$complement')";
   $resultado = mysqli_query($con, $SQL) or die(mysqli_error($con));
   if($resultado){
     
   }


  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
