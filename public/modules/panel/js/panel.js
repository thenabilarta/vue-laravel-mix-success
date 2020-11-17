$('#button').on('click', function() {
  $.ajax({
    dataType: 'json',
    url: 'http://127.0.0.1:8000/panel/ajax',
  }).done(function(res) {
    console.log(res);
  });
});
