<div class="col-sm-4">
  <div class="person">
  <div class="headshot">
    <?php 
    $image=get_sub_field('image'); 
    ?>
    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php the_sub_field('name'); ?>" >
    <div class="overlay">
      <?php the_sub_field('bio'); ?>
    </div>
  </div>
  <div class="rubric">
    <span class="name"><?php the_sub_field('name'); ?></span>
    <span class="role"><?php the_sub_field('role'); ?></span>
    <div class="social">
      <?php if(get_sub_field('email')) { echo '<a href="mailto:'.get_sub_field('email').'" class="fas fa-envelope"></a>'; }
      if(get_sub_field('twitter')) { echo '<a href="'.get_sub_field('twitter').'" class="fab fa-twitter twitter"></a>'; }
      if(get_sub_field('medium')) { echo '<a href="'.get_sub_field('medium').'" class="fab fa-medium medium"></a>'; } ?>
    </div>
  </div>
  </div>
</div>