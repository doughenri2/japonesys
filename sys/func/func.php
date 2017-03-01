<?php


  function verifySession(){
    session_start();
    if(!isset($_SESSION['name']) || !isset($_SESSION['login'])){
      header("Location: ../login/");
    }
  }










 ?>
