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
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo anchor('/', 'eStore', array('class' => 'navbar-brand')); ?>
        </div>
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <?php
                if (isset($session['login'])) {
                  echo anchor('logout', 'Log out');
                } else {
                  echo anchor('auth', 'Log in');
                }
              ?>
            </li>
          </ul>
        </div>
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-1">
          <h2>Cards</h2>
        </div>
        <div class="col-sm-2 text-right">
          <?php
            if (isset($session['admin']) && $session['admin']) {
              echo anchor('product/new', 'Add New', array('class' => 'btn btn-warning'));
            }
          ?>
          <?php
            // foreach ($products as $product) {
            //   echo "<tr>";
            //   echo "<td>" . $product->name . "</td>";
            //   echo "<td>" . $product->description . "</td>";
            //   echo "<td>" . $product->price . "</td>";
            //   echo "<td><img src='" . base_url() . "images/product/" . $product->photo_url . "' width='100px' /></td>";
            //   echo "<td>" . anchor("store/delete/$product->id",'Delete',"onClick='return confirm(\"Do you really want to delete this record?\");'") . "</td>";
            //   echo "<td>" . anchor("store/editForm/$product->id",'Edit') . "</td>";
            //   echo "<td>" . anchor("store/read/$product->id",'View') . "</td>";
            // }
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
                  <p><?= $product->description ?></p>
                  <p>
                    <?php
                      if (isset($session['admin']) && $session['admin']) {
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>