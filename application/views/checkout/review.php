<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eStore</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/checkout.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <ol class="breadcrumb">
            <li><?= anchor('/cart', 'Shopping Cart') ?></li>
            <li><?= anchor('/checkout', 'Payment Information') ?></li>
            <li class="text-primary">Review</li>
            <li class="text-muted">Receipt</li>
          </ol>
        </div>
      </div>
      <br>
      <div class="row payment-information-title">
        <div class="col-sm-10 col-sm-offset-1">
          <h3>Payment Information</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <p class="well">
            <strong>Credit Card Number</strong><br>
            2323 2312 2313 2312<br><br>
            <strong>Expiration Date</strong><br>
            09 / 2017
          </p>
        </div>
      </div>
      <div class="row payment-information-title">
        <div class="col-sm-10 col-sm-offset-1">
          <h3>Order Details</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="well">
            <div class="row cart-table-header">
              <div class="col-sm-6">
                Card
              </div>
              <div class="col-sm-3 text-center">
                Price
              </div>
              <div class="col-sm-3 text-right">
                Quantity
              </div>
            </div>
            <div class="row cart-table-header-separator">
              <div class="col-sm-12">
                <hr>
              </div>
            </div>
            <?php foreach ($cart_contents as $item) { ?>
              <div class="row cart-table-item">
                <div class="col-sm-6">
                  <?= $item['name'] ?>
                </div>
                <div class="col-sm-3 text-center">
                  $ <?=  money_format('%.2n', $item['price']) ?>
                </div>
                <div class="col-sm-3 text-right">
                  <?= $item['qty'] ?>
                </div>
              </div>
              <div class="row cart-table-separator">
                <div class="col-sm-12">
                  <hr>
                </div>
              </div>
            <?php } ?>
            <div class="row cart-table-footer">
              <div class="col-sm-10 col-sm-offset-1 text-center">
                Total $<?= money_format('%.2n', $cart_total) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row action-buttons">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <?= anchor('/checkout', 'Back', array('class' => 'btn btn-default', 'role' => 'button')) ?>
          <?= anchor('/checkout/review?confirmed=true', 'Finish Order', array('class' => 'btn btn-success', 'role' => 'button')) ?>
        </div>
      </div>
    </div>
    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>