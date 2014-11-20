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
    <?php $this->load->view('receipt/receipt.php'); ?>
    <div class="container-fluid">
      <div class="row action-buttons hidden-print">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <a href="javascript:window.print()" class="btn btn-default">Print Receipt</a>
          <?php
            if (is_admin()) {
              echo anchor('/admin/orders', 'Back', array('class' => 'btn btn-success', 'role' => 'button'));
            } else {
              echo '<button class="btn btn-default send-email" data-id="'.$order->id.'">Send Email</button>';
              echo anchor('/', 'Continue shopping', array('class' => 'btn btn-success', 'role' => 'button'));
            }
          ?>
        </div>
      </div>
    </div>
    <?php $this->load->view('scripts.php'); ?>
    <script src="/js/store/receipt.js"></script>
  </body>
</html>