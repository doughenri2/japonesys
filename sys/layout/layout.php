<?php

function getImage(){
  require("../connection/bd_connection.php");
  if($_SESSION['user_type'] == 2){
    $profile_icon_null = "images/profile_icon_null.png";
    $SQL = "SELECT logo_address FROM user_f WHERE id_user = '".$_SESSION['id_user']."'";
    $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    if($row['logo_address'] != ""){
      return $row['logo_address'];
    }else{
      return $profile_icon_null;
    }
  }else{
    $profile_icon_null = "images/profile_icon_null.png";
    $SQL = "SELECT logo_address FROM user_j WHERE id_user = '".$_SESSION['id_user']."'";
    $result = mysqli_query($con, $SQL) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    if($row['logo_address'] != ""){
      return $row['logo_address'];
    }else{
      return $profile_icon_null;
    }
  }
}

function topmenu(){
  ?>
  <header class="main-header">

    <!-- Logo -->
    <a href="../sys/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>O</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Marmitex</b>Online</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo getImage() ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo getImage()?>" class="img-circle" alt="User Image">
                <p>
                <?php echo $_SESSION['name']; ?>
                  <small>Membro desde <?php echo $_SESSION['date_entry']?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="company.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="sair.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php
}

  function aside(){
    ?>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo getImage() ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['name']; ?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <ul class="sidebar-menu">
          <li class="header">HEADER</li>
          <li><a href="../sys/"><i class="fa fa-home"></i> <span>Ínicio</span></a></li>
          <li><a href="company.php"><i class="fa fa-building"></i> <span>Meu estabelecimento/endereço</span></a></li>
          <li><a href="phones.php"><i class="fa fa-mobile-phone"></i> <span>Meus telefones</span></a></li>
          <li><a href="drinks.php"><i class="fa fa-glass"></i> <span>Minhas bebidas</span></a></li>
          <li><a href="menus.php"><i class="fa fa-bars"></i> <span>Cardápios</span></a></li>
        </ul>
      </section>
    </aside>
    <?php
  }

  function rodape(){
  ?>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        Anything you want
      </div>
      <strong>Copyright &copy; 2017 <a href="#">Marmitex Online</a>.</strong> Todos os direitos reservados.
    </footer>
    <?php
  }
 ?>
