<?php
    class Table {
        private $array;

        function __construct($array) {
            $this->array = $array;
        }

        function get_array() {
            return $this->array;
        }

        function set_array($array) {
            $this->array = $array;
        }

        function split_and_sort($delim=null) {
            $new_array = $this->array;
            if (isset($delim)) {
                $filtered = array();
                foreach ($new_array as $word) {
                    if (strpos($word, $delim) !== false) {
                        array_push($filtered, $word);
                    }
                }
                sort($filtered);
                return($filtered);
            } else {
                sort($new_array);
                return($new_array);
            }
        }

        function render_html_table($cols) { 
            $table = "<table>";
            for ($i=0; $i<count($this->array)/$cols; $i++) {
                $table = $table."<tr>";
                for ($j=0; $j<$cols; $j++) {
                    if ($cols*$i+$j < count($this->array)) {
                        $table = $table."<td>".$this->array[$cols*$i+$j]."</td>";
                    }
                }
                $table = $table."</tr>";
            }
            $table = $table."</table>";
            return $table;
        }

        function render_csv($cols, $filename) {
            $csv_file = fopen($filename, 'w') or die('Unable to open file');
            $text = "";
            for ($i=0; $i<$cols; $i++) {
                if ($i != $cols-1) {
                    $text = $text.$i.",";
                } else {
                    $text = $text.$i."\n";
                }
            }
            for ($n=1; $n<=count($this->array); $n++) {
            if ($n % $cols == 0) {
                    $text = $text.$this->array[$n-1]."\n";
            } else {
                    $text = $text.$this->array[$n-1].",";
            }
            }
            fwrite($csv_file, $text);
            fclose($csv_file);
        }

        function render_md($cols, $filename) {
            $md_file = fopen($filename, 'w') or die('Unable to open file');
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
            for ($n=1; $n<=count($this->array); $n++) {
               if ($n % $cols == 0 and $n != count($this->array)) {
                    $text = $text." ".$this->array[$n-1]." |\n>|";
               } else {
                    $text = $text." ".$this->array[$n-1]." |";
               }
            }
            fwrite($md_file, $text);
            fclose($md_file);
        }
    }

    $array = array('kuba', 'piotr', 'bartek', 'krzys', 'dominik', 'adam');
    $table = new Table($array);

    $sorted = $table->split_and_sort('a');
    foreach ($sorted as $word) {
        echo $word.' ';
    }

    echo $table->render_html_table(2);

    $table->render_csv(2, 'table_class.csv');
    $table->render_md(2, 'table_class.md');
?>