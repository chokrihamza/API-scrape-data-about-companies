<!DOCTYPE html>
<html>

  <head>
    <?php wp_head(); ?>
  </head>


  <body>
    <header class="site-header">
      <nav class="navbar navbar-light" style="background-color: #E0E0E0;">
        <h1 class="school-logo-text float-left"><a class="text-warning" style="text-decoration:none;"
            href="<?php echo site_url() ?>">
            <img class="card-img-top center-block" style="width: 25%;"
              src="<?php echo get_theme_file_uri('/images/logo.png') ?>" alt="Card image cap">
            Loan Application</a>
        </h1>
        <button type="button" class="btn btn-warning">
          <a style="text-decoration:none" href="<?php echo site_url('/?page_id=22') ?>">About Us</a>
        </button>
      </nav>

    </header>