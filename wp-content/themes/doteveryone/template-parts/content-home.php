<?php
/**
 * Template part for displaying homepage content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package doteveryone
 */

?>
  <?php 
  // check if the post has a Post Thumbnail assigned to it.
    if ( has_post_thumbnail() ) {
      $bg_img = get_the_post_thumbnail_url($post,'banner_full_home');
    } ?>
  <div id="banner_full" style="background-image: url('<?php echo $bg_img; ?>');">  
    <div class="container">
      <div class="col-sm-12">  
        <header>
          <h1 style="color:<?php the_field('banner_text_color'); ?>"><?php the_field('banner_text'); ?></h1>
          <div class="col-sm-4 col-sm-offset-4 "><a class="action_link" href="<?php the_field('header_link'); ?>"><?php the_field('banner_link_text'); ?></a></div>
        </header>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <a href="/work" class="large"><h2>Our Work</h2></a>
          <div class="entry-content row" id="our-work">
                     <?php get_template_part( 'template-parts/snippets', 'term-display' ); ?>
          </div><!-- .entry-content -->
           <div class="entry-content" id="home-blog-featured">
            <?php 
            $post_objects = get_field('featured_posts');
            if( $post_objects ): 
                $i = 1;
                echo "<div class='entry-content' id='home-blog'><h2>".get_field('featured_posts_title')."</h2></a><div class='row'>";
                foreach( $post_objects as $post): // variable must be called $post (IMPORTANT)  setup_postdata($post); 
                    get_template_part( 'template-parts/content', $post->post_type );
                    if ($i % 3 == 0) { echo '</div><div class="row">'; };
                    $i++;
                 endforeach; 
                 if ($i %3 != 0) {echo '</div';};
                 wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
            endif; ?>
          </div>
          </div><!-- .entry-content -->
          <div class="entry-content" id="home-blog">
            <a href="/blog" class="large"><h2>Latest Blog Posts</h2></a>
            <div class="row" id="blog_post_carousel">
              <?php 
              $home_posts = new WP_Query( 'posts_per_page=12' );
              while ( $home_posts->have_posts() ) : $home_posts->the_post();
              get_template_part( 'template-parts/content', 'post' );
              endwhile; 
              wp_reset_postdata();
              ?>
            </div>
          </div><!-- .entry-content -->
          <div class="quote-box" id="home-quote">
              <div class="two-third">
                <blockquote><?php the_field('quote_text'); ?></blockquote>
                <h3><?php the_field('quote_author'); ?></h3>
                <h4><?php the_field('quote_author_bio'); ?></h4>
              </div>
              <div class="one-third">
                <div class="headshot">
                <?php 
                  $image = get_field('quote_author_image');
                  if( !empty($image) ): ?>
                  <img src="<?php echo $image['sizes']['grid-third']; ?>" alt="<?php echo $image['alt']; ?>" />
                  <?php endif; ?>
                  </div>
              </div>

          </div>
        </article><!-- #post-<?php the_ID(); ?> -->
      </div>
    </div>
  </div>
