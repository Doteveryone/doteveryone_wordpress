<?php
/**
 * Template part for displaying project content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package doteveryone
 */
get_header();
?>
<?php
while ( have_posts() ) :
the_post();

?>


  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="container">
        <div class="row">
          <div class="col-sm-11 col-xs-10">
              <h2><?php the_title(); ?></h2>
          </div>
          <div class="col-sm-1 col-xs-2 workstreams">
            <!--<?php 
              $terms = get_the_terms( $post,'workstream');
              foreach($terms as $term) {
              $image = get_field('icon', $term);
            ?><a  href="/work/<?php echo $term->slug; ?>">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $term->name ?>" >
            </a>
            <?php
              }
            ?>-->
          </div>
        </div>
        <hr />  
        <div class="row">
          <div class="col-sm-9">
            <?php the_content(); ?>
          </div>
          <div class="col-sm-3">
            <?php 
            if (get_field('author')) { 
             echo 'By: <a href="/about/">';
             the_field('author');
             echo '</a>';
            }
            ?>
            <?php get_sidebar(); ?>
          </div>
        </div>
      <hr />
      </div>
    </article>
<?php endwhile; // End of the loop. ?>

<?php
get_footer();
?>
