<?php
   function render_html_table($array, $cols) { 
        $table = "<table>";
        for ($i=0; $i<count($array)/$cols; $i++) {
            $table = $table."<tr>";
            for ($j=0; $j<$cols; $j++) {
                if ($cols*$i+$j < count($array)) {
                    $table = $table."<td>".$array[$cols*$i+$j]."</td>";
                }
            }
            $table = $table."</tr>";
        }
        $table = $table."</table>";
        return $table;
   }

   $a = array('kot', 'pies', 'slon', 'malpa', 'kon');
   echo render_html_table($a, 2);
?>