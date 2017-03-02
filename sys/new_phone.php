<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
   $name_phone = $_POST['name_phone'];
   $phone_number = $_POST['phone_number'];


   $SQL = "INSERT INTO phones(id_user, nome_telefone, tel_number)
   VALUES('".$_SESSION['id_user']."', '$name_phone', '$phone_number')";
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
