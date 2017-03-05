<?php


  function verifySession(){
    session_start();
    if(!isset($_SESSION['name']) || !isset($_SESSION['login'])){
      header("Location: ../login/");
    }
  }




    function anti_injection($sql){
     $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "" ,$sql);
     $sql = trim($sql);
     $sql = strip_tags($sql);
     $sql = (get_magic_quotes_gpc()) ? $sql : addslashes($sql);
     return $sql;
    }






 ?>
