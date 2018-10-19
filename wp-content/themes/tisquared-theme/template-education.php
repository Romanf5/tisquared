<?php
/**
 * Template Name: Education page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/another', 'header'); ?>

  <?php
    $ec_bnr_title = CFS()->get('banner_tiltle_ed');
    $ec_bnr_desc_visible = CFS()->get('visible_banner_description_ed');
    $ec_bnr_desc = CFS()->get('banner_description_ed');
    $sub_section_image = CFS()->get('background_image_ed');
    $sub_section_image_cl = CFS()->get('sub_section_color_overlay_ed');
    $sub_section_image_opacity = CFS()->get('sub_section_color_opacity_ed');
    $sub_section_text_title = CFS()->get('sub_section_titile_ed');
    $sub_section_text_desc = CFS()->get('sub_section_description_ed');
  ?>

  <div class="page-banner page-banner-ed">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-10 medium-7 large-7">
          <div class="page-banner-outside">
            <div class="page-banner__inner animation animate--opacity slide-up">
              <div class="page-banner__title">
                <?php echo $ec_bnr_title ?>
              </div>
              <?php if($ec_bnr_desc_visible) { ?>
                <div class="page-banner__desc">
                  <?php echo $ec_bnr_desc ?>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="education-subsection-wrapper">
    <div class="education-subsection-bg animation animate--opacity scale" <?php echo ($sub_section_image) ? 'style="background-image:url('.$sub_section_image.');"' : 'style="background-color:#fff;"'?> >
      <style>.education-subsection-bg:before {background-color: <?php echo ($sub_section_color_overlay_ed) ? $sub_section_color_overlay_ed : '#000'?>;opacity: <?php echo ($sub_section_image_opacity) ? $sub_section_image_opacity : '0.42'?>}</style>
      <div class="grid-container">
        <div class="grid-x grid-padding-x">
          <div class="cell small-12 medium-6 large-6">
            <div class="education-subsection-text animation animate--opacity slide-up">
              <div class="grid-container">
                <div class="grid-x grid-padding-x">
                  <div class="cell small-12 medium-12 large-12">
                    <div class="education-subsection-text__inner">
                      <div class="education-subsection-text-title">
                        <?php echo $sub_section_text_title ?>
                      </div>
                      <div class="education-subsection-text-info">
                        <?php echo $sub_section_text_desc ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="education-about">
    <div class="education-about-inner">
      <div class="education-about-container">
        <div class="education-about__image animation animate--opacity scale" style="background-image: url('<?php echo CFS()->get('image_ed') ?>')"></div>
        <div class="education-about__text animation animate--opacity slide-up">
          <div class="ducation-about-in-desc animation animate--opacity slide-up">
            <?php echo CFS()->get('description_ed'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
