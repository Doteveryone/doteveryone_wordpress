<?php
/**
 * Template part for displaying Workstream taxonomy terms
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package doteveryone
 */
get_header();

$current_term = get_queried_object();
$header_image = get_field('banner_image', $term);
$tax_query = array(
              array(
              'taxonomy' => 'workstream',
              'field' => 'slug',
              'terms' => $current_term->slug
               )
              );
$image = get_field('icon', $current_term);
$color = get_field('color', $current_term); 
$extended_description = get_field('extended_description', $current_term);

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php 
        if($current_term->parent != 0) {
        ?>
        <div id="banner_full" style="background-color:<?php echo $color ?>">  
          <div class="container">
            <div class="col-sm-12">  
              <header>
                 <h1><?php echo $current_term->name; ?></h1>
              </header>
            </div>
          </div>
        </div>
        <?php } ?>
      <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="row" id="workstream_meta">
            <?php if($current_term->parent == 0) { ?>
              <div class="col-sm-3">
                <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $term->name ?>">     
              </div>
              <div class="col-sm-8">
                <h3 style="color: <?php echo $color;?>"><?php echo $current_term->name; ?><h3>
                <p> 
                  <?php echo $current_term->description;?>
                </p>     
              </div>
                <?php the_content(); ?>
                  <?php 
                    $terms = get_terms( array(
                    'taxonomy' => 'workstream',
                    'hide_empty' => false,
                    'exclude' => $current_term->term_id,
                    'parent' => 0
                     ));
                    echo '<div class="col-sm-1 workstreams">';
                    foreach($terms as $term) {
                    $image = get_field('icon', $term);
                    $color = get_field('color', $term);
                  ?>
                    <a style="color: <?php echo $color; ?>" href="/work/<?php echo $term->slug; ?>">
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $term->name ?>" ></a>
                  <?php
                    }
                    echo'</div> ';
                  ?>
                  <?php } else { ?>
                  <?php } ?>
              
            </div><!-- .entry-content -->
            <div class="row">
              <?php if($extended_description != "") { ?>
              <div class="col-sm-11 col-xs-12 term_lede">
                <p> 
                  <?php echo $extended_description;?>
                </p>     
              </div>
            <?php } ?>
            </div>
            <div class="entry-content">
              <?php 
                $taxonomy_name = 'workstream';
                $term_children = get_term_children( $current_term->term_id, $taxonomy_name );
                if (count($term_children) > 0) {
                echo '<div class="row" id="workstream_children"><h2>Work Streams</h2>';
                foreach ( $term_children as $child ) {
                  $term = get_term_by( 'id', $child, $taxonomy_name );
                  $color = get_field('color', $term);
                  echo '<div class="col-sm-4 col-xs-12 workstream_child"><a style="background-color:'.$color.'" href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></div>';
                }
                echo '</div>';
              }
               ?>
              <!-- <h2>Projects</h2> -->
                <!-- <div class="row"> -->
                  <?php
                  $args = array(
                    'posts_per_page'=> -1,
                    'post_type'=>'project',
                    'tax_query' => $tax_query
                  );

                  // $projects = new WP_Query( $args );
                  $i = 1;
                  // echo '<div class="row">';
                  // while ( $projects->have_posts() ) : $projects->the_post();
                  // get_template_part( 'template-parts/content', 'project' );
                  // if ($i % 3 == 0) { echo '</div><div class="row">'; };
                  // $i++;
                  // endwhile; 
                  // wp_reset_postdata();
                  // if ($i %3 != 0) {echo '</div';};
                  ?>

                <!-- </div> -->
              </div>
              <?php 
              $args = array(
                'posts_per_page'=> '20',
                'post_type'=>'project',
                'tax_query' => $tax_query);
              $i = 1;
              $home_posts = new WP_Query($args);
              if ($home_posts->have_posts()) { ?>
              <div class="entry-content">
                <h2>Related Projects</h2>
                  <div class="row" id="related_project_carousel">
                    <?php
                      while ( $home_posts->have_posts() ) : $home_posts->the_post();
                      get_template_part( 'template-parts/content', 'project' );
                      if ($i % 3 == 0) { echo '</div><div class="row">'; };
                      $i++;
                      endwhile; 
                      wp_reset_postdata(); 
                      if ($i %3 != 0) {echo '</div';};
                      ?>
                  </div>
                </div>
              <?php
              }
              ?>
              <?php 
              $args = array(
                'posts_per_page'=> '20',
                'post_type'=>'post',
                'tax_query' => $tax_query);
              $home_posts = new WP_Query($args);
              if ($home_posts->have_posts()) { ?>
              <div class="entry-content">
                <h2>Related Posts</h2>
                  <div class="row" id="related_post_carousel">
                    <?php
                      while ( $home_posts->have_posts() ) : $home_posts->the_post();
                      get_template_part( 'template-parts/content', 'post' );
                      endwhile; 
                      wp_reset_postdata(); ?>
                  </div>
                </div>
              <?php
              }
              ?>
            </article><!-- #post-<?php the_ID(); ?> -->
          </div>
        </div>
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
?>