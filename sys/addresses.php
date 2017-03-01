<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Meus endereços</title>
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
        Meus endereços
        <small>Todos endereços cadastrados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../sys/"><i class="fa fa-dashboard"></i> Ínicio</a></li>
        <li class="active">Meus endereços</li>
      </ol>
    </section>
    <section class="content">

      <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Endereços</h3>

              </div>
              <div class="box-body">
                <?php
                require("../connection/bd_connection.php");
                $SQL = "SELECT * FROM adresses WHERE id_user = '".$_SESSION['id_user']."'";
                $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
                if(mysqli_num_rows($result) > 0){
                  ?>
                  <table class="table table-bordered">
                      <tbody><tr>
                        <th>#</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Número</th>
                        <th>Detalhes</th>
                      </tr>
                      <?php
                      while($row = mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                              <td>".$row['id']."</td>
                              <td>".$row['street']."</td>
                              <td>".$row['neighborhood']."</td>
                              <td>".$row['number']."</td>
                              <td>
                              <a href='#' class='edit_link' id='".$row['id']."' data-toggle='modal' data-target='#modalEditar'> Ver detalhes </a>
                              </td>
                            </tr>";
                      }
                       ?>
                    </tbody></table>
                  <?php
                }else{
                  echo "<h4> Você não possui endereços cadastrados. </h4>";
                  echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalCadastro'> Cadastrar agora </button>";
                }
                ?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalCadastro'> Novo endereço </button>
              </div>
              <!-- /.box-footer-->
            </div>
          <!-- Modal -->
          <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Novo endereço</h4>
                </div>
                <div class="modal-body">
                  <label>CEP</label>
                  <form class="form-inline" id='form_cep'>
                    <div class="form-group">
                      <div class="form-group has-feedback">
                         <input type="text" class="form-control" placeholder="Digite o seu CEP" id='cep'>
                       </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" id='btn_search'>Consultar</button>
                    </div>
                  </form>
                  <small> *Digite o cep e o sistema buscará automaticamente. </small><br><br>

                  <div class="col-md-12" id="div_addresses">
                  <label> Cidade </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="city" placeholder="Cidade" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> UF </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="uf" placeholder="UF" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Rua </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="street" placeholder="Rua" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Número </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="number" placeholder="Número" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Bairro </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="nboor" placeholder="Bairro" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Complemento </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="complement" placeholder="Complemento" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  <button type="button" class="btn btn-primary" id='btn_save_address'>Salvar</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal editar -->
          <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Detalhes do endereço</h4>
                </div>
                <div class="modal-body">
                  <label>CEP</label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="cep_e" placeholder="Cidade" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Cidade </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="city_e" placeholder="Cidade" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> UF </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="uf_e" placeholder="UF" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Rua </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="street_e" placeholder="Rua" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Número </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="number_e" placeholder="Número" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Bairro </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="nboor_e" placeholder="Bairro" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <label> Complemento </label>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="complement_e" placeholder="Complemento" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  <button type="button" class="btn btn-primary" id='btn_save_edit_address'>Salvar</button>
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
<script src="js/addressjs.js"></script>

</body>
</html>
