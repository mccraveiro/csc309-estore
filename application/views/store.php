<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eStore</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-1">
          <h2>Cards</h2>
        </div>
        <div class="col-sm-2 text-right">
          <?php
            if (is_admin()) {
              echo anchor('product/new', 'Add New', array('class' => 'btn btn-warning'));
            }
          ?>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <?php foreach ($products as $product) { ?>
            <div class="col-xs-12 col-sm-4 col-lg-3">
              <div class="thumbnail">
                <img src="<?= base_url() ?>images/product/<?= $product->photo_url ?>" alt="<?= $product->name ?>">
                <div class="caption">
                  <h3><?= $product->name ?></h3>
                  <h5>$ <?=  money_format('%.2n', $product->price) ?></h5>
                  <p><?= $product->description ?></p>
                  <p>
                    <?php
                      if (is_admin()) {
                        echo anchor('product/edit/'.$product->id, 'Edit', array('class' => 'btn btn-primary', 'role' => 'button'));
                      } else {
                        echo anchor('product/'.$product->id, 'Add to cart', array('class' => 'btn btn-primary', 'role' => 'button'));
                      }
                    ?>
                    <?= anchor('product/'.$product->id, 'View details', array('class' => 'btn btn-default', 'role' => 'button')) ?>
                  </p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>