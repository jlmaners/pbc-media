<header class="banner">
  <nav class="navbar navbar-default">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img class="img-responsive" src="<?= get_template_directory_uri(); ?>/dist/images/PBC_Primary_logo_full.png" srcset="<?= get_template_directory_uri(); ?>/dist/images/PBC_Primary_logo_full@2x.png 2x" /></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
                endif;
                ?>
              </div>
            </div>
            </nav>
        </div>  
  </div>
   
    
  </div>
</header>