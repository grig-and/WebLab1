<?php

session_start();
if (!isset($_SESSION['history'])) {
  $_SESSION['history'] = [];
}

$x = $_GET['x'];
$y = $_GET['y'];
$r = $_GET['r'];

if (validate($x, $y, $r)) {
  
  date_default_timezone_set('Europe/Moscow');
  $hit = check($x, $y, $r) ? "Yes" : "No";
  $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
  $currentTime = date("H:i:s");
  $_SESSION['history'][] = array(
    'x' => $x,
    'y' => $y,
    'r' => $r,
    'currentTime' => $currentTime,
    'executionTime' => $executionTime,
    'hit' => $hit
  );
} else {
  http_response_code(400);
  echo "Invalid data";
  exit();
}

$history = $_SESSION['history'];

echo '<tr class="result_header">';
echo "<th>X</th>";
echo "<th>Y</th>";
echo "<th>R</th>";
echo "<th>Current time</th>";
echo "<th>Execution time</th>";
echo "<th>Hit</th>";
echo "</tr>";
foreach ($history as $row) {

  echo "<tr class='row' value='" . strtolower($row['hit']) . "'>";
  echo "<td>" . $row['x'] . "</td>";
  echo "<td>" . $row['y'] . "</td>";
  echo "<td>" . $row['r'] . "</td>";
  echo "<td>" . $row['currentTime'] . "</td>";
  echo "<td>" . $row['executionTime'] . "</td>";
  echo "<td>" . $row['hit'] . "</td>";
  echo "</tr>";
}

function validate($x, $y, $r)
{
  if (is_numeric($x) && is_numeric($y) && is_numeric($r)) {
    if ($x >= -5 && $x <= 3) {
      if ($y >= -3 && $y <= 3) {
        if ($r >= 1 && $r <= 5) {
          return true;
        }
      }
    }
  }
  return false;
}

function check($x, $y, $r)
{
  if ($x >= 0 && $y >= 0) {
    return false;
  } else if ($x >= 0 && $y <= 0) {
    if ($x * $x + $y * $y <= $r * $r) {
      return true;
    }
  } else if ($x <= 0 && $y <= 0) {
    if ($x >= -$r / 2 && $y >= -$r) {
      return true;
    }
  } else if ($x <= 0 && $y >= 0) {
    if ($y <= $x / 2 + $r / 2) {
      return true;
    }
  }
  return false;
}
