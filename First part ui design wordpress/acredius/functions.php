<?php

function loan_app() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'uniquestylesheetid', get_template_directory_uri() . '/css/mysyle.css' );
  wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
  wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
  wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
  wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_script( 'load-fa', 'https://kit.fontawesome.com/fc4782f7c5.js' );
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
  

}

  


add_action('wp_enqueue_scripts', 'loan_app');

function loan_features() {
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'loan_features');