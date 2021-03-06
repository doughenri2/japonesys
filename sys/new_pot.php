<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nova marmita</title>
  <?php
  require("func/func.php");
  verifySession();
  ?>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../components_sys/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../components_sys/dist/css/AdminLTE.min.css">
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
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Novo marmita
        <small>Preencha os campos para completar o cadastro da marmita </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ínicio</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <form action='add_pot.php' method="post" id="form_new_pot">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo date('d/m/Y');?></h3>
              </div>
              <div class="box-body">
                <!-- size and prices div -->
                <div class="col-md-12">
                  <h3> Tamanhos e preço </h3>
                  <div class="col-md-3">
                    <label> MINI </label>
                    <div class="form-group has-feedback">
                      <input type="text"  class="form-control money" id="mini_price" name="mini_price" placeholder="Preço da marmita mini" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label> NORMAL </label>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control money" id="normal_price" name="normal_price" placeholder="Preço da marmita normal" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label> GRANDE </label>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control money" id="big_price" name="big_price" placeholder="Preço da marmita grande" >
                    </div>
                  </div>
                </div>
                <!-- delivery time div -->
                <div class="col-md-12">
                  <h3> Tempo de entrega </h3>
                  <div class="col-md-3">
                    <label> Tempo de entrega </label>
                    <div class="form-group has-feedback">
                      <input type="time" class="form-control" id="delivery_time" name="delivery_time" placeholder="Tempo estimado de entrega" >
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <h3> Elementos da refeição </h3>
                  <div class="col-md-6" >
                    <label> Arroz </label>
                    <div class="form-group has-feedback" id="div_rice">
                      <input type="text" class="form-control rice_name"  name="rice_name[]" placeholder="Digite o tipo de Arroz" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;width:150px;" class="btn btn-success" id="add_rice"> Add arroz </button>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6" >
                    <label> Feijão </label>
                    <div class="form-group has-feedback" id="div_bean">
                      <input type="text" class="form-control bean_name"  name="bean_name[]" placeholder="Digite o tipo de Feijão" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;width:150px;" class="btn btn-success" id="add_bean"> Add Feijão </button>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6" >
                    <label> Mistura </label>
                    <div class="form-group has-feedback" id="div_mixture">
                      <input type="text" class="form-control mixture_name"  name="mixture_name[]" placeholder="Digite o tipo de Mistura" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;width:150px;" class="btn btn-success" id="add_mixture"> Add Mistura </button>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6" >
                    <label> Guarnição </label>
                    <div class="form-group has-feedback" id="div_garrison">
                      <input type="text" class="form-control garrison_name"  name="garrison_name[]" placeholder="Digite o tipo de Guarnição" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;width:150px;" class="btn btn-success" id="add_garrison"> Add Guarnição </button>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6" >
                    <label> Salada </label>
                    <div class="form-group has-feedback" id="div_salad">
                      <input type="text" class="form-control salad_name"  name="salad_name[]" placeholder="Digite o tipo de Salada" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;width:150px" class="btn btn-success" id="add_salad"> Add Salada </button>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                  <div class='col-md-5'>
                    <button type="submit" class='btn btn-primary'> Adicionar marmita </button>
                  </div>
              </div>
            </form>
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
<script src="js/maskmoney.js"></script>
<script src="js/pot.js"></script>
</body>
</html>
