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
          <h2>Customers</h2>
        </div>
      </div>
      <br>
      <?php if (count($customers) > 0) { ?>
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customers as $customer) { ?>
                  <tr>
                    <td><?= $customer->getName() ?></td>
                    <td><?= $customer->email ?></td>
                    <td class="text-right">
                      <a href="<?= site_url('/admin/customers/delete/'.$customer->id) ?>" class="btn btn-danger" role="button">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php } else { ?>
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 text-center">
            <p class="empty-message lead text-muted">You have no customers.</p>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>