<?php


  function menu(){
    ?>
    <nav>
      <div class="nav-wrapper grey darken-4">
        <a href="index.php" class="brand-logo"><img src="images/logo.png" height="50" style="margin:8px;"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="sass.html">Como pedir</a></li>
          <li><a href="badges.html">Quem somos</a></li>
          <?php
          if(isset($_SESSION['name']) && $_SESSION['name'] !=""){
            ?>
            <li class="active"><a href="sys/sair.php">Sair</a></li>
            <?php
          }else{
            ?>
            <li class="active"><a href="sys/">Entrar</a></li>

            <?php
          }?>
        </ul>
      </div>
    </nav>

    <?php
  }






 ?>
