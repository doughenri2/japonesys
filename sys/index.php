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
  require("../connection/bd_connection.php");

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
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
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
        Painel
        <small>Bem vindo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ínicio</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Seus pedidos</h3>

              </div>
              <div class="box-body">
                <?php
                  $SQL = "SELECT * FROM pots_asks WHERE  id_company = '".md5($_SESSION['id_user'])."' AND entry_date=CURDATE()";
                  $resultado = mysqli_query($con, $SQL) or die(mysqli_error($con));
                  if(mysqli_num_rows($resultado) > 0){
                    ?>
                    <table class='table table-hover'>
                      <thead>
                        <tr> <th> Id do pedido </th> <th> Nome do cliente </th> <th> Detalhes </th> </tr>
                      </thead>
                      <tbody>
                        <?php
                        while($linha = mysqli_fetch_assoc($resultado)){
                          $id = $linha['id'];
                          $SQL_user = "SELECT * FROM user_buyer WHERE id_user='".$linha['id_user']."'";
                          $resultado_user = mysqli_query($con, $SQL_user) or die(mysqli_error($con));
                          $linha_user = mysqli_fetch_assoc($resultado_user);

                          ?>

                          <tr>
                            <td> <?php echo $linha['id']?> </td>
                            <td>  <?php echo $linha_user['name']?> </td>
                            <td> <a href="request_details.php?id=<?php echo $id?>"> Detalhes </a> </td>
                         </tr>
                          <?php
                        }
                    ?>
                      </tbody>
                    </table>
                    <?php

                  }else{
                    echo "<h4> Você não possui pedidos. </h4>";
                  }
                     ?>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  Total de pedidos hoje: <?php echo mysqli_num_rows($resultado)  ?>
              </div>
              <!-- /.box-footer-->
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

</body>
</html>
