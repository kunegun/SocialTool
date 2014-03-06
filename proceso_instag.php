<?php

	header("Content-Type: text/html;charset=utf-8");
	require 'src/facebook.php';
    require 'conexion_FB.php';
    require_once 'src/Instagram.php';
    require 'competitials.php';
	//error_reporting(E_ERROR | E_PARSE);

	$array = $competitials[$_POST[link_marca]];
		if ($array[0] == ''){
			header('Location: index.php');
	    	die();
		}
	$cont = 0;
    $results = array();

	foreach ($array as $marca) {
		$result = $instagram->getUser($marca);
		$res = json_decode($result,true);

		$nombre    = $res['data']['username'];
		$media     = $res['data']['counts']['media'];
		$followers = $res['data']['counts']['followed_by'];

		$results[$cont] = array ($nombre,$followers,$media);
		$cont++;

	}
		  $num = count($results);

		  echo "<ul class='brands'><li><h5>Marca:</h5></li>";
		  foreach ($results as $linea){
		    echo "<li>".$linea[0]."</li>";
		  }
		  echo "</ul>";

		  echo "<ul class='brands instagram'><li><table class='tb_compet'><tr><td><h5>Followers</h5></td><td><h5>Media</h5></td></tr></table></li>";
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