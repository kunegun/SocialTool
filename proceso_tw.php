<?php
  header("Content-Type: text/html;charset=utf-8");
  ini_set('display_errors', 1);
  require_once('src/TwitterAPIExchange.php');
  require 'src/facebook.php';
  require 'conexion_FB.php';
  require 'functions.php';
  require 'competitials.php';

  /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
  $settings = array(
      'oauth_access_token' => "61026963-fA2RMefFWeQfj7RxvwkYwSEqE4VCSunuAA4EoCkhP",
      'oauth_access_token_secret' => "Wip91npOBiIaLCdoWPyqfnOqIQygwNwe7j4FR1w438p8q",
      'consumer_key' => "Je7RrYpFhsiEZRoV11JCQ",
      'consumer_secret' => "upISJgaHoS63y8kGdTukZlxdYruq6SYiTIn8EPwA"
  );

  $array = $competitials[$_POST['link_marca']];

  if (($_POST['link_marca'] == "Generali_tw") || ($_POST['link_marca'] == "Suchard_tw")) {
    //echo "diferente";
    $diferente = true;
  }else{
    $diferente = false;
  }

  $cont = 0;
  $results = array();

  foreach ($array as $marca){
      $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
      $getfield = '?screen_name='.$marca;
      $requestMethod = 'GET';

      $twitter = new TwitterAPIExchange($settings);
      $response = $twitter->setGetfield($getfield)
                          ->buildOauth($url, $requestMethod)
                         ->performRequest();

      $resultado = json_decode($response,true);

      $followers = $resultado[0]['user']['followers_count'];

      $results[$cont] = array ($marca,$followers);
      $cont++;

  }
  $num = count($results);

  echo "<ul class='brands'><li><h5>Marca:</h5></li>";
  foreach ($results as $linea){
    echo "<li>".$linea[0]."</li>";
  }
  echo "</ul>";
  echo "<ul class='brands twitter'><li><table class='tb_compet'><tr><td><h5>Followers</h5></td></tr></table></li>";
      foreach ($results as $linea){
        //echo $linea[1].$linea[2];
        echo "<li>";
        echo "<table class='tb_compet'><tr>";
        echo "<td>".$linea[1]."</td>";
        if ($diferente){
            echo "</tr><td>&nbsp;</td>";
        }
        echo "</tr></table></li>";
      }
      echo "</ul>";


?>