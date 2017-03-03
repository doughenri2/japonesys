<?php
  //require bc connection
  require("../connection/bd_connection.php");
  if(!empty($_POST)){
    $login = anti_injection($_POST['login']);
    $password = anti_injection($_POST['password']);
    $SQL = "SELECT *, DATE_FORMAT(entry_date, '%d/%m/%Y') as date_entry FROM users WHERE login = '$login' AND password = md5('$password') AND user_status = '1' LIMIT 1";
    $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);

      if($row['user_type'] == "2"){

        //teste git
        //select fisica
        $SQL_u_f = "SELECT * FROM user_f WHERE id_user = '".$row['id']."'";
        $resultado_f = mysqli_query($con, $SQL_u_f) or die(mysqli_error($con));
        $row_f = mysqli_fetch_assoc($resultado_f);


        session_start();
        $_SESSION['date_entry'] = $row['date_entry'];;
        $_SESSION['login'] = $login;
        $_SESSION['id_user'] = $row['id'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['name'] = $row_f['user_name'];

        header("Location: ../sys/");

      }else{
        //select fisica
        $SQL_u_f = "SELECT * FROM user_j WHERE id_user = '".$row['id']."'";
        $resultado_f = mysqli_query($con, $SQL_u_f) or die(mysqli_error($con));
        $row_f = mysqli_fetch_assoc($resultado_f);


        session_start();
        $_SESSION['date_entry'] = $row['date_entry'];;
        $_SESSION['login'] = $login;
        $_SESSION['id_user'] = $row['id'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['name'] = $row_f['social_name'];

        header("Location: ../sys/");

      }
    }else{
      echo "<script> alert('Usuário não encontrado.'); window.location='../login/'; </script>";
    }
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }

  function anti_injection($sql){
   $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "" ,$sql);
   $sql = trim($sql);
   $sql = strip_tags($sql);
   $sql = (get_magic_quotes_gpc()) ? $sql : addslashes($sql);
   return $sql;
  }
?>
