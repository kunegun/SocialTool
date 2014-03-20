<?php
	require 'src/facebook.php';
    require 'conexion_FB.php';
    require_once 'src/CurlHttpClient.php';
    require 'competitials.php';
    require 'proceso_comp.php';

    $comp = $_GET['comp'];
	$nuevamarca = $_GET['marca'];
	$file = 'competitials.php';

	if ($nuevamarca != undefined){
		array_push($competitials[$comp], $nuevamarca);
		$arr = $competitials[$comp];
	}else{
		for ($i=0; $i<count($_GET['array_items']); $i++){
	    	$arr[] = $_GET['array_items'][$i];
		}
	}



	$stringloco = '';
	foreach($arr as $value){
		 //echo $value."<br />";
		$stringloco .= '"'.$value.'",';
	}
	$result = substr($stringloco, 0, -1);

	$searchfor = $comp;

	// the following line prevents the browser from parsing this as HTML.
	header('Content-Type: text/plain');

	// get the file contents, assuming the file to be readable (and exist)
	$contents = file_get_contents($file);
	// escape special characters in the query
	$pattern = preg_quote($searchfor, '/');
	// finalise the regular expression, matching the whole line
	$pattern = "/^.*$pattern.*\$/m";
	// search, and store all matching occurences in $matches
	if(preg_match_all($pattern, $contents, $matches)){
	   //echo "Found matches:\n";
	   //echo implode("\n", $matches[0]);

	   $line = $matches[0][0];
	   $contents = file_get_contents($file);
	   $contents = str_replace($line, '$competitials["'.$comp.'"] = array (' . $result . ');', $contents);
	   file_put_contents($file, $contents);
	}
	else{
	   	//echo "No matches found";
	   	$new_content = '$competitials["'.$comp.'"] = array (' . $result . ');';
	   	//echo "content".$new_content;

	   	$data = file($file);
		$line = $data[count($data)-1];

		$contents = file_get_contents($file);
	   	$contents = str_replace($line, '$competitials["'.$comp.'"] = array (' . $result . ');', $contents);
	   	file_put_contents($file, $contents);

	   	file_put_contents($file,  "\r\n".'?>' . PHP_EOL, FILE_APPEND);




	}

	header('Location: modificar.php');
	//echo "<script>window.location = 'modificar.php'</script>";


?>