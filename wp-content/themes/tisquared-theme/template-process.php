<?php
/**
 * Template Name: Process page
 */
?>

<?php while (have_posts()) : the_post(); ?>
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
  <?php
  $title_first_section_nav = CFS()->get('hero_title_to_navigation');
  $section_name_first = $title_first_section_nav;
      $section_name_first = strtolower($section_name_first);
      $section_name_first = strip_tags($section_name_first);
      $section_name_first = preg_replace('/\s/', '', $section_name_first);
  ?>
  <ul class="full-page-nav">

    <li class="full-page-nav__item"><a href="#" data-target-sc="<?php echo $section_name_first;?>" class="active"><?php echo $title_first_section_nav ?></a></li>
    <?php $fields_nav = CFS()->get( 'proces_steps' );
    foreach ( $fields_nav as $field_nav ) {
      $section_name_menu = $field_nav['procces_step_title'];
      $section_name_target = $field_nav['procces_step_title'];
      $section_name_menu = strip_tags($section_name_menu);
      $section_name_target = strtolower($section_name_target);
      $section_name_target = strip_tags($section_name_target);
      $section_name_target = preg_replace('/\s/', '', $section_name_target);
      ?>
      <li class="full-page-nav__item"><a href="#" data-target-sc="<?php echo $section_name_target;?>"><?php echo $section_name_menu ?></a></li>
    <?php } ?>
  </ul>

  <div id="fullpage">
    <?php
    $pr_banner_overlay_color = CFS()->get('hero_overlay');
    $pr_banner_overlay_color_opacity = CFS()->get('hero_overlay_opacity_value');
    $pr_banner_bg_img = CFS()->get('hero_banner_image');
    $pr_banner_is_video = CFS()->get('pr_video_background');
    $pr_video_url_wbm = CFS()->get('pr_video_filewedm');
    $pr_video_url_mp4 = CFS()->get('pr_video_filemp4');
    $pr_banner_title = CFS()->get('pr_hero_title');
    $pr_banner_desc = CFS()->get('hero_desc');
    $pr_banner_button = CFS()->get('hero_button');
    $pr_banner_button_scroll = CFS()->get('button_scroll_text');
    ?>
    <div class="section hero-overview" data-menu-target="<?php echo $section_name_first ?>">
      <style><?php echo ($pr_banner_bg_img && !$pr_banner_is_video) ? '.hero-overview { background-image:url('.$pr_banner_bg_img.');}' : ''?> .hero-overview:before {background-color: <?php echo ($banner_overlay_color) ? $banner_overlay_color : '#000'?>;opacity: <?php echo ($banner_overlay_color_opacity) ? $banner_overlay_color_opacity : '0.5'?>}</style>
      <?php if($pr_banner_is_video) { ?>
        <div class="videobg">
          <div class="videobg-width">
            <div class="videobg-aspect">
              <div class="videobg-make-height">
                <div class="videobg-hide-controls">
                  <video id="process-video" autoplay="true" loop="true" playsinline="playsinline" autobuffer="true" muted poster="<?php echo $pr_banner_bg_img?>">
                    <source src="<?php echo $pr_video_url_mp4;  ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    <source src=<?php echo $pr_video_url_wbm; ?>" type='video/webm; codecs="vp8, vorbis"'>
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php if($pr_banner_title) { ?>
        <div class="homepage-banner-content animation slide-up animate--opacity">
          <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
              <div class="cell small-12 medium-8 large-6">
                <div class="homepage-banner-content__title"><?php echo $pr_banner_title; ?></div>
                <div class="homepage-banner-content__desc">
                  <?php echo $pr_banner_desc ?>
                </div>
<!--                <div class="homepage-banner-content__btn">-->
<!--                  <a href="--><?php //echo $pr_banner_button['url']?><!--" class="btn btn--icon">--><?php //echo $pr_banner_button['text']?><!--<span class="btn-icon"></span></a>-->
<!--                </div>-->
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php $fields = CFS()->get( 'proces_steps' );
    $i = 1;
    foreach ( $fields as $field ) {
      $section_name = $field['procces_step_title'];
      $section_name = strtolower($section_name);
      $section_name = strip_tags($section_name);
      $section_name = preg_replace('/\s/', '', $section_name);
      ?>
      <div class="section" data-menu-target="<?php echo $section_name;?>">

        <div class="process-top-info">
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <div class="cell small-12">
                <div class="process-step-info">
                  <h4 class="process-step-info__title"><?php echo $field['process_label'] . ' 0'. $i ?></h4>
                </div>
              </div>
            </div>
          </div>
          <div class="grid-container">
            <div class="grid-x grid-padding-x">
              <div class="cell small-12 medium-12 large-5">
                <div class="process-step-info">
                  <div class="process-step-info__main-ttl"><?php echo $field['procces_step_content_title'] ?></div>
                </div>
              </div>
              <div class="cell small-12 medium-12 large-7">
                <div class="process-info-content">
                  <?php echo $field['procces_step_description']?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if(!empty($field['procces_step_content_image'])) {?>
          <div class="process-container-image">
            <div class="grid-container">
              <div class="grid-x grid-padding-x align-center">
                <div class="cell small-12 medium-8 large-8">
                    <img src="<?php echo $field['procces_step_content_image']; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php $i++; } ?>
  </div>
  <span class="procces-scroll-link procces-scroll-link--js"><?php echo ($banner_button_scroll) ? $banner_button_scroll : 'Scroll'?></span>
  <span class="procces-scroll-link procces-scroll-link--top">Back to top</span>
<?php endwhile; ?>
