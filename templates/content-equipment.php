<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  </div>
  <div class="panel-body">
  	<?php if(current_user_can('edit_others_pages')) :?>
    <p><strong>Username:</strong> <code><?php the_field('web_cp_username',$post->ID); ?></code><br />
      <strong>Password:</strong> <code><?php the_field('web_cp_password',$post->ID); ?></code> </p>
    <p><a href="<?php the_field('web_address') ?>" target="_blank" class="btn btn-primary btn-outline">Launch <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></p>
	<?php else : ?>
		<p><?php the_terms($post->ID, 'location','',', ', ' '); ?></p>
		<p><?php the_field('manufacturer',$post->ID); echo " "; the_field('model_number',$post->ID); ?></p>
		<p><a href="<?php the_permalink(); ?>" class="btn btn-primary btn-outline">More Info <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></p>
	<?php endif; ?>
  </div>
</div>
