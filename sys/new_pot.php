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
        Novo marmita
        <small>Preencha os campos para completar o cadastro da marmita </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ínicio</a></li>
      </ol>
    </section>
    <section class="content">

      <div class="box">
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
                  <h3> Elementos da refeiçao </h3>
                  <div class="col-md-6" >
                    <label> Arroz </label>
                    <div class="form-group has-feedback" id="div_rice">
                      <input type="text" class="form-control"  name="rice_name[]" placeholder="Digite o tipo de arroz" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;" class="btn btn-success" id="add_rice"> Add arroz </button>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6" >
                    <label> Feijao </label>
                    <div class="form-group has-feedback" id="div_bean">
                      <input type="text" class="form-control"  name="bean_name[]" placeholder="Digite o tipo de feijao" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;" class="btn btn-success" id="add_bean"> Add feijao </button>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6" >
                    <label> Mistura </label>
                    <div class="form-group has-feedback" id="div_mixture">
                      <input type="text" class="form-control"  name="mixture_name[]" placeholder="Digite o tipo de mistura" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;" class="btn btn-success" id="add_mixture"> Add mistura </button>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6" >
                    <label> Guarnicao </label>
                    <div class="form-group has-feedback" id="div_garrison">
                      <input type="text" class="form-control"  name="garrison_name[]" placeholder="Digite o tipo de guarnicao" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;" class="btn btn-success" id="add_garrison"> Add Guarnicao </button>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-6" >
                    <label> Salada </label>
                    <div class="form-group has-feedback" id="div_salad">
                      <input type="text" class="form-control"  name="salad_name[]" placeholder="Digite o tipo de Salada" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="button" style="margin-top:25px;" class="btn btn-success" id="add_salad"> Add Salada </button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="new_pot.php" class='btn btn-primary'> Nova Marmita </a>
              </div>
              <!-- /.box-footer-->
            </div>
          <!-- Modal -->


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
<script>
  $(document).ready(function(){
    $(".money").maskMoney({prefix:'R$ '});

    $("#add_rice").click(function(){
      $("<br> <input type='text' class='form-control'  name='rice_name[]' placeholder='Digite o tipo de arroz'>").insertAfter($("#div_rice").find('input:last'));
    });

    $("#add_garrison").click(function(){
      $("<br> <input type='text' class='form-control'  name='garrison_name[]' placeholder='Digite o tipo de guarnicao'>").insertAfter($("#div_garrison").find('input:last'));
    });

    $("#add_bean").click(function(){
      $("<br> <input type='text' class='form-control'  name='bean_name[]' placeholder='Digite o tipo de feijao'>").insertAfter($("#div_bean").find('input:last'));
    });

    $("#add_mixture").click(function(){
      $("<br> <input type='text' class='form-control'  name='mixture_name[]' placeholder='Digite o tipo de mistura'>").insertAfter($("#div_mixture").find('input:last'));
    });

    $("#add_salad").click(function(){
      $("<br> <input type='text' class='form-control' name='salad_name[]' placeholder='Digite o tipo de salada'>").insertAfter($("#div_salad").find('input:last'));
    });


  });

</script>

</body>
</html>
