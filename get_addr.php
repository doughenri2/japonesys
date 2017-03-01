<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
    $id = $_POST['id'];

    $SQL = "SELECT * FROM adresses WHERE id_user='".$_SESSION['id_user']."' AND id='$id' LIMIT 1";
    $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);


    $array = array(
      "cep" => $row['cep'],
      "city" => $row['city'],
      "uf" => $row['uf'],
      "street" => $row['street'],
      "number" => $row['number'],
      "neighborhood" => $row['neighborhood'],
      "complement" => $row['complement']);
      echo json_encode($array);
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
