<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bem vindo</title>
  <?php
  require("func/func.php");
  verifySession();
  ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../components_sys/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../components_sys/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../components_sys/dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <?php require("layout/layout.php"); ?>
<div class="wrapper">

  <?php
  topmenu();
  aside();
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Meu estabelecimento
        <small>informações sobre meu estabelecimento</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../sys/"><i class="fa fa-dashboard"></i> Ínicio</a></li>
        <li class="active">Meu Estabelecimento</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Meu estabelecimento</h3>
            </div>
            <?php

            require("../connection/bd_connection.php");
              if($_SESSION['user_type'] == "2"){
                //fisica
                $SQL = "SELECT * FROM user_f WHERE id_user='".$_SESSION['id_user']."'";
                $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
                if($result){
                  $row = mysqli_fetch_assoc($result);
                  ?>
                  <form role="form" enctype="multipart/form-data" method="post" id="form_profile" action="profile_edit.php">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">CPF</label>
                        <input type="email" class="form-control" id="cpf" name="cpf" readonly="true" value="<?php echo $row['user_cpf']?>"placeholder="CPF">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['user_name']?>" placeholder="Seu nome">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Horário de início de funcionamento</label>
                        <input type="time" class="form-control" id="start_hour" name="start_hour" value="<?php echo $row['start_hour']?>" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Horário de término de funcionamento</label>
                        <input type="time" class="form-control" id="finish_hour" name="finish_hour" value="<?php echo $row['finish_hour']?>" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Faz delivery</label>
                        <select id='select_delivery' name="select_delivery" class="form-control">
                          <?php
                          if( $row['make_delivery'] == 0){
                            ?>
                            <option value="0"> SELECIONE </option>
                            <option value="1"> Sim </option>
                            <option value="2" selected="true"> Não </option>
                            <?php
                          }else{
                            ?>
                            <option value="0"> SELECIONE </option>
                            <option value="1" selected="true"> Sim </option>
                            <option value="2"> Não </option>
                            <?php
                          }
                           ?>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="image" name="image">
                        <p class="help-block">Clique para mudar o logo</p>
                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                  <?php
                }else{
                  echo "<h3> Usuário não encontrado. </h3>";
                }
              }else{
                //fisica
                $SQL = "SELECT * FROM user_j WHERE id_user='".$_SESSION['id_user']."'";
                $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
                if($result){
                  $row = mysqli_fetch_assoc($result);
                  ?>
                  <form role="form">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">

                        <p class="help-block">Example block-level help text here.</p>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Check me out
                        </label>
                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                  <?php
                }else{
                  echo "<h3> Usuário não encontrado. </h3>";
                }
              }
            ?>

          </div>
    </section>
  </div>
  <?php
  rodape();

   ?>

  <div class="control-sidebar-bg"></div>
</div>


<script src="../components_sys/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../components_sys/bootstrap/js/bootstrap.min.js"></script>
<script src="../components_sys/dist/js/app.min.js"></script>
<script src="../components_sys/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../components_sys/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../components_sys/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="js/company_j.js"></script>
<script src="js/company_f.js"></script>

</body>
</html>
