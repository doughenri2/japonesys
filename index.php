<!DOCUMENT html>
<html>
  <head>
    <meta charset="utf-8">
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" href="css/materialize.css" />
     <link rel="stylesheet" href="css/style.css"/>


     <style>
      #div_background{
        background-image: url("images/marmita.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
      }

      #input_edit{
        background-color: #fff;
        border-radius: 5px;
        width: 30%;
      }

      #btn_buscar{
        height:40px;
      }
     </style>

  </head>
  <body>
    <nav>
      <div class="nav-wrapper grey darken-4">
        <a href="#" class="brand-logo"><img src="images/logo.png" height="50" style="margin:8px;"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="sass.html">Como pedir</a></li>
          <li><a href="badges.html">Quem somos</a></li>
          <li class="active"><a href="sys/">Entrar</a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col s12" id="div_background" style="border:0px solid red;height:100%;">
        <div class="col s12" style="border:0px solid #000; margin-top:5%;height:80%;">
          <center> <img src="images/logo.png" height="100" width="100" style="margin-top:10%;">
            <br>
            <input type="text" name="cep" id="input_edit">
            <a class="waves-effect waves-light btn red" id="btn_buscar">Buscar</a>
        </div>

      </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script src="js/materialize.js"></script>

  </body>
</html>
