<?php
  header("Content-Type: text/html;charset=utf-8");
  require 'src/facebook.php';
  require 'conexion_FB.php';
  require 'functions.php';
  require 'competitials.php';

  $array = $competitials[$_POST[link_marca]];

  $cont = 0;
  $results = array();

  foreach ($array as $marca){

    $ch = curl_init("https://graph.facebook.com/$marca/?access_token=$access_token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $raw = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($raw);

    $likes = $data->likes;
    $pta = $data->talking_about_count;
    $name = $data->name;

    $results[$cont] = array ($name,$likes,$pta);

    $cont++;

  }
  $num = count($results);

  echo "<ul class='brands'><li><h5>Marca:</h5></li>";
  foreach ($results as $linea){
    echo "<li>".$linea[0]."</li>";
  }
  echo "</ul>";

  echo "<ul class='brands facebook'><li><table class='tb_compet'><tr><td><h5>Likes</h5></td><td><h5>Pta</h5></td></tr></table></li>";
  foreach ($results as $linea){
    //echo $linea[1].$linea[2];
    echo "<li>";
    echo "<table class='tb_compet'><tr>";
    echo "<td>".$linea[1]."</td>";
    echo "<td>".$linea[2]."</td>";
    echo "</tr><tr><td>&nbsp;</td><td>&nbsp;</td>";
    echo "</tr></table></li>";
  }
  echo "</ul>";

?>