<?php
    function render_csv($array, $cols) {
        $csv_file = fopen('render.csv', 'w') or die('Unable to open file');
        $text = "";
        for ($n=1; $n<=count($array); $n++) {
           if ($n % $cols == 0) {
                $text = $text.$array[$n-1]."\n";
           } else {
                $text = $text.$array[$n-1].",";
           }
        }
        fwrite($csv_file, $text);
        fclose($csv_file);
    }

    $a = array('kot', 'pies', 'slon', 'malpa', 'kon', 'chomik');
    render_csv($a, 2);
?>