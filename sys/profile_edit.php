<?php
  //require bc connection
  require("../connection/bd_connection.php");
  session_start();
  if(!empty($_POST)){

    $name = $_POST['name'];
    $start_hour = $_POST['start_hour'];
    $finish_hour = $_POST['finish_hour'];
    $select_delivery= $_POST['select_delivery'];

    if($select_delivery == "0"){
      echo "<script>
       alert('Selecione o tipo de delivery.');
       window.location='company.php';</script>";
    }else{
        if($select_delivery == "1"){  $select_delivery = true; }
        else{ $select_delivery = false; }
          if(isset($_FILES['image']) && !empty( $_FILES["image"]["name"] )){
            $uploaddir = "images/";
            $uploadfile = $uploaddir . md5($_SESSION['id_user']).$_FILES["image"]["name"];

              if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                $SQL = "UPDATE user_f SET user_name='$name', logo_address='$uploadfile',
                 start_hour='$start_hour', finish_hour='$finish_hour', make_delivery='$select_delivery' WHERE id_user='".$_SESSION['id_user']."'";
                 $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
                 if($result){
                   echo "<script> alert('Perfil atualizado com imagem com sucesso.'); window.location='company.php';</script>";
                 }else{
                   echo "<script> alert('Erro.');</script>";
                   echo $SQL;
                 }
              } else {
                  echo "Erro ao subir arquivo.";
              }
            }else{
            $SQL = "UPDATE user_f SET user_name='$name', start_hour='$start_hour',
            finish_hour='$finish_hour', make_delivery='$select_delivery'";
             $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
             if($result){
               echo "<script> alert('Perfil atualizado com sucesso.'); window.location='company.php';</script>";
             }else{
               echo "<script> alert('Erro.');</script>";
               echo $SQL;
             }
          }
    }
  }else{
    $array = array("message" => "No request.", "status" => false);
    echo json_encode($array);
  }
?>
