<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eStore</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/cart.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <h2>Shopping Cart</h2>
        </div>
      </div>
      <br>
      <div class="row cart-table-header">
        <div class="col-sm-5 col-sm-offset-1">
          Card
        </div>
        <div class="col-sm-2 text-center">
          Price
        </div>
        <div class="col-sm-3 text-right">
          Quantity
        </div>
      </div>
      <div class="row cart-table-header-separator">
        <div class="col-sm-10 col-sm-offset-1">
          <hr>
        </div>
      </div>
      <?php foreach ($cart_contents as $item) { ?>
        <div class="row cart-table-item">
          <div class="col-sm-5 col-sm-offset-1">
            <?= $item['name'] ?>
          </div>
          <div class="col-sm-2 text-center">
            $ <?=  money_format('%.2n', $item['price']) ?>
          </div>
          <div class="col-sm-3 text-right">
            <form class="form-inline" role="form">
              <div class="form-group">
                <input type="text" class="form-control quantity-update-input" name="qty" value="<?= $item['qty'] ?>" placeholder="0" />
              </div>
              <button type="submit" class="btn btn-default">Update</button>
            </form>
          </div>
        </div>
        <div class="row cart-table-separator">
          <div class="col-sm-10 col-sm-offset-1">
            <hr>
          </div>
        </div>
      <?php } ?>
      <div class="row cart-table-footer">
        <div class="col-sm-1 col-sm-offset-7 text-right">
          Total:
        </div>
        <div class="col-sm-2 text-right">
          $ <?= money_format('%.2n', $cart_total) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <?= anchor('/', 'Continue Shopping', array('class' => 'btn btn-default', 'role' => 'button')) ?>
          <?= anchor('/', 'Checkout', array('class' => 'btn btn-success', 'role' => 'button')) ?>
        </div>
      </div>
    </div>
    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>