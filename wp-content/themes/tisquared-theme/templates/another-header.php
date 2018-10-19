<header class="main-header another-header">
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="cell small-9 large-3">
        <a href="<?php echo get_home_url(); ?>" class="logo">
          <img src="<?php echo get_theme_mod('header-logo-fixed', get_template_directory_uri() . '/assets/images/logo-blue.png'); ?>" alt="">
        </a>
      </div>
      <div class="cell small-3 mobile-menu-btn-container">
        <a href="#" class="btn-menu">
          <span class="btn-menu__item"></span>
          <span class="btn-menu__item"></span>
          <span class="btn-menu__item"></span>
        </a>
      </div>
      <div class="cell small-12 large-7 menu-container">
        <?php wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'menu_class' => 'main-nav-list', 'container' => false)); ?>
      </div>
      <div class="cell small-2 large-2 header-btn-container">
        <a href="<?php echo get_theme_mod('header-info-btn-url',''); ?>" class="btn btn--border" target="<?php echo get_theme_mod('header-info-btn-target',''); ?>">
          <?php echo get_theme_mod('header-info-btn-text',''); ?>
        </a>
      </div>
    </div>
  </div>
</header>
