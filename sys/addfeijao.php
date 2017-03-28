<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){
    $id = $_POST['id'];
    $alimento = $_POST['feijao'];
    if($alimento != ""){
      $SQL_select = "SELECT * FROM pots_beans WHERE id_pot='$id' AND name='$alimento'";
      $result_select = mysqli_query($con, $SQL_select) or die(mysqli_error($con));
      if(mysqli_num_rows($result_select) > 0){
        echo "<script> alert('Alimento ja cadastrado.'); window.location='menus.php';</script>";
      }else{
        $SQL_rice = "INSERT INTO pots_beans(id_pot, name) VALUES ('$id','$alimento')";
        $result_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
        if($result_rice){
          echo "<script> alert('Cadastrado com sucesso.'); window.location='menus.php';</script>";
        }else{
          echo "<script> alert('Erro ao cadastrar');window.location='menus.php';</script>";
        }
      }

    }else{
      echo "<script> alert('Digite o nome do alimento.');window.location='menus.php';</script>";
    }

  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
