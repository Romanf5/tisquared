<?php
/**
 * Template Name: Company page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/another', 'header'); ?>

  <?php
    $hero_bnr_color = CFS()->get('hero_section_bgcolor');
    $hero_bnr_image = CFS()->get('hero_section_bcgimg');
    $hero_bnr_title = CFS()->get('hero_title_cp');
    $hero_bnr_desc = CFS()->get('hero_description_cp');
    $hero_bnr_btn = CFS()->get('hero_section_button');
    $image_section_background = CFS()->get('image_section_background');
  ?>

  <div class="page-banner page-banner-company" <?php echo ($hero_bnr_image) ? 'style="background-image:url('.$hero_bnr_image.');"' : 'style="background-color:'.$hero_bnr_color.';"'?> >
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-10 large-7">
          <div class="page-banner-outside">
            <div class="page-banner__inner animation animate--opacity slide-up">
              <div class="page-banner__title">
                <?php echo $hero_bnr_title ?>
              </div>
              <div class="page-banner__desc">
                <?php echo $hero_bnr_desc ?>
              </div>
              <div class="page-banner__btn">
                <a href="<?php echo $hero_bnr_btn['url']?>" class="btn-link-more"><?php echo $hero_bnr_btn['text']?><span class="btn-icon"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="company-subhero animation animate--opacity scale" <?php echo ($image_section_background) ? 'style="background-image:url('.$image_section_background.');"' : ''?>>
    <div class="company-subhero__inner animation animate--opacity slide-up">
      <div class="company-subhero-title">
        <?php echo CFS()->get('image_section_title_cp'); ?>
      </div>
      <div class="company-subhero-desc">
        <?php echo CFS()->get('image_section_description'); ?>
      </div>
    </div>
  </section>
  <section class="leadership-company">
    <header class="leadership-company-header">
      <div class="grid-container">
        <div class="grid-x grid-padding-x">
          <div class="cell small-12">
            <div class="leadership-company-header__title animation animate--opacity slide-up">
              <?php echo CFS()->get('leadrship_team_section'); ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="company-container-slider animation animate--opacity slide-up">
      <div class="touch-btn">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 500 383" style="enable-background:new 0 0 500 383;" xml:space="preserve">
<style type="text/css">
  .st0{fill:#FFFFFF;}
</style>
          <path class="st0" d="M246.1,376c-2.9-2.1-3.6-5-3.6-8.5c0-12.6-4-23.5-12.4-33.3c-11-12.8-18.5-28-25.2-43.5
	c-6.6-15.2-12.8-30.6-19.6-45.6c-6.6-14.5-15.9-27.1-28.8-36.9c-5.6-4.2-9.4-9.9-10.9-16.9c-2.6-11.6,5-22.2,16.9-23.3
	c13-1.2,24.3,3.6,34.6,10.9c9.8,6.9,18,15.6,25.4,24.9c0.8,1,1.6,2.1,2.8,3.7c0.2-1.5,0.3-2.3,0.3-3.1c0-28,0-56.1,0-84.1
	c0-2.2-0.6-3.4-2.6-4.4c-22.4-11.4-34.8-34.6-31.8-58.9c3.1-24.6,21.2-44.1,45.9-49.5c1.5-0.3,3-0.7,4.5-1.1c4.8,0,9.6,0,14.4,0
	c0.9,0.3,1.8,0.6,2.7,0.8c31.4,5,53.5,37.2,46.8,68.3c-4,18.4-14.5,31.9-31.1,40.6c-1,0.5-2.4,1.6-2.4,2.5
	c-0.3,4.4-0.1,8.8-0.1,13.6c8.6-3.1,16.7-2.7,24.4,1.5c8.2,4.5,11,11.9,10.3,20.9c17.1-6.7,36.3,3.2,34.9,22.7
	c1.4-0.5,2.7-1,4.1-1.4c10.9-3.3,22.7,1.3,27.8,11c1,1.9,1.7,3.9,2.5,5.8c0,32.3,0,64.5,0,96.8c-2.3,10.2-6.2,19.7-11.3,28.9
	c-3.6,6.4-7,12.9-10.1,19.4c-4.6,9.6-7.4,19.8-7.4,30.5c0,3.7-1.3,6.2-4.4,7.9C310.6,376,278.3,376,246.1,376z M335.3,364.2
	c4.9-24.6,5.6-26.3,17.8-48.9c2.4-4.4,4.7-8.9,6.8-13.5c3-6.5,4.6-13.4,4.6-20.6c0-27.3-0.1-54.6-0.1-81.9c0-1.6-0.1-3.1-0.4-4.6
	c-1.2-5.3-6.1-8.5-12-8.1c-5.8,0.4-9.9,4.1-10.5,9.5c-0.5,4.7-2.6,6.9-6.2,6.7c-3.6-0.2-5.3-2.5-5.4-7.1c0-7.1,0.1-14.2-0.1-21.3
	c-0.2-6.2-4.7-10-11.7-10.1c-6.7-0.1-10.7,3.2-11.3,9.1c-0.4,4.3-2.6,6.5-6.2,6.3c-3.5-0.2-5.3-2.4-5.4-6.7c0-6.9,0-13.7-0.1-20.6
	c-0.1-6.5-3.8-10-10.8-10.3c-8.2-0.4-11.4,1.9-12.2,9.2c-0.3,2.9-1.9,5.1-4.6,5.1c-2.1,0-4.4-1.2-6.1-2.6c-0.9-0.7-0.8-2.9-0.8-4.4
	c0-27.2,0-54.4-0.1-81.6c0-2.8,0.1-5.7-0.7-8.2c-0.8-2.2-2.5-4.6-4.4-5.6c-9.8-4.7-17.8,0.4-17.8,11.1c0,53.1,0,106.1,0,159.2
	c0,3.3-0.7,6-4.1,7.2c-3.5,1.2-5.5-0.8-7.5-3.4c-5.3-7.2-10.5-14.4-16.2-21.2c-7.6-9.2-16.2-17.5-27.1-22.9
	c-5.7-2.8-11.6-4.6-18-4.1c-6.7,0.5-10.1,6.2-6.9,12c1.6,3,4,5.8,6.7,7.9c13.8,10.4,23.7,23.9,31,39.3c7,14.9,13.2,30.1,19.7,45.2
	c7,16.3,15.1,31.9,26.3,45.8c3.7,4.6,6.9,9.9,9,15.4c2.3,5.9,3.2,12.5,4.7,19C281.3,364.2,308.3,364.2,335.3,364.2z M225.8,103.8
	c0-1.8,0-3.1,0-4.3c0-12.6-0.1-25.3,0.1-37.9c0.1-6.7,2.4-12.7,8.2-16.5c8.6-5.6,18-5.7,27.2-1.4c8.4,4,10.8,11.8,10.8,20.4
	c0.1,12.3,0,24.5,0,36.8c0,0.9,0.2,1.7,0.3,2.7c17.6-9.8,26.5-31.8,21.1-51.5c-5.6-20.5-24.3-34.7-45.4-34.3
	C226.9,18.2,208.7,33,203.8,54C199.3,73.1,208.7,95,225.8,103.8z"/>
          <path class="st0" d="M59.8,6.3c5.6,3.7,5.9,6.9,1,11.8C50.3,28.6,39.8,39,29.4,49.5c-0.8,0.8-1.6,1.7-2.9,3.1c2.3,0,4,0,5.6,0
	c42.9,0,85.9,0,128.8,0c4.8,0,7.8,3,7,6.9c-0.6,3.1-2.7,4.7-6.6,4.7c-14,0-27.9,0-41.9,0c-29.9,0-59.9,0-89.8,0
	c-0.8,0-1.6,0.1-2.4,0.1c-0.4,0.5-0.8,1-1.2,1.5c1.2,0.6,2.6,1,3.5,1.9C39.9,77.9,50,88.1,60.2,98.3c0.6,0.6,1.2,1.2,1.8,1.8
	c2.7,2.9,2.8,6.2,0.4,8.7c-2.4,2.4-5.9,2.3-8.6-0.4c-5.7-5.6-11.3-11.2-16.9-16.8c-9.1-9.1-18.2-18.2-27.3-27.3
	c-1.2-1.2-2.2-2.5-3.3-3.8c0-1.4,0-2.9,0-4.3c2.5-2.5,5-5.1,7.5-7.6c12.6-12.6,25.2-25.3,37.9-37.8c1.6-1.6,3.4-2.9,5.2-4.3
	C57.8,6.3,58.8,6.3,59.8,6.3z"/>
          <path class="st0" d="M439.6,110.5c-5.6-3.7-5.9-6.9-1-11.8c10.5-10.5,20.9-20.9,31.4-31.4c0.8-0.8,1.6-1.7,2.9-3.1c-2.3,0-4,0-5.6,0
	c-42.9,0-85.9,0-128.8,0c-4.8,0-7.8-3-7-6.9c0.6-3.1,2.7-4.7,6.6-4.7c14,0,27.9,0,41.9,0c29.9,0,59.9,0,89.8,0
	c0.8,0,1.6-0.1,2.4-0.1c0.4-0.5,0.8-1,1.2-1.5c-1.2-0.6-2.6-1-3.5-1.9c-10.3-10.1-20.5-20.4-30.7-30.6c-0.6-0.6-1.2-1.2-1.8-1.8
	c-2.7-2.9-2.8-6.2-0.4-8.7c2.4-2.4,5.9-2.3,8.6,0.4c5.7,5.6,11.3,11.2,16.9,16.8c9.1,9.1,18.2,18.2,27.3,27.3
	c1.2,1.2,2.2,2.5,3.3,3.8c0,1.4,0,2.9,0,4.3c-2.5,2.5-5,5.1-7.5,7.6c-12.6,12.6-25.2,25.3-37.9,37.8c-1.6,1.6-3.4,2.9-5.2,4.3
	C441.5,110.5,440.5,110.5,439.6,110.5z"/>
</svg>
      </div>
      <div class="leadership-list">
        <?php
        $fields = CFS()->get( 'leadership_team' );
        foreach ( $fields as $field ) { ?>
          <div class="leadership-list__item">
            <div class="leadership-photo" <?php echo ($field['leadership_photo'] ? 'style="background-image: url('.$field['leadership_photo'].');"' : '')?>></div>
            <div class="leadership-header">
              <div class="leadership-info">
                <div class="leadership-header__title"><?php echo $field['leadership_name']?></div>
                <div class="leadership-header__pos"><?php echo $field['leadership_position']?></div>
              </div>
              <button class="plus-desc"></button>
              <div class="leadership-description">
                <?php echo $field['leadership_description']?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="about-section">
    <div class="about-section-container">
      <div class="about-section__text">
        <div class="about-section-in-title animation animate--opacity slide-up">
          <?php echo CFS()->get('about_section_title'); ?>
        </div>
        <div class="about-section-in-desc animation animate--opacity slide-up">
          <?php echo CFS()->get('about_section_description'); ?>
        </div>
      </div>
      <div class="about-section__image animation animate--opacity scale" style="background-image: url('<?php echo CFS()->get('about_section_image') ?>')"></div>
    </div>
  </section>
  <?php
    $pos_sec_title = CFS()->get('open_position_title');
    $pos_sec_subtitle = CFS()->get('open_position_subtitle');
  ?>

  <section class="jobs-section" id="open-position-section">
    <header class="jobs-section-header">
      <div class="grid-container">
        <div class="grid-x grid-padding-x">
          <div class="cell small-12">
            <div class="jobs-section-header__sub animation animate--opacity slide-up">
              <?php echo $pos_sec_subtitle; ?>
            </div>
            <div class="jobs-section-header__title animation animate--opacity slide-up">
              <?php echo $pos_sec_title; ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="open-position-content">
      <div class="open-position-content-container">
          <?php $jobs = new WP_Query(array('post_type'=>'jobs')) ?>
          <?php if ( $jobs->have_posts() ) :  ?>
            <!-- start wrapp-->
            <?php while ( $jobs->have_posts() ) : $jobs->the_post(); ?>
              <div class="job-position animation animate--opacity slide-up">
                <div class="job-position-inner">
                  <div class="job-position__title">
                    <?php echo get_the_title(); ?>
                  </div>
                  <div class="job-position-info">
                    <div class="job-position-info__date">
                      <div class="position-info-inner-container">
                        <div class="position-info-inner-title"><?php echo CFS()->get('date_title')?></div>
                        <div class="position-info-inner_value">
                          <?php echo get_the_date('j.n.y'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="job-position-info__location">
                      <div class="position-info-inner-container">
                        <div class="position-info-inner-title"><?php echo CFS()->get('location_title')?></div>
                        <div class="position-info-inner_value">
                          <?php echo CFS()->get('job_location')?>
                        </div>
                      </div>
                    </div>
                    <div class="job-position-info__btn">
                      <div class="position-info-inner-container">
                        <a href="<?php echo get_permalink(); ?>" target="_self" class="btn btn--icon"><?php echo CFS()->get('button_text_for_company_page')?><span class="btn-icon"></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <!-- end wrapp-->
          <?php else: ?>
            <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="cell small-12">
                  <div class="job-position-info__no-post"><?php echo CFS()->get('no_open_position_text')?></div>
                </div>
              </div>
            </div>
          <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </section>

<?php endwhile; ?>
