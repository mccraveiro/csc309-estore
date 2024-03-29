<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eStore - Sign In</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('navbar.php'); ?>
    <div class="container-fluid">
      <div class="row login-title">
        <div class="col-xs-4 col-xs-offset-4">
          <div class="row">
            <div class="col-sm-offset-4 col-sm-8">
              <h1>Sign in</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
          <?php
            $action = $this->input->get('redirect') ? 'auth?redirect='.$this->input->get('redirect') : 'auth';
            echo form_open($action, array('class' => 'form-horizontal', 'role' => 'form'));
          ?>
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
              <div class="col-sm-offset-4 col-sm-8">
                <?php echo form_submit(array(
                  'name' => 'signin',
                  'value' => 'Sign in',
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