<?php
	  require 'src/facebook.php';
    require 'conexion_FB.php';
    require_once 'src/CurlHttpClient.php';
    require 'competitials.php';
    header('X-Frame-Options: GOFORIT');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.png">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <title>Social Tool</title>
    <!-- Bootstrap -->
<!--     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'header.php'; ?>

    <div id="container">
      <div class="titular">
          <h3>Elige un competencial</h3>

            <?php
                $resultado = (array_keys($competitials));
                $i = 0;
                echo "<select class='opciones' name='variable' onchange='mostrarInfo(this.value)'>";
                echo "<option value=''></option>";
                foreach ($competitials as $marca) {

                  $brand = $resultado[$i];
                  echo "<option value='$brand'>$brand</option>";
                  //echo $marca[0];
                  $i++;
                }
                echo "</select>";
            ?>
      </div>
      <div id="datos"></div>
    </div>
    <div id="footer">
        <h6>2014 - Developed by <a href="https://twitter.com/kune_" target="_blank">@kune</a></h6>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/consulta_ajax.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed
    <script src="bootstrap/js/bootstrap.min.js"></script>-->
  </body>
</html>
