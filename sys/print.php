<?php
  include("mpdf60/mpdf.php");
  require("../connection/bd_connection.php");
  session_start();
  $mpdf=new mPDF();
  $id = $_GET['id'];
  $SQL = "SELECT * FROM pots_asks WHERE id='".$_GET['id']."'";
  $resultado = mysqli_query($con, $SQL) or die(mysqli_error($con));
  $linha = mysqli_fetch_assoc($resultado);

  $SQL_rice = "SELECT * FROM pots_rice WHERE id='".$linha['id_rice']."'";
  $resultado_rice = mysqli_query($con, $SQL_rice) or die(mysqli_error($con));
  $linha_rice = mysqli_fetch_assoc($resultado_rice);

  $SQL_bean= "SELECT * FROM pots_beans WHERE id='".$linha['id_bean']."'";
  $resultado_bean = mysqli_query($con, $SQL_bean) or die(mysqli_error($con));
  $linha_bean = mysqli_fetch_assoc($resultado_bean);

  $SQL_mixture= "SELECT * FROM pots_mixture WHERE id='".$linha['id_mixture']."'";
  $resultado_mixture = mysqli_query($con, $SQL_mixture) or die(mysqli_error($con));
  $linha_mixture = mysqli_fetch_assoc($resultado_mixture);

  $SQL_saladn= "SELECT * FROM pots_salad WHERE id='".$linha['id_salad']."'";
  $resultado_salad = mysqli_query($con, $SQL_saladn) or die(mysqli_error($con));
  $linha_salad = mysqli_fetch_assoc($resultado_salad);

  $SQL_garrison= "SELECT * FROM pots_garrison WHERE id='".$linha['id_salad']."'";
  $resultado_garrison = mysqli_query($con, $SQL_garrison) or die(mysqli_error($con));
  $linha_garrison = mysqli_fetch_assoc($resultado_garrison);

  $SQL_dessert= "SELECT * FROM dessert WHERE id='".$linha['id_dessert']."'";
  $resultado_dessert = mysqli_query($con, $SQL_dessert) or die(mysqli_error($con));
  $linha_dessert = mysqli_fetch_assoc($resultado_dessert);

  $SQL_buyer= "SELECT * FROM user_buyer WHERE id_user='".$linha['id_user']."'";
  $resultado_buyer = mysqli_query($con, $SQL_buyer) or die(mysqli_error($con));
  $linha_buyer= mysqli_fetch_assoc($resultado_buyer);


  $arroz = $linha_rice['name'];
  $feijao = $linha_bean['name'];
  $mistura = $linha_mixture['name'];
  $salada = $linha_salad['name'];
  $garrison= $linha_garrison['name'];
  $dessert = $linha_dessert['dessert_name'];
  $buyer = $linha_buyer['name'];
  $address = $linha['address'];
  $tamanh = "";
  switch ($linha['id_size']) {
    case '1':
    $tamanh = "Mini";
    break;
    case '2':
    $tamanh = "Média";
    break;
    case '3':
    $tamanh = "Grande";
    break;

  }




  $html = "<center> Pedido numero $id </center>
  <br>
  Nome do cliente: $buyer; <br>
  Tamanho da marmita: $tamanh;<br>
  Tipo de arroz: $arroz;<br>
  Tipo de feijão: $feijao;<br>
  Tipo de mistura: $mistura;<br>
  Tipo de salada: $salada;<br>
  Tipo de garrison: $garrison;<br>
  Tipo de sobremesa: $dessert;<br>
  Endereço da entrega: $address;<br>";


  $mpdf->WriteHTML($html);
  $mpdf->Output();
  exit();
