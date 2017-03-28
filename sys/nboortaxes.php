<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
   $nboorname = substr($_POST['nboorname'], 3, 16);
   $nboorprice = substr($_POST['nboorprice'], 3, 16);

   $SQL = "INSERT INTO neighborhood_taxes(id_user, nboor_name, nboor_tax)
   VALUES('".$_SESSION['id_user']."', '$nboorname', '$nboorprice')";
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
