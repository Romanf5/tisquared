<?php get_template_part('templates/another', 'header'); ?>
<?php get_template_part('templates/content-single', get_post_type()); ?>
<section class="candidate-experience animation animate--opacity slide-up">
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="cell small-12">
        <?php echo get_the_content(); ?>
      </div>
    </div>
  </div>
</section>
<section class="careers-form">
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="cell small-12">
        <div class="careers-form-inner">
          <div class="grid-x grid-padding-x align-center">
            <div class="cell small-12 animation animate--opacity slide-up">
              <?php echo do_shortcode('[contact-form-7 id="93" title="Careers"]')?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
