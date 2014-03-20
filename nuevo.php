<?php
	  require 'src/facebook.php';
    require 'conexion_FB.php';
    require_once 'src/CurlHttpClient.php';
    require 'competitials.php';
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript" src="js/consulta_ajax.js"></script>
    <title>Social Tool</title>

    <link href="css/style.css" rel="stylesheet">

    <script>
      $(function(){
        $('#anadircomp').on('click',function(e){
          e.preventDefault();
          var addcomp = $('#nuevocomp').val();
          document.location.href='update.php?comp='+addcomp;
        });
        $('.menu li:first-child a').addClass('active');
      })


    </script>


  </head>
  <body>
    <div id="main">
    <?php include 'header.php'; ?>

    <div id="container">
      <div class="titular">
          <h3>Añade un nuevo competencial</h3>
          <p>No olvides poner fb (facebook), tw(twitter), o instag(instagram)</p>

          <div id="botones">
            <form id="addform2">
                <input id="nuevocomp" placeholder="Nuevo Competencial"/>
                <button id="anadircomp" />Crear</button>
            </form>
          </div>

      </div>
      <div id="datos"><ul id="sortable"></ul></div>
    </div>
    <div id="footer">
        <h6>2014 - Developed by <a href="https://twitter.com/kune_" target="_blank">@kune</a></h6>
    </div>
    </div>
  </body>
</html>
