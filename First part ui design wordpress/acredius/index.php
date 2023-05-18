<?php
get_header(); ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">General view of the projects.</h1>
    <p class="lead">List of all the the projects</p>
  </div>
</div>
<div class="container-fluid " style="width: 70%;">
  <?php echo paginate_links(); ?>
  <div class="row">
    <?php
  while(have_posts()) {
    the_post(); ?>

    <div class="col-sm-6 " style="margin-bottom: 3%;">
      <div class="card bg-light backgroudonhover">
        <div class="card-body backgroudonhover">
          <img class="card-img-top center-block" src="<?php echo get_theme_file_uri('/images/drone.jpg') ?>"
            alt="Card image cap">
          <p lass="card-text">Posted by <?php the_author_posts_link(); ?>on <?php the_time('n.j.y')?>
            in <?php echo get_the_category_list(', '); ?></p>
          <h5 class="card-title">Drone for Agriculture :Vertical Master </h5>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <p><a href="<?php the_permalink(); ?>">Continue Reading &raquo;</a></p>
          <div style="display: flex; justify-content: space-between; height: 20%;">
            <span>6% | 48 months | <i class="fas fa-circle" style="color: greenyellow;"></i> C+</span>
            <img class=" img-fluid" style="width: 10%;" src="<?php echo get_theme_file_uri('/images/ocean.jpg')  ?>">
          </div>

        </div>
      </div>
    </div>
    <?php } 
  ?>
  </div>
</div>
<?php get_footer();?>