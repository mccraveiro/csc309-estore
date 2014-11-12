$(document).ready(function () {
  $('.add-to-cart-btn').click(addToCart);

  function addToCart() {
    var id = $(this).attr('data-id');
    $.get('cart/add/'+id, function (data) {
      var contents = JSON.parse(data);
      var numOfItems = Object.keys(contents).length;

      console.log(contents);
      updateNavbarQty(numOfItems);
    });
  }

  function updateNavbarQty(qty) {
    $('#navbar-cart-link').text('Cart ('+ qty +')');
  }
});