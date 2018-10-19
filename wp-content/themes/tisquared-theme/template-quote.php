<?php
/**
 * Template Name: Get a quote
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/another', 'header'); ?>
  <?php
    $cnt_banner_title = CFS()->get('banner_title_qt');
    $banner_backcgroung_color_ct = CFS()->get('banner_background_color_qt');
    $banner_background_ct = CFS()->get('banner_background_image_qt');
    $banner_description_ct = CFS()->get('banner_description_qt');
  ?>
  <div class="page-banner page-banner-quote" <?php echo ($banner_background_ct) ? 'style="background-image:url('.$banner_background_ct.');"' : 'style="background-color:'.$banner_backcgroung_color_ct.';"'?> >
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-10 large-7">
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

  <section class="request-page-main">
    <div class="request-page-main__inner">
      <?php echo do_shortcode('[contact-form-7 id="100" title="Get a quote"]')?>
    </div>
  </section>
<?php endwhile; ?>

