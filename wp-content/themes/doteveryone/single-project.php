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
      <?php if( get_field('header_image', $post) ): ?>
        <?php
        $header_image = get_field('header_image', $post);
        ?>
        <div id="banner_full" style="background-image: url('<?php echo $header_image['url']; ?>');">  
          <div class="container">
            <div class="col-sm-12">  
              <header>
              </header>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="container">
        <div class="row">
          <div class="col-sm-11 col-xs-10">
            <?php if ( get_field( 'show_title' ) ): ?>
              <h2><?php the_title(); ?></h2>
            <?php else: // field_name returned false ?>

            <?php endif; // field_name ?>
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
        <?php if ( get_field( 'show_title' ) ): ?>
                    <hr />
        <?php else: // field_name returned false ?>
        <?php endif; // field_name ?>
        <div class="row">
          <div class="col-sm-9">
            <?php the_content(); ?>
          </div>
          <div class="col-sm-3">
            <?php the_field('sidebar_content'); ?>
            <?php 
            // check if the repeater field has rows of data
            if( have_rows('publications') ):
              echo '<h3>Publications</h3>';
              echo '<div class="row">';
              // loop through the rows of data
                while ( have_rows('publications') ) : the_row();
                    // display a sub field value
                    $resource_type = get_sub_field('link_or_document');
                    if ($resource_type == "Link") {
                      $link = get_sub_field('link');
                    }
                    if ($resource_type == "Document") {
                      $file = get_sub_field('file');
                      $link = $file['url'];
                    }
                    
                    $image = get_sub_field('preview_image');
                    echo '<div class="publication col-sm-12"><a class="document_link" href="'.$link.'"><img src="'.$image['url'].'" alt="'.get_sub_field('image_alt_text').'"><span>'.get_sub_field('title').'</a></div>';
                endwhile;
                echo '</div>';
            else :
                // no rows found
            endif;
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
          <h3>
            <?php 
            // check if the repeater field has rows of data
            if( have_rows('team') ):
              echo '<h4>On the team:</h4><h3>';
              // loop through the rows of data
              $team_string = "";
                while ( have_rows('team') ) : the_row();
                    // display a sub field value
                    $team_string = $team_string.'<a href="'.get_sub_field('link').'">'.get_sub_field('name').'</a>, ';
                endwhile;
                $team_string = rtrim($team_string,", ");
                echo $team_string;
                echo '</h3>';
            else :
                // no rows found
            endif;
            ?>
        </div>
      </div>
      <hr />
        <div class="row">
          <div class="col-sm-12">
          <h3>Related Posts</h3>
          <?php 
            $post_objects = get_field('related_posts');
            if( $post_objects ): 
                $i = 1;
                echo "<div class='row'>";
                foreach( $post_objects as $post): // variable must be called $post (IMPORTANT)  setup_postdata($post); 
                    get_template_part( 'template-parts/content', 'post' );
                    if ($i % 3 == 0) { echo '</div><div class="row">'; };
                    $i++;
                 endforeach; 
                 if ($i %3 != 0) {echo '</div>';};
                 wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
            endif; ?>
          </div>
      <?php
        $post_objects = get_field('related_projects');
        if( $post_objects ):
            $i = 1;
            echo '<div class="row"><div class="col-sm-12"><h3>Related Projects</h3><div class="row">';
            foreach( $post_objects as $post): // variable must be called $post (IMPORTANT)  setup_postdata($post); 
                get_template_part( 'template-parts/content', 'project' );
                if ($i % 3 == 0) { echo '</div><div class="row">'; };
                $i++;
             endforeach;
             if ($i %3 != 0) {echo '</div>';};
             wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
             echo '</div></div>';
        endif; ?>
      </div>
    </article>
<?php endwhile; // End of the loop. ?>

<?php
get_footer();
?>
