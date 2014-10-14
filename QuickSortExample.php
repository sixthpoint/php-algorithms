<?php

date_default_timezone_set("America/Chicago");

class AlgorithmTest {

    public static function main() {

        $sampleSize = 100;
        $iterations = 1;
        $x = 0;
        $time = 0;

        $a = array_fill(0, $sampleSize, NULL);

        for ($i = 0; $i < $sampleSize; $i++) {
            $a[$i] = rand(0, 100);
        }

        $bse = new AlgorithmTest();

        // Go through all iterations
        while ($x < $iterations) {
            $time = $time + $bse->quickSort($a, 0, $sampleSize - 1);
            $x++;
        }

        echo "Average microtime: " . ($time / $iterations);
    }

    /**
     * Sorts a array by finding the middle then dividing and conquering
     *
     * @param array
     * @param start
     * @param end
     */
    public function quickSort($array, $start, $end) {

        // Align the left and right starting positions
        $leftPos = $start;
        $rightPos = $end;

        // if there is only one element in the partition, do not do any sorting
        if (($end - $start) < 1) {
            return;
        }

        $pivot = $array[$start];

        // keep scanning because the left and right indecies have not met
        while ($rightPos > $leftPos) {

            while ($array[$leftPos] <= $pivot && $leftPos <= $end && $rightPos > $leftPos) {
                $leftPos++; // start left look for element greater than the pivot
            }

            while ($array[$rightPos] > $pivot && $rightPos >= $start && $rightPos >= $leftPos) {
                $rightPos--; // from right look for element not greater than the pivot
            }

            if ($rightPos > $leftPos) {
                $this->swap($array, $leftPos, $rightPos); // if the left index is still smaller than the right index, swap the corresponding elements
            }
        }

        // after the indices have crossed, swap the last element in the left partition with the pivot
        $this->swap($array, $start, $rightPos);

        // quicksort the left partition
        $this->quickSort($array, $start, $rightPos - 1);

        // quicksort the right partition
        $this->quickSort($array, $rightPos + 1, $end);
    }

    public function swap($array, $index1, $index2) {
        $temp = $array[$index1];
        $array[$index1] = $array[$index2];
        $array[$index2] = $temp;
    }

}

$alg = new AlgorithmTest();
$alg->main();
