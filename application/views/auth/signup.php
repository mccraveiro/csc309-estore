<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row login-title">
        <div class="col-xs-7 col-xs-offset-2">
          <div class="row">
            <div class="col-sm-offset-4 col-sm-8">
              <h1>Sign up</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7 col-xs-offset-2">
          <?php echo form_open('signup', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <div class="form-group">
              <label for="inputFirstName" class="col-sm-4 control-label">First Name</label>
              <div class="col-sm-8">
                <?php echo form_input(array(
                  'name' => 'first',
                  'value' => set_value('first'),
                  'class' => 'form-control',
                  'id' => 'inputFirstName',
                  'placeholder' => 'First Name',
                  'maxlength' => '24'
                )); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputLastName" class="col-sm-4 control-label">Last Name</label>
              <div class="col-sm-8">
                <?php echo form_input(array(
                  'name' => 'last',
                  'value' => set_value('last'),
                  'class' => 'form-control',
                  'id' => 'inputLastName',
                  'placeholder' => 'Last Name',
                  'maxlength' => '24'
                )); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-4 control-label">Email</label>
              <div class="col-sm-8">
                <?php echo form_input(array(
                  'name' => 'email',
                  'value' => set_value('email'),
                  'class' => 'form-control',
                  'id' => 'inputEmail',
                  'placeholder' => 'Email',
                  'maxlength' => '45'
                )); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputLogin" class="col-sm-4 control-label">Login</label>
              <div class="col-sm-8">
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
              <label for="inputPassword" class="col-sm-4 control-label">Password</label>
              <div class="col-sm-8">
                <?php echo form_password(array(
                  'name' => 'password',
                  'value' => '',
                  'class' => 'form-control',
                  'id' => 'inputPassword',
                  'placeholder' => 'Password',
                  'maxlength' => '16'
                )); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputRepeatPassword" class="col-sm-4 control-label">Repeat Password</label>
              <div class="col-sm-8">
                <?php echo form_password(array(
                  'name' => 'repeatpassword',
                  'value' => '',
                  'class' => 'form-control',
                  'id' => 'inputRepeatPassword',
                  'placeholder' => 'Repeat Password',
                  'maxlength' => '16'
                )); ?>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8">
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
          <div class="col-xs-7 col-xs-offset-2">
            <div class="row">
              <div class="col-sm-offset-4 col-sm-8">
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