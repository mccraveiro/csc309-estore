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
            <li class="text-primary">Payment Information</li>
            <li class="text-muted">Review</li>
            <li class="text-muted">Receipt</li>
          </ol>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-9 col-sm-offset-1">
          <?= form_open('checkout', array('class' => 'form', 'role' => 'form')); ?>
            <div class="row">
              <div class="col-xs-12">
                <h3>Payment Information</h3>
              </div>
            </div>
            <br><br>
            <?php if (validation_errors() !== '') { ?>
              <div class="row">
                <div class="form-group col-xs-12 col-sm-7">
                  <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
                </div>
              </div>
            <?php } ?>
            <div class="row">
              <div class="form-group col-xs-12 col-sm-7">
                <label class="control-label">Credit Card Number</label>
                <?php echo form_input(array(
                  'name' => 'creditcard_number',
                  'value' => set_value('creditcard_number'),
                  'class' => 'form-control',
                  'id' => 'creditcard'
                )); ?>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-4 col-sm-2">
                <label class="control-label">Expiration Month</label>
                <select class="form-control" name="creditcard_month" value="<?= set_value('creditcard_month') ?>">
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="form-group col-xs-4 col-sm-2">
                <label class="control-label">Expiration Year</label>
                <select class="form-control" name="creditcard_year" value="<?= set_value('creditcard_year') ?>">
                  <option value="14">2014</option>
                  <option value="15">2015</option>
                  <option value="16">2016</option>
                  <option value="17">2017</option>
                  <option value="18">2018</option>
                  <option value="19">2019</option>
                  <option value="20">2020</option>
                  <option value="21">2021</option>
                  <option value="22">2022</option>
                  <option value="23">2023</option>
                  <option value="24">2024</option>
                </select>
              </div>
            </div>
            <br><br>
            <div class="row">
              <div class="form-group">
                <div class="col-xs-12">
                  <?= anchor('/cart', 'Back', array('class' => 'btn btn-default', 'role' => 'button')) ?>
                  <?php echo form_submit(array(
                    'name' => 'payment',
                    'value' => 'Continue',
                    'class' => 'btn btn-primary'
                  )); ?>
                </div>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <?php $this->load->view('scripts.php'); ?>
    <script src="/js/jquery.maskedinput.js"></script>
    <script src="/js/store/checkout.js"></script>
  </body>
</html>