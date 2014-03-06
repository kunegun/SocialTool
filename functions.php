<?php

      function nice_number($n) {
            // first strip any formatting;
            $n = (0+str_replace(",","",$n));

            // is this a number?
            if(!is_numeric($n)) return false;

            // now filter it;
            if($n>1000000000000) return round(($n/1000000000000),2).' trillion';
            else if($n>1000000000) return round(($n/1000000000),2).' billion';
            else if($n>1000000) return round(($n/1000000),2).' millons';
            else if($n>1000) return round(($n/1000),2).' thousands';

            return number_format($n);
      }

      function engage($likes,$pta){
            $engage = round((($pta / $likes) * 100),2);
            return $engage;
      }

?>