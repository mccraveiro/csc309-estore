<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eStore</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/receipt.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row payment-information-title visible-print-block">
        <div class="col-sm-10 col-sm-offset-1">
          <h1>eStore</h1>
        </div>
      </div>
      <div class="row payment-information-title">
        <div class="col-sm-10 col-sm-offset-1">
          <h3>Payment Information</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <p class="well">
            <strong>Credit Card Number</strong><br>
            <?= preg_replace('/(\d{1,4})(?=(\d{4})+$)/', '$1 ', $order->creditcard_number) ?><br><br>
            <strong>Expiration Date</strong><br>
            <?= sprintf('%02d', $order->creditcard_month); ?> / 20<?= $order->creditcard_year ?>
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
            <?php foreach ($order->getItems() as $item) { ?>
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
                Total $<?= money_format('%.2n', $order->total) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row action-buttons hidden-print">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <a href="javascript:window.print()" class="btn btn-default">Print Receipt</a>
          <?php
            if (is_admin()) {
              echo anchor('/admin/orders', 'Back', array('class' => 'btn btn-success', 'role' => 'button'));
            } else {
              echo anchor('/', 'Continue shopping', array('class' => 'btn btn-success', 'role' => 'button'));
            }
          ?>
        </div>
      </div>
    </div>
    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>