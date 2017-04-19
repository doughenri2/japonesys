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
        <?php
        $SQL = "SELECT * FROM pots_asks WHERE id='".$_GET['id']."'";
        $resultado = mysqli_query($con, $SQL) or die(mysqli_error($con));
        $linha = mysqli_fetch_assoc($resultado);
         ?>
            <div class="box-header with-border">
                <h3 class="box-title">Detalhes do pedido </h3><br><br>
                <div class='col-md-6'>
                  Tipo de arroz:
                  <div class="form-group has-feedback">
                    <?php
                    $SQL_rice = "SELECT * FROM pots_rice WHERE id='".$linha['id_rice']."'";
                    $resultado_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
                    $linha_rice = mysqli_fetch_assoc($resultado_rice);
                    ?>
                    <input type="text" disabled="true" class="form-control" value="<?php echo $linha_rice['name']?>" placeholder="Arroz" >
                  </div>
                  Tipo de feijão:
                  <div class="form-group has-feedback">
                    <?php
                    $SQL_bean= "SELECT * FROM pots_beans WHERE id='".$linha['id_bean']."'";
                    $resultado_bean = mysqli_query($con, $SQL_bean) or die(mysqli_error($con));
                    $linha_bean = mysqli_fetch_assoc($resultado_bean);
                    ?>
                    <input type="text" disabled="true" class="form-control" value="<?php echo $linha_bean['name']?>" placeholder="Arroz" >
                  </div>
                  Tipo de mistura:
                  <div class="form-group has-feedback">
                    <?php
                    $SQL_bean= "SELECT * FROM pots_mixture WHERE id='".$linha['id_mixture']."'";
                    $resultado_bean = mysqli_query($con, $SQL_bean) or die(mysqli_error($con));
                    $linha_bean = mysqli_fetch_assoc($resultado_bean);
                    ?>
                    <input type="text" disabled="true" class="form-control" value="<?php echo $linha_bean['name']?>" placeholder="Arroz" >
                  </div>
                  Tipo de salada:
                  <div class="form-group has-feedback">
                    <?php
                    $SQL_bean= "SELECT * FROM pots_salad WHERE id='".$linha['id_salad']."'";
                    $resultado_bean = mysqli_query($con, $SQL_bean) or die(mysqli_error($con));
                    $linha_bean = mysqli_fetch_assoc($resultado_bean);
                    ?>
                    <input type="text" disabled="true" class="form-control"  value="<?php echo $linha_bean['name']?>" placeholder="Arroz" >
                  </div>
                  Tipo de Guarniçao:
                  <div class="form-group has-feedback">
                    <?php
                    $SQL_bean= "SELECT * FROM pots_garrison WHERE id='".$linha['id_salad']."'";
                    $resultado_bean = mysqli_query($con, $SQL_bean) or die(mysqli_error($con));
                    $linha_bean = mysqli_fetch_assoc($resultado_bean);
                    ?>
                    <input type="text" disabled="true" class="form-control" value="<?php echo $linha_bean['name']?>"  placeholder="Arroz" >
                  </div>
                  Tipo de sobremesa:
                  <div class="form-group has-feedback">
                    <?php
                    $SQL_bean= "SELECT * FROM dessert WHERE id='".$linha['id_dessert']."'";
                    $resultado_bean = mysqli_query($con, $SQL_bean) or die(mysqli_error($con));
                    $linha_bean = mysqli_fetch_assoc($resultado_bean);
                    ?>
                    <input type="text" disabled="true" class="form-control" value="<?php echo $linha_bean['dessert_name']?>"  placeholder="Arroz" >
                  </div>
                  Tipo de arroz:
                  <div class="form-group has-feedback">
                    <?php
                    $SQL_bean= "SELECT * FROM user_buyer WHERE id_user='".$linha['id_user']."'";
                    $resultado_bean = mysqli_query($con, $SQL_bean) or die(mysqli_error($con));
                    $linha_bean = mysqli_fetch_assoc($resultado_bean);
                    ?>
                    <input type="text"  disabled="true" class="form-control" value="<?php echo $linha_bean['name']?>"  placeholder="Arroz" >
                  </div>
                  Tipo de arroz:
                  <div class="form-group has-feedback">
                    <textarea class="form-control" disabled="true"> <?php echo $linha['address']?> </textarea>
                  </div>
                  <button type="button" class="btn btn-primary"> Imprimir </button>
                </div>
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
