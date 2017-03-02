<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
    $id = $_POST['id'];

    $SQL = "SELECT * FROM phones WHERE id_user='".$_SESSION['id_user']."' AND id='$id' LIMIT 1";
    $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);


    $array = array(
      "nome_telefone" => $row['nome_telefone'],
      "tel_number" => $row['tel_number']);
      echo json_encode($array);
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
