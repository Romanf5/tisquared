<footer class="footer-main">
  <div class="footer-main__info">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-12 medium-12 large-2">
          <a href="<?php echo get_home_url(); ?>" class="logo logo--footer animation animate--opacity slide-up">
            <img src="<?php echo get_theme_mod('footer-logo', get_template_directory_uri() . '/assets/images/footer-logo.png'); ?>" alt="" class="style-svg">
          </a>
        </div>
        <div class="cell medium-5 large-3 animate-footer-info animation animate--opacity slide-up">
          <?php dynamic_sidebar('sidebar-footer-top-info'); ?>
        </div>
        <div class="cell small-10 medium-5 large-3 animate-footer-menu animation animate--opacity slide-up">
          <?php dynamic_sidebar('sidebar-footer-top-menu'); ?>
        </div>
        <div class="cell medium-12 large-3 footer-btn-wrapper medium-offset-0 large-offset-1 animate-footer-btn animation animate--opacity slide-up">
          <div class="footer-btn-quote-wrap">
            <?php dynamic_sidebar('sidebar-footer-top-btn'); ?>
          </div>
          <div class="fotter-middle-icon animation animate--opacity slide-up">
            <?php dynamic_sidebar('sidebar-footer4'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-main__copy animation animate--opacity slide-up">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell medium-12 large-5">
          <div class="footer-main__copy--site">
            <?php echo get_theme_mod('footer-copy',''); ?>
          </div>
        </div>
        <div class="cell medium-12 large-3">
          <div class="footer-main__copy--studio">
            <?php dynamic_sidebar('sidebar-footer-cstudio'); ?>
          </div>
        </div>
        <div class="cell medium-12 large-4">
          <?php dynamic_sidebar('sidebar-footer-bottom'); ?>
        </div>
      </div>
    </div>
  </div>
</footer>
