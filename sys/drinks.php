<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Minhas bebidas</title>
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

  <style>
    #div_addresses{
      display: none;
      padding: 0px;
    }
  </style>


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
        Minhas bebidas
        <small>Todos as bebidas cadastradas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../sys/"><i class="fa fa-dashboard"></i> Ínicio</a></li>
        <li class="active">Minhas bebidas</li>
      </ol>
    </section>
    <section class="content">

      <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Bebidas</h3>

              </div>
              <div class="box-body">
                <?php
                require("../connection/bd_connection.php");
                $SQL = "SELECT * FROM drinks WHERE id_user = '".$_SESSION['id_user']."'";
                $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
                if(mysqli_num_rows($result) > 0){
                  ?>
                  <table class="table table-bordered">
                      <tbody><tr>
                        <th>#</th>
                        <th>Nome da bebida</th>
                        <th>Preço da bebida</th>
                        <th>Quantidade</th>
                        <th>Detalhes</th>
                      </tr>
                      <?php
                      while($row = mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                              <td>".$row['id']."</td>
                              <td>".$row['drink_name']."</td>
                              <td>".$row['drink_price']."</td>
                              <td>".$row['qtd_drink']."</td>
                              <td>
                              <a href='#' class='edit_link' id='".$row['id']."'> Excluir </a>
                              </td>
                            </tr>";
                      }
                       ?>
                    </tbody></table>
                  <?php
                }else{
                  echo "<h4> Você não possui bebidas cadastradas. </h4>";
                }
                ?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalCadastro'> Nova Bebida </button>
              </div>
              <!-- /.box-footer-->
            </div>
          <!-- Modal -->
          <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Nova bebida</h4>
                </div>
                <div class="modal-body">

                  <label> Nome da bebida</label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="drink_name" placeholder="Nome do telefone" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Preço da bebida </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="drink_price" placeholder="Preço da bebida" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Quantidade </label>
                  <div class="form-group has-feedback">
                    <input type="number" class="form-control" id="qtd_drink" placeholder="Quantidade da bebida" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  <button type="button" class="btn btn-primary" id='btn_save_drink'>Salvar</button>
                </div>
              </div>
            </div>
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
<script src="js/drinksjs.js"></script>

</body>
</html>
