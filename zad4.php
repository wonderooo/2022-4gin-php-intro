<?php
    function render_csv($array, $cols) {
        $csv_file = fopen('render.csv', 'w') or die('Unable to open file');
        $text = "";
        for ($i=0; $i<$cols; $i++) {
            if ($i != $cols-1) {
                $text = $text.$i.",";
            } else {
                $text = $text.$i."\n";
            }
        }
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

    function render_md($array, $cols) {
        $md_file = fopen('render.md', 'w') or die('Unable to open file');
        $text = ">|";
        for ($i=0; $i<$cols; $i++) {
            if ($i != $cols-1) {
                $text = $text." ".$i." |";
            } else {
                $text = $text." ".$i." |\n>|";
                for ($j=0; $j<$cols; $j++) {
                    if ($j != $cols-1) {
                        $text = $text."---|";
                    } else {
                        $text = $text."---|\n>|";
                    }
                }
            }
        }
        for ($n=1; $n<=count($array); $n++) {
           if ($n % $cols == 0 and $n != count($array)) {
                $text = $text." ".$array[$n-1]." |\n>|";
           } else {
                $text = $text." ".$array[$n-1]." |";
           }
        }
        fwrite($md_file, $text);
        fclose($md_file);
    }

    $a = array('kot', 'pies', 'slon', 'malpa', 'kon', 'chomik');
    render_csv($a, 2);
    render_md($a, 2);
?>