<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?> xmlns="http://www.w3.org/1999/html">
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <div class="row">
        <?php if(current_user_can('edit_others_pages')) :?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Web GUI Control</h3>
            </div>
            <div class="panel-body">
              <p><strong>Username:</strong> <code><?php the_field('web_cp_username'); ?></code><br />
              <strong>Password:</strong> <code><?php the_field('web_cp_password'); ?></code> </p>
              <p><a href="<?php the_field('web_address') ?>" target="_blank">Launch <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></p>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <?php
          if(has_post_thumbnail()) {
            the_post_thumbnail();
          }
          ?>
        </div>
      </div>

      <table class="table">
        <tbody>
          <tr>
          <th>Manufacturer:</th>
          <td><?php the_field('manufacturer'); ?></td>
          </tr>
          <tr>
            <th>Model:</th>
            <td><?php the_field('model_number'); ?></td>
          </tr>
          <tr>
            <th>Location:</th>
            <td><?php
              $field = get_field_object('installed_location');
              $value = get_field('installed_location');
              $label = $field['choices'][$value];
              echo $label;
              ?></td>
          </tr>
          <?php
          if (have_rows('firmware_version')) {
            while (have_rows('firmware_version')) : the_row();

              if (true == get_sub_field('firmware_active')) {
                ?>
                <tr>
                  <th>Firmware/Software Version:</th>
                  <td><?php the_sub_field('version_number'); ?></td>
                </tr>
                <tr>
                  <th>Install Date:</th>
                  <td><?php the_sub_field('install_date'); ?></td>
                </tr>

                <?php
                if (have_rows('documentation')):
                  ?>
                  <tr>
                    <th>Documentation:</th>
                    <td>
                      <?php
                      while (have_rows('documentation')) : the_row();
                        $documentFile = get_sub_field('document_data');
                        if ($documentFile): ?>
                          <a href="<?php echo $documentFile['url']; ?>"><?php the_sub_field('document_name'); ?></a><br />
                          <?php
                        endif;
                      endwhile;
                      ?></td>
                  </tr>
                  <?php
                endif;
              }
            endwhile;
          }
          ?>
        </tbody>
      </table>
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
