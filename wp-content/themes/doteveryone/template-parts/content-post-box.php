<div class="col-sm-6 post_third">
  <a href="<?php the_permalink(); ?>">
<?php if ( has_post_thumbnail() ) {
  the_post_thumbnail('grid-third');
} ?>
<h4><?php the_title(); ?></h4></a>
<!-- <?php 
  $terms = get_the_terms( $post->ID, 'workstream' );                     
  if ( $terms && ! is_wp_error( $terms ) ) : 
    $workstream_links = array();
 
    foreach ( $terms as $term ) {
        $image = get_field('icon', $term);
        ?>
        <a class="term_icon_link" style="color: <?php echo $color; ?>" href="/work/<?php echo $term->slug; ?>">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $term->name ?>" ></a>
        <?php
    }
                        
  ?>

  <?php endif; ?> -->
<h5><a href="<?php the_field('author_link') ?>"><?php the_field('author') ?></a></h5>
</div>