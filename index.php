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
  <script type="text/javascript">
    function bombCount(cell) {
      var index = parseInt($(cell).attr('data-index'));
      var check = [index - 5, index + 5];
      if (index % 5) { check.push(index - 1); }
      if ((index+1) % 5) { check.push(index + 1); }
      var count = 0;
      check.forEach(function(val) {
        count += $('.cell.bomb[data-index=' + val + ']').length;
      });
      return count;
    }

    $('.cell').click(function() {
      $(this).addClass('discovered');
      if ($(this).hasClass('bomb')) {
        alert('You lose :(');
      } else {
        $(this).text(bombCount(this));
      }
      if ($('.cell.discovered:not(.bomb)').length === $('.cell:not(.bomb)').length) {
        alert('You win!');
      }
    });
  </script>
</body>
</html>

