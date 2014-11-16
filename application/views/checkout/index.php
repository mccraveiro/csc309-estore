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
      <div class="row checkout-header">
        <div class="col-sm-10 col-sm-offset-1">
          <h2>Checkout</h2>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-3 col-sm-offset-3 text-center">
          <p class="checkout-auth-message lead text-muted">Already a customer?</p>
          <?= anchor('/auth?redirect=checkout', 'Sign in', array('class' => 'btn btn-success', 'role' => 'button')) ?>
        </div>
        <div class="col-sm-3 text-center">
          <p class="checkout-auth-message lead text-muted">New customer?</p>
          <?= anchor('/signup?redirect=checkout', 'Sign up', array('class' => 'btn btn-primary', 'role' => 'button')) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <?= anchor('/cart', 'Back', array('class' => 'btn btn-default back-button', 'role' => 'button')) ?>
        </div>
      </div>
    </div>
    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>