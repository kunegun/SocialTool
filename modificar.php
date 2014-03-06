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

     <style>
      #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
      #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
      #sortable li span { position: absolute; margin-left: -1.3em; }
    </style>

    <script>
          $(function() {
              $( "#sortable" ).sortable();
              $( "#sortable" ).disableSelection();

              $('#ordenar').on('click',function(){
                  $('#sortable').each(function(){
                     $(this).find('li').each(function(){
                        console.log($(this).text());
                     });
                  })
              });

          });


    </script>
  </head>
  <body>
    <?php include 'header.php'; ?>

    <div id="container">
      <div class="titular">
          <h3>Elige un competencial para modificar</h3>

            <?php
                $resultado = (array_keys($competitials));
                $i = 0;
                echo "<select class='opciones' name='variable' onchange='mostrarCompetencial(this.value)'>";
                echo "<option value=''></option>";
                foreach ($competitials as $marca) {

                  $brand = $resultado[$i];
                  echo "<option value='$brand'>$brand</option>";
                  //echo $marca[0];
                  $i++;
                }
                echo "</select>";

            ?>

            <button id="ordenar"> Guardar orden</button>
            <button id="add">Añadir al competencial</button>

      </div>
      <div id="datos"><ul id="sortable"></ul></div>
    </div>
    <div id="footer">
        <h6>2014 - Developed by <a href="https://twitter.com/kune_" target="_blank">@kune</a></h6>
    </div>

  </body>
</html>
