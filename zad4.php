<?php
    function render_csv($array, $cols) {
        $csv_file = fopen('render.csv', 'w') or die('Unable to open file');
        for ($i=0; $i<count($array)/$cols; $i++) {
            $row = "";
            for ($j=0; $j<$cols; $j++) {
                $idx = $cols*$i+$j;
                if ($idx < $cols*($i+1)-1 and $idx < count($array)) {
                    $row = $row.$array[$idx].",";
                } else if ($idx == $cols*($i+1)-1 and $idx < count($array)) {
                    $row = $row.$array[$idx]."\n";
                }
            }
            fwrite($csv_file, $row);
        }
        fclose($csv_file);
    }

    $a = array('kot', 'pies', 'slon', 'malpa', 'kon', 'chomik');
    render_csv($a, 2);
?>