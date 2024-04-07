<?php

class Seq
{
    public function calculateNext($x)
    {
        return $x % 2 == 0 ? $x / 2 : 3 * $x + 1;
    }

    public function calculateRange($start, $end)
    {
        $results = [];

        for ($i = $start; $i <= $end; $i++) {
            $number = $i;
            $currentValue = $number;
            $maxValue = $currentValue;
            $iterations = 0;

            while ($currentValue != 1) {
                $currentValue = $this->calculateNext($currentValue);
                $maxValue = max($maxValue, $currentValue);
                $iterations++;
            }

            $results[] = [
                'number' => $number,
'max_value' => $maxValue,

                'iterations' => $iterations
            ];
        }

        return $results;
    }

    public function findMaxIterations($results)
    {
        $maxIterations = 0;
        $maxIterationsNumber = null;

        foreach ($results as $result) {
            if ($result['iterations'] > $maxIterations) {
                $maxIterations = $result['iterations'];
                $maxIterationsNumber = $result;
            }
        }

        return $maxIterationsNumber;
    }

    public function findMinIterations($results)
    {
        $minIterations = PHP_INT_MAX;
        $minIterationsNumber = null;

        foreach ($results as $result) {
            if ($result['iterations'] < $minIterations) {
                $minIterations = $result['iterations'];
                $minIterationsNumber = $result;
            }
        }

        return $minIterationsNumber;
    }

    public function arithmeticProgression($a, $d, $n)
    {
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            $result[] = $a + $i * $d;
        }
        return $result;
    }

    public function geometricProgression($a, $r, $n)
    {
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            $result[] = $a * pow($r, $i);
        }
        return $result;
    }

    public function simpleSequence($start, $end)
    {
        $result = [];
        for ($i = $start; $i <= $end; $i++) {
            $result[] = $i;
        }
        return $result;
    }
}

?>
