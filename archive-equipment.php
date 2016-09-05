<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<?php do_action('show_beautiful_filters'); ?>
<!-- <div class="panel-group" id="accordian" role="tab-list">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h1 class="panel-title">Filter Equipment</h1></a>
		</div>
		<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				<?php //do_action('show_beautiful_filters'); ?>
			</div>
		</div>
	</div>
</div> -->



<?php while (have_posts()) : the_post(); ?>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
  </div>
<?php endwhile; ?>
<?php the_posts_navigation(); ?>
