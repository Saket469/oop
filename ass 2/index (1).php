<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x + 1 Function Calculator</title>
</head>
<body>
    <h2>Calculate 3x + 1 Function</h2>
    <form action="index.php" method="post">
        <label for="start">Start Number:</label>
        <input type="number" id="start" name="start" >
        <label for="end">End Number:</label>
        <input type="number" id="end" name="end" >
        <button type="submit">Calculate</button>
    </form>

    <?php
    include 'functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $start = $_POST["start"];
        $end = $_POST["end"];

        if (!is_null($start) && !is_null($end)) {
            $seq = new Seq();
            $results = $seq->calculateRange($start, $end);

            echo "<h3>Results:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Number</th><th>Max Value</th><th>Iterations</th></tr>";
            foreach ($results as $result) {
                echo "<tr><td>{$result['number']}</td><td>{$result['max_value']}</td><td>{$result['iterations']}</td></tr>";
            }
            echo "</table>";

            $maxIterationsNumber = $seq->findMaxIterations($results);
            $minIterationsNumber = $seq->findMinIterations($results);

            echo "<h3>Number with Maximum Iterations:</h3>";
            echo "Number: {$maxIterationsNumber['number']}<br>";
            echo "Iterations: {$maxIterationsNumber['iterations']}<br>";
            echo "Max Value: {$maxIterationsNumber['max_value']}<br>";

            echo "<h3>Number with Minimum Iterations:</h3>";
            echo "Number: {$minIterationsNumber['number']}<br>";
            echo "Iterations: {$minIterationsNumber['iterations']}<br>";
            echo "Max Value: {$minIterationsNumber['max_value']}<br>";

            // Display arithmetic progression
            echo "<h3>Arithmetic Progression:</h3>";
            $arithmeticSequence = $seq->arithmeticProgression($start, 1, $end - $start + 1);
            echo implode(", ", $arithmeticSequence);
        } else {
            echo "Please provide both start and end numbers.";
        }
    }
    ?>
</body>
</html>
