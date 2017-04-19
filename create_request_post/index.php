<?php

require("../connection/bd_connection.php");
if(!empty($_POST)){
  $rice = $_POST['rice'];
  $beans = $_POST['beans'];
  $garrison = $_POST['garrison'];
  $mixture = $_POST['mixture'];
  $salad = $_POST['salad'];
  $drinks = $_POST['drinks'];
  $pots = $_POST['pots'];
  $dessert = $_POST['dessert'];
  $uid = $_POST['uid'];
  $company = $_POST['company'];
  $address = $_POST['address'];


  $SQL = "INSERT INTO pots_asks(id_rice, id_bean, id_garrison, id_mixture, id_salad, id_size, id_dessert, id_user, id_company, address, entry_date, status)
  VALUES ($rice,$beans,$garrison,$mixture,$salad,$pots,$dessert,$uid,'$company','$address', CURDATE(), 1)";
  $resultado = mysqli_query($con, $SQL) or die(mysqli_error($con));
  if($resultado){
    echo "<script>alert('Pedido feito com sucesso.'); window.location='../index.php'; </script>";
  }else{
    echo "<script>alert('Erro ao efetuar pedido'); window.location='../index.php'; </script>";

  }
}else{
  $array = array("message" => "No request.", "status" => false);
  echo json_encode($array);
}


 ?>
