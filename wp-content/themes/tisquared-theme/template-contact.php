<?php
/**
 * Template Name: Contact page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/another', 'header'); ?>
  <?php
    $cnt_banner_title = CFS()->get('banner_title_ct');
    $banner_backcgroung_color_ct = CFS()->get('banner_backcgroung_color_ct');
    $banner_background_ct = CFS()->get('banner_background_ct');
    $banner_description_ct = CFS()->get('banner_description_ct');
    $image_section_ct = CFS()->get('image_section_ct');
    $image_section_background_ct = CFS()->get('image_section_background_ct');
    $image_section_subtitle_ct = CFS()->get('image_section_subtitle_ct');
    $image_section_title_ct = CFS()->get('image_section_title_ct');
    $image_section_information_ct = CFS()->get('image_section_information_ct');
  ?>
  <div class="page-banner page-banner-contact" <?php echo ($banner_background_ct) ? 'style="background-image:url('.$hero_bnr_image.');"' : 'style="background-color:'.$banner_backcgroung_color_ct.';"'?> >
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-10 medium-7 large-7">
          <div class="page-banner-outside">
            <div class="page-banner__inner animation animate--opacity slide-up">
              <div class="page-banner__title">
                <?php echo $cnt_banner_title ?>
              </div>
              <div class="page-banner__desc">
                <?php echo $banner_description_ct ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="contact-info-section animation animate--opacity scale" <?php echo ($image_section_background_ct) ? 'style="background-image:url('.$image_section_background_ct.');"' : ''?> >
      <div class="grid-container">
        <div class="grid-x grid-padding-x">
          <div class="cell small-12 medium-6 large-4">
              <div class="contact-info-section__inner animation animate--opacity slide-up">
                <div class="contact-info-section-subtitle">
                  <?php echo  $image_section_subtitle_ct ?>
                </div>
                <div class="contact-info-section-title">
                  <?php echo $image_section_title_ct ?>
                </div>
                <div class="contact-info-section-info">
                  <?php echo $image_section_information_ct ?>
                </div>
              </div>
          </div>
        </div>
      </div>
  </section>

  <section class="contact-page-main">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-12 medium-12 large-7 contact-form-main animation animate--opacity slide-up">
          <div class="contact-page-form-container">
            <?php echo do_shortcode('[contact-form-7 id="97" title="Contact form"]')?>
          </div>
        </div>
        <div class="cell small-12 medium-12 large-5 ">
          <div class="contact-page-map">
            <div class="contact-page-map-container animation animate--opacity slide-up">
              <?php echo do_shortcode('[google_map_easy id="1"]')?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
