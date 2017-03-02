<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
    $id = $_POST['id'];

    $SQL = "DELETE FROM phones WHERE id_user='".$_SESSION['id_user']."' AND id='$id' LIMIT 1";
    $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    if($result){
      $array = array("message" => "Excluido com sucesso.", "status" => true);
      echo json_encode($array);
    }else{
      $array = array("message" => "Erro ao excluir", "status" => false);
      echo json_encode($array);
    }
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
