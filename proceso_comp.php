<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<?php
  header("Content-Type: text/html;charset=utf-8");
  require 'competitials.php';

  $array = $competitials[$_POST[link_marca]];

  $cont = 0;
  $results = array();

  foreach ($array as $marca){
    echo "<li class='ui-state-default'><span class='ui-icon ui-icon-arrowthick-2-n-s'></span>".$marca."</li>";
  }
?>