<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_GET)){
    $id = $_GET['id'];
    $id_pot = $_GET['id_pot'];
    $SQL = "DELETE FROM pots_garrison WHERE id_pot='$id_pot' AND id='$id' LIMIT 1";
    $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    if($result){
      echo "<script> alert('Excluido com sucesso'); window.location='menus.php';</script>";

    }else{
      echo "<script> alert('Erro ao excluir'); window.location='menus.php';</script>";
    }
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
