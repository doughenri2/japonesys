<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
    $mini_price = substr($_POST['mini_price'], 3, 16);
    $normal_price = substr($_POST['normal_price'], 3, 16);
    $big_price = substr($_POST['big_price'], 3, 16);
    $delivery_time = $_POST['delivery_time'];

    //food arrays
    $rice_name = $_POST['rice_name'];
    $bean_name = $_POST['bean_name'];
    $mixture_name = $_POST['mixture_name'];
    $garrison_name = $_POST['garrison_name'];
    $salad_name = $_POST['salad_name'];

    //insert in de pot table
    $SQL_insert_pot = "INSERT INTO pots(id_user, delivery_time, mini_size, normal_size, big_size, entry_date)
    VALUES('".$_SESSION['id_user']."', '$delivery_time','$mini_price','$normal_price','$big_price', CURDATE())";
    $result_port = mysqli_query($con, $SQL_insert_pot) or die(mysqli_error($con));
    if($result_port){
      $last_pot_id = mysqli_insert_id($con);

      //for insert rice table
      for($i = 0; $i < count($rice_name); $i++){
        $SQL_rice = "INSERT INTO pots_rice(id_pot, name) VALUES ('$last_pot_id','".$rice_name[$i]."')";
        $result_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
      }

      //for insert bean table
      for($i = 0; $i < count($bean_name); $i++){
        $SQL_bean = "INSERT INTO pots_beans(id_pot, name) VALUES ('$last_pot_id','".$bean_name[$i]."')";
        $result_bean = mysqli_query($con, $SQL_bean) or die(mysqli_error($con));
      }

      //for insert mixture table
      for($i = 0; $i < count($mixture_name); $i++){
        $SQL_mixture = "INSERT INTO pots_mixture(id_pot, name) VALUES ('$last_pot_id','".$mixture_name[$i]."')";
        $result_mixture = mysqli_query($con, $SQL_mixture) or die(mysqli_error($con));
      }

      //for insert mixture table
      for($i = 0; $i < count($garrison_name); $i++){
        $SQL_garrison = "INSERT INTO pots_garrison(id_pot, name) VALUES ('$last_pot_id','".$garrison_name[$i]."')";
        $result_garrison = mysqli_query($con, $SQL_garrison) or die(mysqli_error($con));
      }

      //for insert salad table
      for($i = 0; $i < count($salad_name); $i++){
        $SQL_salad  = "INSERT INTO pots_salad(id_pot, name) VALUES ('$last_pot_id','".$salad_name[$i]."')";
        $result_garrison = mysqli_query($con, $SQL_salad) or die(mysqli_error($con));
      }

      echo "<script> alert('Cadastrado com sucesso.'); window.location='menus.php';</script>";


    }else{
      echo "<script> alert('Erro ao cadastrar pedido'); window.location='new_pot.php';</script>";
    }




  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
