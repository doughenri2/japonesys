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
        Cardápios
        <small>Cardápio do dia</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ínicio</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
              <?php
              require("../connection/bd_connection.php");
              $SQL = "SELECT * FROM pots WHERE id_user='".$_SESSION['id_user']."' AND entry_date=CURDATE() LIMIT 1";
              $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
              if(mysqli_num_rows($result) > 0){
                $row_pot = mysqli_fetch_assoc($result) or die(mysqli_error($con));
                ?>
                <form action='edit_pot.php' method="post" id="form_new_pot">
                  <input type='hidden' value="<?php echo $row_pot['id']?>" name='id'>
                      <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $row_pot['entry_date']?></h3>
                      </div>
                      <div class="box-body">
                        <!-- size and prices div -->
                        <div class="col-md-12">
                          <h3> Tamanhos e preço </h3>
                          <div class="col-md-3">
                            <label> MINI </label>
                            <div class="form-group has-feedback">
                              <input type="text"  class="form-control money" value="<?php echo $row_pot['mini_size']?>" id="mini_price" name="mini_price" placeholder="Novo preço" >
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label> NORMAL </label>
                            <div class="form-group has-feedback">
                              <input type="text" class="form-control money"  value="<?php echo $row_pot['normal_size']?>"  id="normal_price" name="normal_price" placeholder="Preço da marmita normal" >
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label> GRANDE </label>
                            <div class="form-group has-feedback">
                              <input type="text" class="form-control money"  value="<?php echo $row_pot['big_size']?>"   id="big_price" name="big_price" placeholder="Preço da marmita grande" >
                            </div>
                          </div>
                        </div>
                        <!-- delivery time div -->
                        <div class="col-md-12">
                          <h3> Tempo de entrega </h3>
                          <div class="col-md-3">
                            <label> Tempo de entrega </label>
                            <div class="form-group has-feedback">
                              <input type="time" class="form-control" value="<?php echo $row_pot['delivery_time'] ?>" id="delivery_time" name="delivery_time" placeholder="Tempo estimado de entrega" >
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <h3> Elementos da refeição </h3>


                          <div class="col-md-6" >
                            <label> Arroz </label>
                            <?php
                            $SQL_rice = "SELECT * FROM pots_rice WHERE id_pot='".$row_pot['id']."'";
                            $result_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
                            ?>
                            <table class='table table-hover'>
                              <thead>
                                <tr><th> Nome </th> <th><center> Ação </center></th>
                              </thead>
                              <?php
                              while($row = mysqli_fetch_assoc($result_rice)){
                              ?>
                              <tr><td><?php echo $row['name']?></td><td><center>
                               <a href="delarroz.php?id=<?php echo $row['id']?>&id_pot=<?php echo $row_pot['id'] ?>"  class='btn btn-primary'> Excluir </a></td> </center></td> </center>

                              <?php
                              }
                              ?>

                            </table>


                          </div>
                          <div class="col-md-3">
                            <button type="button" style="margin-top:25px;width:150px;"  data-toggle='modal' data-target='#modalarroz' class="btn btn-success"> Add arroz </button>
                          </div>

                        </div>

                        <div class="col-md-12">

                                                    <div class="col-md-6" >
                                                      <label> Feijão </label>
                                                      <?php
                                                      $SQL_rice = "SELECT * FROM pots_beans WHERE id_pot='".$row_pot['id']."'";
                                                      $result_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
                                                      ?>
                                                      <table class='table table-hover'>
                                                        <thead>
                                                          <tr><th> Nome </th> <th><center> Ação </center></th>
                                                        </thead>
                                                        <?php
                                                        while($row = mysqli_fetch_assoc($result_rice)){
                                                        ?>
                                                        <tr><td><?php echo $row['name']?></td><td><center>
                                                          <a href="delfeijao.php?id=<?php echo $row['id']?>&id_pot=<?php echo $row_pot['id'] ?>"  class='btn btn-primary'> Excluir </a></td> </center></td> </center>

                                                        <?php
                                                        }
                                                        ?>

                                                      </table>


                                                    </div>
                                                    <div class="col-md-3">
                                                      <button type="button" style="margin-top:25px;width:150px;"  data-toggle='modal' data-target='#modalfeijao' class="btn btn-success"> Add Feijão </button>
                                                    </div>
                        </div>

                        <div class="col-md-12">

                                                    <div class="col-md-6" >
                                                      <label> Mistura </label>
                                                      <?php
                                                      $SQL_rice = "SELECT * FROM pots_mixture WHERE id_pot='".$row_pot['id']."'";
                                                      $result_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
                                                      ?>
                                                      <table class='table table-hover'>
                                                        <thead>
                                                          <tr><th> Nome </th> <th><center> Ação </center></th>
                                                        </thead>
                                                        <?php
                                                        while($row = mysqli_fetch_assoc($result_rice)){
                                                        ?>
                                                        <tr><td><?php echo $row['name']?></td><td><center>
                                                          <a href="delmistura.php?id=<?php echo $row['id']?>&id_pot=<?php echo $row_pot['id'] ?>"  class='btn btn-primary'> Excluir </a></td> </center></td> </center>
</td> </center>

                                                        <?php
                                                        }
                                                        ?>

                                                      </table>


                                                    </div>
                                                    <div class="col-md-3">
                                                      <button type="button" style="margin-top:25px;width:150px;"  data-toggle='modal' data-target='#modalmistura' class="btn btn-success"> Add Mistura </button>
                                                    </div>
                        </div>

                        <div class="col-md-12">

                                                    <div class="col-md-6" >
                                                      <label> Guarnição </label>
                                                      <?php
                                                      $SQL_rice = "SELECT * FROM pots_garrison WHERE id_pot='".$row_pot['id']."'";
                                                      $result_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
                                                      ?>
                                                      <table class='table table-hover'>
                                                        <thead>
                                                          <tr><th> Nome </th> <th><center> Ação </center></th>
                                                        </thead>
                                                        <?php
                                                        while($row = mysqli_fetch_assoc($result_rice)){
                                                        ?>
                                                        <tr><td><?php echo $row['name']?></td><td><center>  <a href="delguarnicao.php?id=<?php echo $row['id']?>&id_pot=<?php echo $row_pot['id'] ?>"  class='btn btn-primary'> Excluir </a> </td> </center>

                                                        <?php
                                                        }
                                                        ?>

                                                      </table>


                                                    </div>
                                                    <div class="col-md-3">
                                                      <button type="button" style="margin-top:25px;width:150px;"  data-toggle='modal' data-target='#modalguarnicao' class="btn btn-success"> Add Guarnição </button>
                                                    </div>
                        </div>

                        <div class="col-md-12">

                                                    <div class="col-md-6" >
                                                      <label> Salada </label>
                                                      <?php
                                                      $SQL_rice = "SELECT * FROM pots_salad WHERE id_pot='".$row_pot['id']."'";
                                                      $result_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
                                                      ?>
                                                      <table class='table table-hover'>
                                                        <thead>
                                                          <tr><th> Nome </th> <th><center> Ação </center></th>
                                                        </thead>
                                                        <?php
                                                        while($row = mysqli_fetch_assoc($result_rice)){
                                                        ?>
                                                        <tr><td><?php echo $row['name']?></td><td><center><a href="delsalada.php?id=<?php echo $row['id']?>&id_pot=<?php echo $row_pot['id'] ?>"  class='btn btn-primary'> Excluir </a> </td> </center>

                                                        <?php
                                                        }
                                                        ?>

                                                      </table>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <button type="button" style="margin-top:25px;width:150px;"  data-toggle='modal' data-target='#modalsalada' class="btn btn-success"> Add Salada </button>
                                                    </div>
                        </div>
                      </div>
                      <div class="box-footer">
                          <div class='col-md-5'>
                            <button type="submit" class='btn btn-primary'> Editar marmita </button>
                          </div>
                      </div>
                    </form>


                    <!-- modal arroz -->
                    <div class="modal fade" id="modalarroz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Arroz</h4>
                          </div>
                          <div class="modal-body">
                            <form action='addarroz.php' method="post">
                            <label> Arroz </label>
                            <input type='hidden' name="id" value="<?php echo $row_pot['id']?>">
                            <div class="form-group has-feedback">
                              <input type="text" class="form-control" name='arroz' placeholder="Digite o arroz" >
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" >Salvar</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>

                    <!-- modal feijao -->
                    <div class="modal fade" id="modalfeijao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Feijão</h4>
                          </div>
                          <div class="modal-body">
                            <form action='addfeijao.php' method="post">
                            <label> Feijao </label>
                            <input type='hidden' name="id" value="<?php echo $row_pot['id']?>">
                            <div class="form-group has-feedback">
                              <input type="text" class="form-control"  name='feijao' placeholder="Digite o feijão" >
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" >Salvar</button>
                          </div>
                        </form>

                        </div>
                      </div>
                    </div>

                    <!-- modal arroz -->
                    <div class="modal fade" id="modalguarnicao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Guarnição</h4>
                          </div>
                          <div class="modal-body">
                            <form action='addguarni.php' method="post">
                            <label> Guarnição </label>
                            <input type='hidden' name="id" value="<?php echo $row_pot['id']?>">
                            <div class="form-group has-feedback">
                              <input type="text" class="form-control" name='guarni' placeholder="Digite a guarnição" >
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" >Salvar</button>
                          </div>
                        </form>

                        </div>
                      </div>
                    </div>
                    </div>

                    <!-- modal arroz -->
                    <div class="modal fade" id="modalmistura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Mistura</h4>
                        </div>
                        <div class="modal-body">
                          <form action='addmistura.php' method="post">
                          <label> Mistura </label>
                          <input type='hidden' name="id" value="<?php echo $row_pot['id']?>">
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="mistura" placeholder="Digite a mistura" >
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                          <button type="sumbmit" class="btn btn-primary" >Salvar</button>
                        </div>
                      </form>
                      </div>
                    </div>
                    </div>

                    <!-- modal arroz -->
                    <div class="modal fade" id="modalsalada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Salada</h4>
                        </div>
                        <div class="modal-body">
                          <form action='addsalada.php' method="post">
                          <label> Salada </label>
                          <input type='hidden' name="id" value="<?php echo $row_pot['id']?>">
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control" name='salada' placeholder="Digite a salada" >
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-primary" >Salvar</button>
                        </div>
                      </form>
                      </div>
                    </div>
                    </div>

                <?php
              }else{
                ?>
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
                <?php
              }
             ?>

              <!-- /.box-footer-->
            </div>
          <!-- Modal -->
    </section>



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
