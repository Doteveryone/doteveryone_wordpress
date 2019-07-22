<?php 
  $terms = get_terms( array(
  'taxonomy' => 'workstream',
  'hide_empty' => false,
  'parent' => 0
 ) );
  foreach($terms as $term) {
  $image = get_field('icon', $term);
  $color = get_field('color', $term);
  $lede = get_field('lede', $term);
?>
  <div class="col-sm-4">
  <a  href="/work/<?php echo $term->slug; ?>">
  <h4 style="color: <?php echo $color; ?>"><?php echo $term->name; ?></h4>
  <img class="workstream" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $term->name ?>" >
  </a>
  <p><?php echo $lede; ?></p>
  </div> 
<?php
  }
?>