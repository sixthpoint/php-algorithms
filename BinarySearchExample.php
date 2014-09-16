<?php

class AlgorithmTest {

    public static function main() {

        $sampleSize = 1000;
        $a = array_fill(0, $sampleSize, NULL);

        for ($i = 0; $i < $sampleSize; $i++) {
            $a[$i] = $i + 1;
        }

        $idx = AlgorithmTest::binary_search($a, 1000);

        if ($idx > 0) {
            echo "Position: " . $idx . " holds value: " . $a[$idx];
        } else {
            echo 'Value not found';
        }
    }

    public static function binary_search($a, $key) {
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

        return (($lo <= $hi) ? $position : -1);
    }

}

$alg = new AlgorithmTest();
$alg->main();
