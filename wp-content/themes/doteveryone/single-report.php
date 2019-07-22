<?php
/**
 * Template part for displaying report content 
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
<script type="text/javascript">
var report = {
    initReadMore: function() {
        jQuery('.read_more').click( function(event) {
          event.preventDefault();
          jQuery(this).parent().next().find('.full_text').slideDown()
          jQuery(this).hide();
        });  
        jQuery('.read_less').click( function(event) {
          event.preventDefault();
          jQuery(this).parent().slideUp();
          jQuery(this).parents('.post-container').prev().find('.read_more').show()
        });   
    },
    initPDFTrack: function() {
        jQuery('a[href$=".pdf"]').click( function(event) {
          if (event.defaultPrevented) return;
          ga('send', 'event', 'PDF Download', this.href);
        });
    },
}

document.addEventListener("DOMContentLoaded", function(event) { 
    report.initReadMore();
    report.initPDFTrack();
});


</script>
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php 
        $image = get_field('header_image');
        if( !empty($image) ):
          $header_image = $image['url'];
        endif;
      ?>
      <div id="banner_full" style="background-color: <?php the_field('accent_color'); ?>;">
        <section id="title" class="">
          <h1><span><?php the_field('report_title'); ?></span>
          <?php the_field('subtitle'); ?></h1>
        </section>
        <section style="background: url('<?php echo $header_image; ?>') no-repeat center / cover;"></section>
      </div>
      <div class="container-fluid">
        <section id="intro" class="">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 post-container">
              <?php 
              $report_file = get_field('report_file');
              if( $report_file ): ?>
                <div class="orange_box callout"><a href="<?php echo $report_file['url']; ?>">Download the full report</a></div>
              <?php endif; ?>
            </div>
            <div class="col-sm-10 title-container">
              <h1><?php the_title(); ?></h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2 post-container">
              <?php the_content(); ?>
            </div>
          </div>
        </section> 
        <?php
        // check if the repeater field has rows of data
        if( have_rows('sections') ):
          // loop through the rows of data
            while ( have_rows('sections') ) : the_row(); ?>
              <section id="" class="report_section">
                <div class="row">
                  <div class="col-sm-10 title-container">
                    <h1><?php the_sub_field('section_title'); ?></h1>
                  </div>
                  <div class="col-sm-8 col-sm-offset-2 post-container">
                    <?php the_sub_field('section_body'); ?>
                  </div>
                </div>
              </section>
            <?php
            endwhile;
        else :
            // no rows found
        endif;
        ?>
        <?php
        // check if the repeater field has rows of data
        if( have_rows('expanders') ):
          // loop through the rows of data
            while ( have_rows('expanders') ) : the_row(); ?>
              <section id="" class="report_section">
                <div class="row">
                  <div class="col-sm-10 title-container">
                    <h1><?php the_sub_field('section_title'); ?></h1>
                  </div>
                  <div class="col-sm-8 col-sm-offset-2 post-container">
                    <?php the_sub_field('section_body'); ?>
                  </div>
                </div>
              </section>
              <section class="expander-section">
                <div class="row">
                  <div class="col-sm-4 col-sm-offset-2">
                    <?php 
                      $image = get_sub_field('expander_image');
                      if( !empty($image) ):
                        $expander_image = $image['url'];
                      endif;
                    ?>
                    <img src="<?php echo $expander_image; ?>">
                  </div>
                  <div class="col-sm-4 post-container">
                     <h2><?php the_sub_field('expander_section_title'); ?></h2>
                                         <div class="precis">
                      <?php the_sub_field('expander_section_intro'); ?>
                    </div>
                     <a class="read_more" href="#">Read More</a>
                   </div>
                  <div class="col-sm-8 col-sm-offset-2 post-container">
                    <div class="full_text">
                      <?php the_sub_field('expander_section_body'); ?>
                    <a class="read_less" href="#">Hide</a>
                    </div>
                  </div>
                </div>
              </section>
            <?php
            endwhile;
        else :
            // no rows found
        endif;
        ?>

            </div>
          </div>
        </section>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 post-container">
            <div class="orange_box callout"><a href="<?php echo $report_file['url']; ?>">Download the full report</a></div>
          </div>
      </div>
      </div>
    </div>

    <?php endwhile; // End of the loop. ?>
    </main><!-- #main -->
  </div><!-- #primary -->
<?php
get_footer();
?>

