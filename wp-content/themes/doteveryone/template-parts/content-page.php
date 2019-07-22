<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package doteveryone
 */


// check if the post has a Post Thumbnail assigned to it.

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
<div class="container" id="page-content">
  <div class="row">
    <?php if(get_field('sidebar')) { ?>
      <div class="col-sm-9" id="">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php if(get_field('display_page_title')) { ?><h2><?php the_title() ?></h2><?php } else { echo ''; } ?>
          <?php the_content(); ?>
        </article><!-- #post-<?php the_ID(); ?> -->
      </div>
      <div class="col-sm-3" id="page_sidebar">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php the_field('sidebar_content'); ?>
        </article><!-- #post-<?php the_ID(); ?> -->
      </div>
    <?php } else { ?>
      <div class="col-sm-12">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php if(get_field('display_page_title')) { ?><h2><?php the_title() ?></h2><?php } else { echo '<h2></h2>'; } ?>
          <?php the_content(); ?>
        </article><!-- #post-<?php the_ID(); ?> -->
      </div>
  <?php } ?>
  </div>
</div>
