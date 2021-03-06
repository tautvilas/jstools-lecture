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

function initializeGame() {
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
}

$.getJSON("/board", function(data) {
  for (var i = 0; i < data.rows; i++) {
    var row = $('<tr>');
    $('#board').append(row);
    for (var j = 0; j < data.cols; j++) {
      var cell = $('<td>', {'class': 'cell', 'data-index': i * data.cols + j});
      if (data.board[i * data.cols + j]) {
        cell.addClass('bomb');
      }
      var cell = $(row).append(cell);
    }
  }
  initializeGame();
});
