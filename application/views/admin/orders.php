<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eStore</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <h2>Orders</h2>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">Total</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $order) { ?>
                <tr>
                  <td><?= $order->getCustomerName() ?></td>
                  <td class="text-center"><?= $order->order_date ?></td>
                  <td class="text-center">$ <?= $order->getTotal() ?></td>
                  <td class="text-right">
                    <a href="<?= site_url('/admin/orders/delete/'.$order->id) ?>" class="btn btn-danger" role="button">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>