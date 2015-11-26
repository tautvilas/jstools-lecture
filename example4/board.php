<?php

header('Content-Type: application/json');

$board = array();
$numRows = 5;
$numCols = 5;
$bombChance = 20;
for ($i = 0; $i < $numRows * $numCols; $i++) {
  $board[] = rand(0, 100) < $bombChance ? true : false;
}

echo json_encode(array(
  "rows" => $numRows,
  "cols" => $numCols,
  "board" => $board
));

?>
