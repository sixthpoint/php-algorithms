<?php

date_default_timezone_set("America/Chicago");

class AlgorithmTest {

    public static function main() {

        $sampleSize = 10000000;
        $find = 10000000;
        $iterations = 10;
        $x = 0;
        $y = 0;
        $time = 0;
        
        $a = array_fill(0, $sampleSize, NULL);

        for ($i = 0; $i < $sampleSize; $i++) {
            $a[$i] = $i + 1;
        }
        
        $bse = new AlgorithmTest();
        
       // Go through all iterations
        while($x < $iterations) {
            $time = $time + $bse->search($a, $find);
            $x++;
        }
        
        echo "Average microtime: " . ($time / $iterations);
    }
    
    public function search($array, $key) {
        
        // Get the start time in microseconds, as a float value
        $starttime = (float) array_sum(explode(' ', microtime()));
        
        $idx = $this->binary_search($array, $key);
        
        /*if ($idx > 0) {
            echo "Position: " . $idx . " holds value: " . $a[$idx];
        } else {
            echo 'Value not found';
        }*/
        
        unset($array, $key);
        
        // time in microseconds
        return (float) array_sum(explode(' ', microtime())) - $starttime;
         
    }

    public function binary_search($a, $key) {
        
        $lo = 0;
        $hi = sizeof($a) - 1;

        $position = (int) (($lo + $hi) / 2);

        while (($a[$position] != $key) && ($lo <= $hi)) {

            if ($a[$position] > $key) {
                $hi = $position - 1;
            } else {
                $lo = $position + 1;
            }
            $position = (int) (($lo + $hi) / 2);
        }
        
        unset($a, $key);

        return (($lo <= $hi) ? $position : -1);
    }

}

$alg = new AlgorithmTest();
$alg->main();
