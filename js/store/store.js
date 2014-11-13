$(document).ready(function () {
  $('.add-to-cart-btn').click(addToCart);

  function addToCart() {
    var id = $(this).attr('data-id');
    $.get('cart/add/'+id, function (data) {
      var numOfItems = parseInt(data);
      updateNavbarQty(numOfItems);
    });
  }

  function updateNavbarQty(qty) {
    $('#navbar-cart-link').text('Cart ('+ qty +')');
  }
});