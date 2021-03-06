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
          $(function() {
              $('.menu li:nth-child(2) a').addClass('active');
              $( "#sortable" ).sortable();
              $( "#sortable" ).disableSelection();

              var compete;

              $('#ordenar').on('click',function(){
                  var nuevoOrden = new Array();
                  $('#sortable').each(function(){
                     $(this).find('li').each(function(){
                        //console.log($(this).text());
                        nuevoOrden.push($(this).text());
                     });
                  })
                  //console.log(nuevoOrden);
                  var arr=nuevoOrden;
                  var str;
                  for(var i=0; i<arr.length; i++) {

                      str+='&array_items[]='+arr[i];
                  }
                    compete = $('.competencial').text();
                    //console.log(compete);
                    document.location.href='update.php?comp='+compete+'&marca='+str;
              });

              $('#add').on('click',function(){
                  $('#addform').css('display','block');
                  compete = $('.competencial').text();
              });


              $('#anadirmarca').on('click',function(e){
                    e.preventDefault();
                    var addmarca = $('#nuevamarca').val();
                    //console.log("marca"+addmarca);
                    document.location.href='update.php?comp='+compete+'&marca='+addmarca;
              });

          });

          function borrar(){
            $('.borrar').on('click',function(){
                $(this).parent().remove();
            })
          };

    </script>
  </head>
  <body>
    <div id="main">

      <?php include 'header.php'; ?>

      <div id="container">
        <div class="titular">
            <h3>Elige un competencial para modificar</h3>
            <p>Desde aquí puedes cambiar el orden de las marcas, añadir nuevas y eliminar las que ya no interesan.</p>

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
              <div id="botones">
                  <button id="ordenar"> Guardar orden</button>
                  <button id="add">Añadir al competencial</button>
                  <form id="addform" >
                      <input id="nuevamarca" placeholder="añadir marca"/>
                      <button id="anadirmarca" />Añadir</button>
                  </form>
              </div>

        </div>
        <div id="datos"><ul id="sortable"></ul></div>
      </div>
      <div id="footer">
          <h6>2014 - Developed by <a href="https://twitter.com/kune_" target="_blank">@kune</a></h6>
      </div>
      <div style="clear:both"></div>
  </div>
  </body>
</html>
