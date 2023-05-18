<?php
  
  get_header();
/* show the details of the page in a separetly for more inforamtion */
  while(have_posts()) {
    the_post(); ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php the_title(); ?></h1>
    <p class="lead">Detailed view of a project</p>
  </div>
</div>
<h3>
  <span><?php the_title()?>
    Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y')?>
    in <?php echo get_the_category_list(', '); ?>
  </span>
</h3>
</div>
<div><?php the_content(); ?></div>
</div>
<!-- using a table to show details -->
<div class="container">
  <div class="row align-items-start">
    <div class="col">
      <table class="table table-hover proj">
        <tbody>
          <tr>
            <td><i class="fas fa-tags icons"></i><span> Project ID</span></td>
            <td>P.5553L14P</td>
          </tr>
          <tr>
            <td><i class="fas fa-coins icons"></i> <span> needed</span></td>
            <td>CHF 20'000</td>
          </tr>
          <tr>
            <td><i class="fas fa-hand-holding-usd icons"></i><span> Interest</span></td>
            <td>6%</td>
          </tr>
          <tr>
            <td><i class="fas fa-search icons"></i><span> Risk class</span></td>
            <td>C+</td>
          </tr>
          <tr>
            <td><i class="fas fa-stopwatch icons"></i><span>Loan duration</span> </td>
            <td>48 months</td>
          </tr>
          <tr>
            <td><i class="fas fa-map-marker-alt icons"></i><span> Location</span></td>
            <td>Vaud</td>
          </tr>

          <tr>
            <td><i class="fas fa-city icons"></i><span>Industry</span> </td>
            <td>Eduction</td>
          </tr>

        </tbody>
      </table>
    </div>

  </div>
  <div class="row align-items-start">
    <div class="col">
      <div style="width: 45%; margin-left:12%;">

        <h4>Project description</h4>
        <p>Project Gutenberg is proud to cooperate with The World Library
          in the presentation of The Complete Works of William Shakespeare
          for your reading for education and entertainment. HOWEVER, THIS
          IS NEITHER SHAREWARE NOR PUBLIC DOMAIN. . .AND UNDER THE LIBRARY
          OF THE FUTURE CONDITIONS OF THIS PRESENTATION. . .NO CHARGES MAY
          BE MADE FOR *ANY* ACCESS TO THIS MATERIAL. YOU ARE ENCOURAGED!!
          TO GIVE IT AWAY TO ANYONE YOU LIKE, BUT NO CHARGES ARE ALLOWED!!</p>
      </div>
    </div>

  </div>
</div>
<?php }

  get_footer();

?>