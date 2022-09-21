<?php
    function split_and_sort($array, $delim=null) {
        if (isset($delim)) {
            $filtered = array();
            foreach ($array as $word) {
                if (strpos($word, $delim) !== false) {
                    array_push($filtered, $word);
                }
            }
            sort($filtered);
            return($filtered);
        } else {
            sort($array);
            return($array);
        }
    }

    $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mi nulla, porttitor nec consequat sed, laoreet a nulla. Quisque tortor purus, hendrerit vitae tristique eu, vehicula et justo. Morbi mollis leo eu feugiat rutrum. In at nibh velit. Vivamus non dui at quam mollis malesuada. Morbi at porttitor velit. Curabitur dapibus, sapien ut elementum consequat, nunc mauris consequat enim, at porttitor mi enim et augue. Duis eget dolor suscipit, tincidunt odio nec, cursus metus. Donec in arcu sed magna auctor varius. Nam eu tempor sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut non.";
    $lorem_array = explode(' ', $lorem);
    $out = split_and_sort($lorem_array, "e");
    foreach ($out as $word) {
        echo $word." ";
    }
?>