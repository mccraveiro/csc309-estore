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
        <?php
          if (!is_admin()) {
            echo '<li>';
            echo anchor('cart', 'Cart ('.cart_number_of_items().')', array('id' => 'navbar-cart-link'));
            echo '</li>';
          }
        ?>
        <li>
          <?php
            if (is_logged()) {
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