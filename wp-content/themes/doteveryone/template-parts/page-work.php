<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package doteveryone
 */


// check if the post has a header image assigned to it.

if( get_field('header_image') ): 
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
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content row work-workstreams" id="our-work">
      <?php get_template_part( 'template-parts/snippets', 'term-display' ); ?>
    </div><!-- .entry-content -->
    <div class="row">
      <div class="col-sm-9">
          <?php if(get_field('display_page_title')) { ?><h2><?php the_title() ?></h2><?php } else { echo ''; } ?>
        <?php the_content(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
         <div class="entry-content" id="home-blog">
          <h2>All Projects</h2>
          <div class="row">
            <?php 
            $args = array(
              'post_type' => 'project',
              'posts_per_page' => -1
            );
            $projects = new WP_Query( $args );
            $i = 1;
            echo '<div class="row">';
            while ( $projects->have_posts() ) : $projects->the_post();
            get_template_part( 'template-parts/content', 'project' );
            if ($i % 3 == 0) { echo '</div><div class="row">'; };
            $i++;
            endwhile; 
            if ($i %3 != 0) {echo '</div';}
            wp_reset_postdata();
            ?>
          </div> 
          <div class="entry-content" id="home-blog">
            <h2>Latest Blog Posts</h2>
            <div class="row">
              <?php 
              $home_posts = new WP_Query( 'posts_per_page=3' );
              while ( $home_posts->have_posts() ) : $home_posts->the_post();
              get_template_part( 'template-parts/content', 'post' );
              endwhile; 
              wp_reset_postdata();
              ?>
            </div>
          </div><!-- .entry-content -->
        </div><!-- .entry-content -->
      </div>
    </div>
  </article><!-- #post-<?php the_ID(); ?> -->
</div>

