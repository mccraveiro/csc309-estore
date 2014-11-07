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
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#">eStore</a>
        </div>
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
      <div class="row login-title">
        <div class="col-xs-4 col-xs-offset-4">
          <div class="row">
            <div class="col-sm-offset-2 col-sm-10">
              <h1>Login</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
          <form class="form-horizontal" action="/login/validate" method="POST" role="form">
            <div class="form-group">
              <label for="inputLogin" class="col-sm-2 control-label">Login</label>
              <div class="col-sm-10">
                <input type="login" class="form-control" id="inputLogin" name="login" placeholder="Login">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>