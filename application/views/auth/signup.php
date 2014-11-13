<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row login-title">
        <div class="col-xs-4 col-xs-offset-4">
          <div class="row">
            <div class="col-sm-offset-2 col-sm-10">
              <h1>Sign up</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
          <?php echo form_open('auth', array('class' => 'form-horizontal', 'role' => 'form')); ?>

            <div class="form-group">
              <label for="FirstName" class="col-sm-2 control-label">First Name</label>
              <div class="col-sm-10">
                <?php echo form_input(array(
                  'name' => 'FirstName',
                  'value' => set_value('FirstName'),
                  'class' => 'form-control',
                  'id' => 'FirstName',
                  'placeholder' => 'First Name',
                  'maxlength' => '24'
                )); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="LastName" class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-10">
                <?php echo form_input(array(
                  'name' => 'LastName',
                  'value' => set_value('LastName'),
                  'class' => 'form-control',
                  'id' => 'LastName',
                  'placeholder' => 'Last Name',
                  'maxlength' => '24'
                )); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="Email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <?php echo form_input(array(
                  'name' => 'Email',
                  'value' => set_value('Email'),
                  'class' => 'Email',
                  'id' => 'Email',
                  'placeholder' => 'Email',
                  'maxlength' => '45'
                )); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="inputLogin" class="col-sm-2 control-label">Login</label>
              <div class="col-sm-10">
                <?php echo form_input(array(
                  'name' => 'login',
                  'value' => set_value('login'),
                  'class' => 'form-control',
                  'id' => 'inputLogin',
                  'placeholder' => 'Login',
                  'maxlength' => '16'
                )); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <?php echo form_password(array(
                  'name' => 'password',
                  'value' => '',
                  'class' => 'form-control',
                  'id' => 'inputPassword',
                  'placeholder' => 'Password',
                  'maxlength' => '16'
                )); ?>
              </div>
              </br></br></br>
              <div class="form-group">
              <label for="RepeatPassword" class="col-sm-2 control-label">Repeat Password</label>
              <div class="col-sm-10">
                <?php echo form_password(array(
                  'name' => 'Repeatpassword',
                  'value' => '',
                  'class' => 'form-control',
                  'id' => 'RepeatPassword',
                  'placeholder' => 'Repeat Password',
                  'maxlength' => '16'
                )); ?>
              </div>

            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <?php echo form_submit(array(
                  'name' => 'signup',
                  'value' => 'Sign up',
                  'class' => 'btn btn-default'
                )); ?>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
      <?php if (validation_errors() !== '') { ?>
        <div class="row login-title">
          <div class="col-xs-4 col-xs-offset-4">
            <div class="row">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <?php $this->load->view('scripts.php'); ?>
  </body>
</html>