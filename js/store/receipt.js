$(document).ready(function() {
  $('.send-email').click(function () {
    var id = $(this).attr('data-id');
    $('body').addClass('wait');
    $.get(id + '/email', function () {
      $('body').removeClass('wait');
      alert('Email sent!');
    });
  });
});