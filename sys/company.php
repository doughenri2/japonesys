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



    <style>
      #div_addresses{
        display: none;
        padding: 0px;
      }


    </style>


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
                  <form role="form" enctype="multipart/form-data" method="post" id="form_profile_f" action="profile_edit.php">
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

                      <?php
                      $display = "";

                      if($row['make_delivery'] == 0){
                        $display = "style='display: none;'";
                      }


                       ?>
                      <div class="form-group" id="nboor_div" <?php echo $display?>>
                        <button type="button" class="btn btn-primary" data-toggle='modal' data-target='#modalBairros'> Adicionar bairro </button><br>
                      </div>
                      <?php
                        $SQLnboor = "SELECT * FROM neighborhood_taxes WHERE id_user='".$_SESSION['id_user']."'";
                        $result_n = mysqli_query($con, $SQLnboor) or die(mysqli_error($con));
                        if(mysqli_num_rows($result_n) > 0){
                          ?>
                          <h3> Bairros e taxas </h3>
                          <table class="table table-hover">
                            <tr> <td> Bairro </td> <td> Preço </td> <td> Ação </td> </tr>
                            <?php
                            while($linha_n = mysqli_fetch_assoc($result_n)){
                              echo "<tr><td>".$linha_n['nboor_name']."</td><td>".$linha_n['nboor_tax']."</td><td> <button type='button' class='btn btn-danger delete_nboor' id='".$linha_n['id']."'> Excluir </button> </td></tr>";
                            }
                            ?>
                          </table>
                          <?php
                        }

                       ?>
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="image" name="image">
                        <p class="help-block">Clique para mudar o logo</p>
                      </div>

                      <?php

                      if($row['cep'] == "" || $row['cep'] == null){
                        ?>
                        <label>CEP</label>
                          <div class="form-group">
                            <div class="form-group has-feedback">
                               <input type="text" class="form-control" placeholder="Digite o seu CEP" id='cep' name='cep'>
                             </div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-success" id='btn_search'>Consultar</button>
                          </div>
                        <small> *Digite o cep e o sistema buscará automaticamente. </small><br><br>


                        <div class="col-md-12" id="div_addresses">
                        <label> Cidade </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" >
                        </div>
                        <label> UF </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" >
                        </div>
                        <label> Rua </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="street" name="street" placeholder="Rua" >
                        </div>
                        <label> Número </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="number" name="number" placeholder="Número" >
                        </div>
                        <label> Bairro </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="nboor" name="nboor" placeholder="Bairro" >
                        </div>
                        <label> Complemento </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento" >
                        </div>
                        </div>

                        <?php
                      }else{
                        ?>
                        <label>CEP</label>
                          <div class="form-group">
                            <div class="form-group has-feedback">
                               <input type="text" class="form-control" placeholder="Digite o seu CEP" id='cep' value="<?php echo $row['cep']?>" name='cep'>
                             </div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-success" id='btn_search'>Consultar</button>
                          </div>
                        <small> *Digite o cep e o sistema buscará automaticamente. </small><br><br>


                        <label> Cidade </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']?>" placeholder="Cidade" >
                        </div>
                        <label> UF </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="uf" name="uf" value="<?php echo $row['uf']?>" placeholder="UF" >
                        </div>
                        <label> Rua </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="street" name="street" value="<?php echo $row['street']?>" placeholder="Rua" >
                        </div>
                        <label> Número </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="number" name="number" value="<?php echo $row['number']?>" placeholder="Número" >
                        </div>
                        <label> Bairro </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="nboor" name="nboor" value="<?php echo $row['nboor']?>" placeholder="Bairro" >
                        </div>
                        <label> Complemento </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="complement" name="complement" value="<?php echo $row['complement']?>" placeholder="Complemento" >
                        </div>
                        <?php
                      }

                       ?>


                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </form>
                  <?php
                }else{
                  echo "<h3> Usuário não encontrado. </h3>";
                }
              }else{
                //juridica
                $SQL = "SELECT * FROM user_j WHERE id_user='".$_SESSION['id_user']."'";
                $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
                if($result){
                  $row = mysqli_fetch_assoc($result);
                  ?>
                  <form role="form" enctype="multipart/form-data" method="post" id="form_profile" action="profile_edit.php">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" readonly="true" value="<?php echo $row['user_cnpj']?>" placeholder="CNPJ">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Razão Social</label>
                        <input type="text" class="form-control" id="social_name" name="social_name" value="<?php echo $row['social_name']?>" placeholder="Razão social">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nome fantasia</label>
                        <input type="text" class="form-control" id="fantasy_name" name="fantasy_name" value="<?php echo $row['fantasy_name']?>" placeholder="Nome fantasia">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Horário de início de funcionamento</label>
                        <input type="time" class="form-control" id="start_hour" name="start_hour" value="<?php echo $row['start_hour']?>" placeholder="Horario de inicio">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Horário de término de funcionamento</label>
                        <input type="time" class="form-control" id="finish_hour" name="finish_hour" value="<?php echo $row['finish_hour']?>" placeholder="Horario de termino">
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
                      <?php
                        $display = "";
                        if($row['make_delivery'] == 0){
                          $display = "style='display: none;'";
                        }
                       ?>
                      <div class="form-group" id="nboor_div" <?php echo $display?>>
                        <button type="button" class="btn btn-primary" data-toggle='modal' data-target='#modalBairros'>Adicionar bairros </button>
                      </div>

                      <?php
                        $SQLnboor = "SELECT * FROM neighborhood_taxes WHERE id_user='".$_SESSION['id_user']."'";
                        $result_n = mysqli_query($con, $SQLnboor) or die(mysqli_error($con));
                        if(mysqli_num_rows($result_n) > 0){
                          ?>
                          <table class="table table-hover">
                            <tr> <td> Bairro </td> <td> Preço </td> <td> Ação </td></tr>
                            <?php
                            while($linha_n = mysqli_fetch_assoc($result_n)){
                              echo "<tr><td>".$linha_n['nboor_name']."</td><td>".$linha_n['nboor_tax']."</td><td> <button type='button' class='btn btn-danger delete_nboor' id='".$linha_n['id']."'> Excluir </button> </td></tr>";
                            }
                            ?>
                          </table>
                          <?php
                        }

                       ?>
                      <div class="form-group">
                        <label for="exampleInputFile">Seu logo</label>
                        <input type="file" id="image" name="image">
                        <p class="help-block">Clique para mudar o logo</p>
                      </div>

                      <?php

                      if($row['cep'] == "" || $row['cep'] == null){
                        ?>
                        <label>CEP</label>
                          <div class="form-group">
                            <div class="form-group has-feedback">
                               <input type="text" class="form-control" placeholder="Digite o seu CEP" id='cep' name='cep'>
                             </div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-success" id='btn_search'>Consultar</button>
                          </div>
                        <small> *Digite o cep e o sistema buscará automaticamente. </small><br><br>
                        <div class="col-md-12" id="div_addresses">
                        <label> Cidade </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" >
                        </div>
                        <label> UF </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" >
                        </div>
                        <label> Rua </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="street" name="street" placeholder="Rua" >
                        </div>
                        <label> Número </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="number" name="number" placeholder="Número" >
                        </div>
                        <label> Bairro </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="nboor" name="nboor" placeholder="Bairro" >
                        </div>
                        <label> Complemento </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento" >
                        </div>
                        </div>

                        <?php
                      }else{
                        ?>
                        <label>CEP</label>
                          <div class="form-group">
                            <div class="form-group has-feedback">
                               <input type="text" class="form-control" placeholder="Digite o seu CEP" id='cep' value="<?php echo $row['cep']?>" name='cep'>
                             </div>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-success" id='btn_search'>Consultar</button>
                          </div>
                        <small> *Digite o cep e o sistema buscará automaticamente. </small><br><br>


                        <label> Cidade </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']?>" placeholder="Cidade" >
                        </div>
                        <label> UF </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="uf" name="uf" value="<?php echo $row['uf']?>" placeholder="UF" >
                        </div>
                        <label> Rua </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="street" name="street" value="<?php echo $row['street']?>" placeholder="Rua" >
                        </div>
                        <label> Número </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="number" name="number" value="<?php echo $row['number']?>" placeholder="Número" >
                        </div>
                        <label> Bairro </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="nboor" name="nboor" value="<?php echo $row['nboor']?>" placeholder="Bairro" >
                        </div>
                        <label> Complemento </label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" id="complement" name="complement" value="<?php echo $row['complement']?>" placeholder="Complemento" >
                        </div>
                        <?php
                      }

                       ?>

                          <label> Formas de pagamento </label>
                         <div class="form-group has-feedback">
                           <?php
                            $checked1 = "";
                            $checked2 = "";
                            $checked3 = "";

                            $SQL_payment = "SELECT * FROM user_payment_methods WHERE id_user='".$_SESSION['id_user']."' AND id_payment_method='1'";
                            $result_pay = mysqli_query($con, $SQL_payment) or die(mysqli_error($con));
                            if(mysqli_num_rows($result_pay) > 0){
                              $checked1 = "checked='true'";
                            }

                            $SQL_payment2 = "SELECT * FROM user_payment_methods WHERE id_user='".$_SESSION['id_user']."' AND id_payment_method='2'";
                            $result_pay2 = mysqli_query($con, $SQL_payment2) or die(mysqli_error($con));
                            if(mysqli_num_rows($result_pay2) > 0){
                              $checked2 = "checked='true'";
                            }

                            $SQL_payment3 = "SELECT * FROM user_payment_methods WHERE id_user='".$_SESSION['id_user']."' AND id_payment_method='3'";
                            $result_pay3 = mysqli_query($con, $SQL_payment3) or die(mysqli_error($con));
                            if(mysqli_num_rows($result_pay3) > 0){
                              $checked3 = "checked='true'";
                            }


                            ?>
                           <input type="checkbox" class="form-group payment_method" value="1" onchange="teste(1)" <?php echo $checked1 ?> class="payment_form"> Dinheiro <br>
                           <input type="checkbox" class="form-group payment_method" value="2" onchange="teste(2)" <?php echo $checked2 ?>  class="payment_form"> Cartão de Débito <br>
                           <input type="checkbox" class="form-group payment_method" value="3" onchange="teste(3)" <?php echo $checked3 ?>  class="payment_form"> Cartão de crédito <br>


                       </div>
                    </div>


                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Enviar</button>
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
                  <div class="modal fade" id="modalBairros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Nova Sobremesa</h4>
                        </div>
                        <div class="modal-body">
                          <label> Nome do bairro</label>
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control" id="nboorname" placeholder="Nome do bairro" >
                          </div>
                          <label> Preço da taxa </label>
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control money" id="nboorprice" placeholder="Preço do bairro" >
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                          <button type="button" class="btn btn-primary" id='btn_save_nboor'>Salvar</button>
                        </div>
                      </div>
                    </div>
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
<script src="js/maskmoney.js"></script>
<script src="js/company_j.js"></script>
<script src="js/company_f.js"></script>



<script>


$(document).ready(function(){

  $(".money").maskMoney({prefix:'R$ '});

  $("#select_delivery").change(function(){
    switch ($(this).val()) {
      case "1":
        $("#nboor_div").fadeIn();
        break;
      case "2":
      $("#nboor_div").fadeOut();
        break;
    }
  });

  $("#btn_save_nboor").click(function(){
    if($("#nboorname").val() != "" && $("#nboorprice").val() != ""){
      $.post( "nboortaxes.php", {
        nboorname: $("#nboorname").val(),
        nboorprice: $("#nboorprice").val()
       })
      .done(function( data ) {
        var obj = jQuery.parseJSON(data);
        if(obj.status){
          alert(obj.message);
          location.reload();
        }else{
          alert(obj.message);
        }
      });
    }else{
      alert("Digite as informacoes sobre o bairro corretamente.");
    }
  });

  $(".delete_nboor").click(function(){
    var c = confirm("Tem certeza que quer excluir o bairro?");
    if(c){
      $.post( "del_nboor.php", {
        id: $(this).attr("id")
       })
      .done(function( data ) {
        var obj = jQuery.parseJSON(data);
        if(obj.status){
          alert(obj.message);
          location.reload();
        }else{
          alert(obj.message);
        }
      });
    }
  });

});


function teste(i){
  $.post( "edit_paymentform.php", {
    value: i
   })
  .done(function( data ) {
    console.log(data);


    var obj = jQuery.parseJSON(data);
    if(obj.status){
      alert(obj.message);
      location.reload();
    }else{
      alert(obj.message);
    }
  });
}
</script>

</body>
</html>
