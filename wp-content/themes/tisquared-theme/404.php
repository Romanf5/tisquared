<div class="page404-container">
  <header class="main-header">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-9 large-3">
          <a href="<?php echo get_home_url(); ?>" class="logo">
            <img src="<?php echo get_theme_mod('header-logo', get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="">
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

  <div class="page404-container-inner animation animate--opacity slide-up">
    <h1 class="page404__title">
      <span>4</span> <img src="<?php echo get_theme_mod('page-404-logo', get_template_directory_uri() . '/assets/images/logo-blue.png'); ?>" class="page-404-image" alt=""><span>4</span>
    </h1>
    <h2 class="page404__subtitle">WOOPS! SOMETHING WENT WRONG.</h2>
    <div class="page404-btn">
      <a href="<?php echo get_home_url() ?>" target="_self" class="btn btn--icon">Return home<span class="btn-icon"></span></a>
    </div>
  </div>
</div>
