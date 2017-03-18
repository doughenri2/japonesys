<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
    if(strlen($_POST['mini_price']) > 5){
      $mini_price = substr($_POST['mini_price'], 3, 16);
    }else{
      $mini_price = $_POST['mini_price'];
    }
    if(strlen($_POST['normal_price']) > 5){
      $normal_price = substr($_POST['normal_price'], 3, 16);
    }else{
      $normal_price = $_POST['normal_price'];
    }

    if(strlen($_POST['big_price']) > 5){
      $big_price = substr($_POST['big_price'], 3, 16);
    }else{
      $big_price = $_POST['big_price'];
    }

    $delivery_time = $_POST['delivery_time'];
    $id = $_POST['id'];

    //food arrays
    $rice_name = $_POST['rice_name'];
    $bean_name = $_POST['bean_name'];
    $mixture_name = $_POST['mixture_name'];
    $garrison_name = $_POST['garrison_name'];
    $salad_name = $_POST['salad_name'];

    //insert in de pot table

    $SQL_update_pot = "UPDATE `pots` SET delivery_time = '$delivery_time', mini_size='$mini_price', normal_size='$normal_price',
    big_size='$big_price' WHERE id_user='".$_SESSION['id_user']."' AND entry_date=CURDATE() AND id='$id'";
    $result_port = mysqli_query($con, $SQL_update_pot) or die(mysqli_error($con));
    if($result_port){
      echo "<script> alert('Cadastrado com sucesso.'); window.location='menus.php';</script>";
    }else{
      echo "<script> alert('Erro ao cadastrar pedido'); window.location='new_pot.php';</script>";
    }
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
