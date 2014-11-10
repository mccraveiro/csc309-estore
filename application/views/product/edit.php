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
        <div class="col-sm-10 col-sm-offset-1">
          <h2>Edit Product</h2>
        </div>
      </div>
      <br>
      <?php if (validation_errors() !== '') { ?>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-1">
            <div class="alert alert-danger" role="alert"><?= validation_errors() ?></div>
          </div>
        </div>
      <?php } ?>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-1">
          <?= form_open('product/edit/'.$product->id, array('class' => 'form', 'role' => 'form')) ?>
            <div class="form-group">
              <label for="inputName">Name</label>
              <?= form_input(array(
                'name' => 'name',
                'value' => $product->name,
                'class' => 'form-control',
                'id' => 'inputName',
                'placeholder' => 'Name'
              )) ?>
            </div>
            <div class="form-group">
              <label for="inputDescription">Description</label>
              <?= form_input(array(
                'name' => 'description',
                'value' => $product->description,
                'class' => 'form-control',
                'id' => 'inputDescription',
                'placeholder' => 'Description'
              )) ?>
            </div>
            <div class="form-group">
              <label for="inputPrice">Price</label>
              <?= form_input(array(
                'name' => 'price',
                'value' => $product->price,
                'class' => 'form-control',
                'id' => 'inputPrice',
                'placeholder' => 'Price'
              )) ?>
            </div>
            <br>
            <?= anchor('/', 'Back', array('class' => 'btn btn-default', 'role' => 'button')) ?>
            <button type="submit" class="btn btn-primary">Save</button>
          <?= form_close() ?>
        </div>
      </div>
    </div>

    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>