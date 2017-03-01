<?php
  //require bc connection
  require("../connection/bd_connection.php");

  if(!empty($_POST)){
    $user_type = $_POST['user_type'];

    if($user_type == '1'){
      $social_name = $_POST['social_name'];
      $fantasy_name = $_POST['fantasy_name'];
      $cnpj = $_POST['cnpj'];
      $login = $_POST['login'];
      $password = $_POST['password'];
      $confirm_pass = $_POST['confirm_pass'];
      if($password == $confirm_pass){
        $SQL = "SELECT * FROM user_j WHERE user_cnpj = '$cnpj' ";
        $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
        if(mysqli_num_rows($result) > 0){
          $array = array("message" => "CNPJ já cadastrado.", "status" => false);
          echo json_encode($array);
        }else{
          // INSERT QUERY
          $SQL_insert1 = "INSERT INTO users(user_type, login, password, entry_date, user_status)
            VALUES('$user_type', '$login', md5('$password'), CURDATE(), '1')";
          $result_insert1 = mysqli_query($con, $SQL_insert1) or die(mysqli_error($con));
          if($result_insert1){
            //last insert id on table user
            $last_id = mysqli_insert_id($con);
            $SQL_insert2 = "INSERT INTO user_j(id_user, user_cnpj, social_name, fantasy_name)
             VALUES('$last_id', '$cnpj', '$social_name', '$fantasy_name')";
            $result_insert2 = mysqli_query($con, $SQL_insert2) or die(mysqli_error($con));
            if($result_insert2){
              $array = array("message" => "Cadastrado com sucesso.", "status" => true);
              echo json_encode($array);
            }
          }
        }
      }else{
        $array = array("message" => "Senhas não iguais.", "status" => false);
        echo json_encode($array);
      }
    }else{

      $name = $_POST['name'];
      $cpf = $_POST['cpf'];
      $login = $_POST['login'];
      $password = $_POST['password'];
      $confirm_pass = $_POST['confirm_pass'];
      if($password == $confirm_pass){
        $SQL = "SELECT * FROM user_f WHERE user_cpf = '$cpf'";
        $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
        if(mysqli_num_rows($result) > 0){
          $array = array("message" => "CPF já cadastrado.", "status" => false);
          echo json_encode($array);
        }else{
          // INSERT QUERY
          $SQL_insert1 = "INSERT INTO users(user_type, login, password, entry_date, user_status)
            VALUES('$user_type', '$login', md5('$password'), CURDATE(), '1')";
          $result_insert1 = mysqli_query($con, $SQL_insert1) or die(mysqli_error($con));
          if($result_insert1){
            //last insert id on table user
            $last_id = mysqli_insert_id($con);
            $SQL_insert2 = "INSERT INTO user_f(id_user, user_cpf, user_name) VALUES('$last_id', '$cpf', '$name')";
            $result_insert2 = mysqli_query($con, $SQL_insert2) or die(mysqli_error($con));
            if($result_insert2){
              $array = array("message" => "Cadastrado com sucesso.", "status" => true);
              echo json_encode($array);
            }
          }
        }

      }else{
        $array = array("message" => "Senhas não iguais.", "status" => false);
        echo json_encode($array);
      }
    }
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
