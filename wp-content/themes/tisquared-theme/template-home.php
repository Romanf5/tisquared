<?php
/**
 * Template Name: Home page
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php
    $banner_overlay_color = CFS()->get('banner_overlay');
    $banner_overlay_color_opacity = CFS()->get('banner_overlay_opacity_value');
    $banner_bg_img = CFS()->get('banner_background_image');
    $banner_is_video = CFS()->get('video_background');
    $video_url_wbm = CFS()->get('video_filewedm');
    $video_url_mp4 = CFS()->get('video_filemp4');
    $banner_title = CFS()->get('banner_title');
    $banner_desc = CFS()->get('banner_description');
    $banner_button = CFS()->get('banner_button');
    $banner_button_scroll = CFS()->get('banner_scroll_button_text');
  ?>
<header class="main-header">
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="cell small-9 large-3">
        <a href="<?php echo get_home_url(); ?>" class="logo">
          <img src="<?php echo get_theme_mod('header-logo', get_template_directory_uri() . '/assets/images/logo.png'); ?>" alt="" class="style-svg">
          <img src="<?php echo get_theme_mod('header-logo-fixed', get_template_directory_uri() . '/assets/images/logo-blue.png'); ?>" alt="" class="style-svg">
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
<div class="homepage-banner" <?php echo ($banner_bg_img && !$banner_is_video) ? 'style="background-image:url('.$banner_bg_img.');"' : ''?> >
  <style>.homepage-banner:before {background-color: <?php echo ($banner_overlay_color) ? $banner_overlay_color : '#000'?>;opacity: <?php echo ($banner_overlay_color_opacity) ? $banner_overlay_color_opacity : '0.5'?>}</style>
  <?php if($banner_is_video) { ?>
    <div class="videobg">
      <div class="videobg-width">
        <div class="videobg-aspect">
          <div class="videobg-make-height">
            <div class="videobg-hide-controls">
              <video src="<?php echo $video_url_mp4 ?>" src="<?php echo $video_url_wbm; ?>	" src="<?php echo $video_url_mp4; ?>	" autoplay="true" loop="true" playsinline="playsinline" autobuffer="true" muted poster="<?php echo $banner_bg_img?>"></video>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if($banner_title) { ?>
  <div class="homepage-banner-content animation slide-up animate--opacity">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-12 large-7">
          <div class="homepage-banner-content__title"><?php echo $banner_title; ?></div>
          <div class="homepage-banner-content__desc">
            <?php echo $banner_desc ?>
          </div>
          <div class="homepage-banner-content__btn">
            <a href="<?php echo $banner_button['url']?>" target="<?php echo $banner_button['target']?>" class="btn btn--icon"><?php echo $banner_button['text']?><span class="btn-icon"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <span class="home-banner-scroll-link home-banner-scroll-link--js"><?php echo ($banner_button_scroll) ? $banner_button_scroll : 'Scroll'?></span>
</div>
<section class="logos-section ">
  <div class="logos-section__container">
  <div class="logo-list animation animate--opacity slide-up">
    <?php $fields = CFS()->get( 'logos_loop' );
    foreach ( $fields as $field ) { ?>
      <div class="logo-list__item">
        <img src="<?php echo $field['logo'] ?>" alt="" class="style-svg">
      </div>
    <?php } ?>
  </div>
  </div>
</section>

<section class="industries-section">
  <div class="custom-container">
    <div class="tab-mobile-activetab">
    </div>
    <div class="tab-mobile-btn"></div>
    <ul class="industries-tabs-list animate--opacity slide-up">
      <?php $fields_tab = CFS()->get( 'industries_items' );
      $key = 0;
      foreach ( $fields_tab as $field ) {
        $tab_name = $field['industries_name'];
        $tab_name = strtolower($tab_name);
        $tab_name = strip_tags($tab_name);
        $tab_name = preg_replace('/\s/', '', $tab_name);
        ?>
        <li class="industries-tabs-list__item">
          <a href="#" data-content-target="<?php echo $tab_name;?>">
            <?php echo $field['industries_name']; ?>
          </a>
        </li>

      <?php } ?>
    </ul>
  </div>
    <div class="tab-content animation animate--opacity slide-up">
      <?php $fields_tab = CFS()->get( 'industries_items' );
      $key = 0;
      foreach ( $fields_tab as $field ) {
        $tab_name = $field['industries_name'];
        $tab_name = strtolower($tab_name);
        $tab_name = strip_tags($tab_name);
        $tab_name = preg_replace('/\s/', '', $tab_name);
        ?>
        <div class="tab-content-item" data-content-tab="<?php echo $tab_name;?>">
          <div class="tab-content__inner" >
            <div class="tab-content-text">
              <div class="tab-content-text__inner">
                <div class="tab-content__header">
                  <div class="tab-content__header--info">
                    <div class="industries-item-subtitle"><?php echo $field['industries_subtitle'];?></div>
                    <div class="industries-item-title"><?php echo $field['industries_name'];?></div>
                  </div>
                  <div class="tab-content__header--nav">
                    <div class="nav-tab nav-tab-left"></div>
                    <div class="nav-tab nav-tab-right"></div>
                  </div>
                </div>
                <div class="tab-content__text">
                  <?php echo $field['industries_description'];?>
                </div>
                <div class="tab-content__link">

                  <a href="<?php echo $field['industries_link']['url']?>" target="<?php echo $field['industries_link']['target']?>" class="btn-link-more"><?php echo $field['industries_link']['text']?><span class="btn-icon"></span></a>
                </div>
              </div>
            </div>
            <div class="tab-content-image" style="background-image: url('<?php echo $field['industries_image'] ?>')"></div>
          </div>
        </div>

      <?php } ?>
    </div>
</section>

<section class="process-section">
  <?php
    $process_sec_title = CFS()->get('process_section_title');
    $process_sec_subtitle = CFS()->get('process_section_subtitle');
    $process_page_link = CFS()->get('process_page_link');
  ?>
  <div class="process-content">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-12 medium-6 large-8">
          <div class="process-section-header animation animate--opacity slide-up">
            <div class="process-section-header__title">
              <?php echo $process_sec_subtitle; ?>
            </div>
            <div class="process-section-header__subtitle">
              <?php echo $process_sec_title; ?>
            </div>
            <div class="process-home-img">
              <?php
              // WP_Query arguments
              $args = array(
                'page_id' => '12',
              );

              // The Query
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                  $query->the_post();
                  $fields_loop = CFS()->get( 'proces_steps' ); ?>
                    <?php foreach ( $fields_loop as $field ) {
                    $tab_process_name = $field['procces_step_content_title'];
                    $tab_process_name = strtolower($tab_process_name);
                    $tab_process_name = strip_tags($tab_process_name);
                    $tab_process_name = preg_replace('/\s/', '', $tab_process_name); ?>
                      <div class="process-home-img__inner" data-process-target="<?php echo $tab_process_name ?>">
                        <img src="<?php echo $field['procces_step_content_image']?>" alt="">
                      </div>
                    <?php } ?>
                  <?php
                }
              } else {
              }
              wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
        <div class="cell small-12 medium-6 large-4">
          <div class="process-tab-container animation animate--opacity slide-up">
            <?php
            // WP_Query arguments
            $args = array(
              'page_id' => '12',
            );

            // The Query
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post();
                $fields_loop = CFS()->get( 'proces_steps' ); ?>
                <ul class="process-tabs">
                <?php foreach ( $fields_loop as $field ) {
                  $tab_process_name = $field['procces_step_content_title'];
                  $tab_process_name = strtolower($tab_process_name);
                  $tab_process_name = strip_tags($tab_process_name);
                  $tab_process_name = preg_replace('/\s/', '', $tab_process_name);
                  ?>
                  <li class="process-tabs__item" data-process-step="<?php echo $tab_process_name ?>">
                    <a href="#" class="process-tabs-link"><?php echo strip_tags($field['procces_step_content_title']);?></a>
                  </li>
                <?php } ?>
                </ul>
                <div class="process-step-content">

                  <?php foreach ( $fields_loop as $field ) {
                    $tab_process_name = $field['procces_step_content_title'];
                    $tab_process_name = strtolower($tab_process_name);
                    $tab_process_name = strip_tags($tab_process_name);
                    $tab_process_name = preg_replace('/\s/', '', $tab_process_name);?>
                    <div class="process-tab-content" data-process-target="<?php echo $tab_process_name ?>">
                      <div class="process-tab-content__inner">
                        <div class="process-tab-content-text">
                          <?php echo $field['procces_step_description']?>
                        </div>
                        <div class="process-tab-content-link">
                          <?php
                            $process_page_link = $field['page_link_from_home_page'];?>
                          <a href="<?php echo $process_page_link['url']?>" target="<?php echo $process_page_link['target']?>" class="btn btn--icon"><?php echo $process_page_link['text']?><span class="btn-icon"></span></a>
                        </div>
                      </div>
                    </div>
                  <?php } ?>

                </div>
                <?php
              }
            } else {
            }
            wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  $visable_slider = CFS()->get('visible_slider');
  if ($visable_slider) { ?>
    <section class="carousel-home">

      <div class="carousel-home-container--fix">
        <div class="carousel-home-arrow-container"></div>
        <div class="slider-list animation animate--opacity slide-up">
          <?php $slides = CFS()->get( 'home_slides' );
          foreach ( $slides as $field ) { ?>
            <div class="slider-list__item">
              <?php
              $image_url = wp_get_attachment_image_src($field['slide_image'], 'carousel-thumb');
              ?>
              <img src="<?php echo $image_url[0] ?>" alt="">
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="slider-info animation animate--opacity slide-up">
        <div class="grid-container">
          <div class="grid-x grid-padding-x align-middle">
            <div class="cell small-8 medium-4 medium-offset-1 large-offset-1">
              <div class="slider-info__title">
                <?php echo CFS()->get('home_slider_title'); ?>
              </div>
            </div>
            <div class="cell small-4 medium-3 medium-offset-4 large-offset-4">
              <div class="slider-navigation"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
<?php endwhile; ?>
