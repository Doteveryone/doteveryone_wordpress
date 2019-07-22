<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package doteveryone
 */

?>
<?php if( get_field('header_image') ): ?>
        <?php
        $header_image = get_field('header_image');
        ?>
        <div id="banner_full" style="background-image: url('<?php echo $header_image['sizes']['banner_full']; ?>');">  
          <div class="container">
            <div class="col-sm-12">  
              <header>
                <?php if(get_field('header_image_text')) { ?>
                 <h1 style="color:<?php the_field('header_image_text_color'); ?>"><?php the_field('header_image_text'); ?></h1>
                <?php } ?>
              </header>
            </div>
          </div>
        </div>
      <?php endif; ?>
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php if(get_field('display_page_title')) { ?><h2><?php the_title() ?></h2><?php } else { echo ''; } ?>
        <?php the_content(); ?>
      </article><!-- #post-<?php the_ID(); ?> -->
    </div>
    <div class="col-sm-4">
      <?php the_field('sidebar_content'); ?>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-9">
        <a name="team"></a>
        <h3>Our Team</h3>
        <?php the_field('team_intro'); ?>
    </div>
    <?php 
    $i = 1;
    echo '<div class="row">';
    // check if the repeater field has rows of data
    if( have_rows('team') ):
      // loop through the rows of data
        while ( have_rows('team') ) : the_row();
            // display a sub field value
          get_template_part( 'template-parts/content', 'headshot' );
          if ($i % 3 == 0) { echo '</div><div class="row">'; };
          $i++;
        endwhile;
        if ($i %3 != 0) {echo '</div';};
    else :
        // no rows found
    endif;
    ?>
  </div>
</div>
<div class="container">
    <div class="row">
      <div class="col-sm-9">
        <h3>Our Trustees</h3>
        <?php the_field('trustees_intro'); ?>
      </div>
      <?php 
      $i = 1;
      echo '<div class="row">';
      // check if the repeater field has rows of data
      if( have_rows('trustees') ):
        // loop through the rows of data
          while ( have_rows('trustees') ) : the_row();
              get_template_part( 'template-parts/content', 'headshot' );
              if ($i % 3 == 0) { echo '</div><div class="row">'; };
              $i++;
          endwhile;
          if ($i %3 != 0) {echo '</div';};
      else :
          // no rows found
      endif;
      ?>
   </div>
</div>
<?php if( have_rows('fellows') ): ?>
<div class="container">
    <div class="row">
          <div class="row">
      <div class="col-sm-9">
          <h3>Our Fellows</h3>
          <?php the_field('fellows_intro'); ?>
        </div>
      </div>
          <?php 
          // check if the repeater field has rows of data
            // loop through the rows of data
              while ( have_rows('fellows') ) : the_row();
                  get_template_part( 'template-parts/content', 'headshot' );

              endwhile;
          ?>
    </div>
</div>
<?php           else :
              // no rows found
          endif;
          ?>
