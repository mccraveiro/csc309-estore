<div class="container-fluid">
  <div class="row information-title visible-print-block">
    <div class="col-sm-10 col-sm-offset-1">
      <h1>eStore</h1>
    </div>
  </div>
  <div class="row information-title">
    <div class="col-sm-10 col-sm-offset-1">
      <h3>Order #<?= $order->id ?></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <p class="well">
        <strong>Customer Name</strong><br>
        <?= $order->getCustomerName() ?><br><br>
        <strong>Order Date</strong><br>
        <?= $order->order_date ?> - <?= $order->order_time ?>
      </p>
    </div>
  </div>
  <div class="row information-title">
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
  <div class="row information-title">
    <div class="col-sm-10 col-sm-offset-1">
      <h3>Order Details</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="well">
        <div class="row cart-table-header">
          <div class="col-xs-6">
            Card
          </div>
          <div class="col-xs-3 text-center">
            Price
          </div>
          <div class="col-xs-3 text-right">
            Quantity
          </div>
        </div>
        <div class="row cart-table-header-separator">
          <div class="col-xs-12">
            <hr>
          </div>
        </div>
        <?php
          $items = $order->getItems();
          $total_items = count($items);

          foreach ($items as $index => $item) {
        ?>
          <div class="row cart-table-item">
            <div class="col-xs-6">
              <?= $item['name'] ?>
            </div>
            <div class="col-xs-3 text-center">
              $ <?=  money_format('%.2n', $item['price']) ?>
            </div>
            <div class="col-xs-3 text-right">
              <?= $item['qty'] ?>
            </div>
          </div>
          <?php if ($index + 1 < $total_items) { ?>
            <div class="row cart-table-separator">
              <div class="col-xs-12">
                <hr>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="row cart-table-footer">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          Total $<?= money_format('%.2n', $order->total) ?>
        </div>
      </div>
    </div>
  </div>
</div>