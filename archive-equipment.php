<?php get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert alert-danger">
    <?php _e('Sorry, no equipment matching your filters were found.', 'sage'); ?>
    <a href="<?php echo home_url().'/equipment/';?>">Reset Filters</a>
  </div>
<?php else: do_action('show_beautiful_filters');  ?>
<?php endif; ?>
<?php while (have_posts()) : the_post(); ?>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
  </div>
<?php endwhile; ?>
<?php the_posts_navigation(); ?>
