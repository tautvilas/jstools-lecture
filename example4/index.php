<?php

$board = array();
$numRows = 5;
$numCols = 5;
$bombChance = 20;
for ($i = 0; $i < $numRows * $numCols; $i++) {
  $board[] = rand(0, 100) < $bombChance ? true : false;
}

?>

<!doctype html>
<html>
<head>
  <title>First example</title>
  <style>
    * {font-family: arial}
    table, td, th { border: 1px solid black }
    td {width: 80px; height: 80px; cursor: pointer;text-align: center;font-size: 60px}
    .bomb.discovered { background-color: red }
  </style>
</head>
<body>
  <table>
  <? for($i = 0; $i < $numRows; $i++):?>
    <tr>
    <? for($j = 0; $j < $numCols; $j++):?>
      <td class="cell <?= $board[$i * $numCols + $j] ? 'bomb' : '' ?>"
          data-index="<?= $i * $numCols + $j ?>">
      </td>
    <? endfor ?>
    </tr>
  <? endfor ?>
  </table>

  <script type="text/javascript" src="lib/jquery.js"></script>
  <script type="text/javascript" src="game.js""></script>
</body>
</html>

