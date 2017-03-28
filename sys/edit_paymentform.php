<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
    $value = $_POST['value'];
    $SQL_select = "SELECT * FROM user_payment_methods WHERE id_user='".$_SESSION['id_user']."' AND id_payment_method='$value'";
    $result_select = mysqli_query($con,$SQL_select) or die(mysqli_error($con));
    if(mysqli_num_rows($result_select) > 0){
      $SQL_del = "DELETE FROM user_payment_methods WHERE id_user='".$_SESSION['id_user']."' AND id_payment_method='$value'";
      $result_del = mysqli_query($con, $SQL_del) or die(mysqli_error($con));
      if($result_del){
        $array = array("message" => "Pagamento alterado", "status" => true);
        echo json_encode($array);
      }else{
        $array = array("message" => "Erro ao alterar pagamento", "status" => false);
        echo json_encode($array);
      }
    }else{
      $SQL_insert = "INSERT INTO user_payment_methods(id_user, id_payment_method) VALUES('".$_SESSION['id_user']."', '$value')";
      $result_insert = mysqli_query($con, $SQL_insert) or die(mysqli_error($con));
      if($result_insert){
        $array = array("message" => "Pagamento alterado", "status" => true);
        echo json_encode($array);
      }else{
        $array = array("message" => "Erro ao alterar pagamento", "status" => false);
        echo json_encode($array);
      }
    }

  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
