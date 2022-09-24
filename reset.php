<?php
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}

$_SESSION['history'] = [];

echo '<tr class="result_header">';
echo "<th>X</th>";
echo "<th>Y</th>";
echo "<th>R</th>";
echo "<th>Current time</th>";
echo "<th>Execution time</th>";
echo "<th>Hit</th>";
echo "</tr>";
?>

