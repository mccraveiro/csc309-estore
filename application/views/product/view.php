<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eStore</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="col-xs-12 col-sm-3 col-lg-3">
            <div class="thumbnail">
              <img src="<?= base_url() ?>images/product/<?= $product->photo_url ?>" alt="<?= $product->name ?>">
            </div>
          </div>
          <div class="col-xs-12 col-sm-5 col-lg-6">
            <h2><?= $product->name ?></h2>
            <p class="text-muted">Product id: <?= $product->id ?></p>
            <h4>Price: $ <?=  money_format('%.2n', $product->price) ?></h4>
            <p><?= $product->description ?></p>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-3">
            <?php
              if (is_admin()) {
            ?>
              <div class="well">
                <?= anchor('/product/edit/'.$product->id, 'Edit', array('class' => 'btn btn-warning btn-block', 'role' => 'button')) ?>
                <?= anchor('/product/delete/'.$product->id, 'Delete', array('class' => 'btn btn-danger btn-block', 'role' => 'button')) ?>
              </div>
            <?php } else { ?>
              <div class="well">
                <?= form_open('cart/add/'.$product->id, array('class' => 'form-horizontal', 'role' => 'form')) ?>
                  <div class="form-group">
                    <label for="inputQuantity" class="col-sm-6 control-label">Quantity</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="inputQuantity" name="qty">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary btn-block">Add to cart</button>
                    </div>
                  </div>
                <?= form_close() ?>
              </div>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <?= anchor('/', 'Back', array('class' => 'btn btn-default', 'role' => 'button')) ?>
        </div>
      </div>
    </div>

    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>