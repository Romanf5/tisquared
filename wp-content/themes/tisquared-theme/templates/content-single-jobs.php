<?php while (have_posts()) : the_post(); ?>
  <?php
    $banner_link_job = CFS()->get('banner_link_job');
  ?>
  <div class="page-banner page-banner-company page-banner-job-single">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-11 medium-9 large-9">
          <div class="page-banner-outside">
            <div class="page-banner__inner animation animate--opacity slide-up">
              <div class="page-banner__subtitle">
                <?php echo CFS()->get('banner_subtitle'); ?>
              </div>
              <div class="page-banner__title">
                <h2><?php echo get_the_title() ?></h2>
              </div>
              <div class="page-banner__desc">
                <?php echo CFS()->get('banner_description_job')?>
              </div>
              <div class="page-banner__btn">
                <a href="<?php echo $banner_link_job['url']?>" class="btn-link-more" target="<?php $banner_link_job['target'] ?>"><?php echo $banner_link_job['text']?><span class="btn-icon"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
