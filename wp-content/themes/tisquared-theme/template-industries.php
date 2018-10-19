<?php
/**
 * Template Name: Industries page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/another', 'header'); ?>

  <?php
    $hero_bnr_color = CFS()->get('hero_section_background_color_ind');
    $hero_bnr_image = CFS()->get('hero_section_background_image_ind');
    $hero_bnr_title = CFS()->get('hero_title_ind');
    $hero_bnr_desc = CFS()->get('hero_description_ind');
  ?>

  <div class="page-banner page-banner-industries" <?php echo ($hero_bnr_image) ? 'style="background-image:url('.$hero_bnr_image.');"' : 'style="background-color:'.$hero_bnr_color.';"'?> >
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-12 medium-7 large-7">
          <div class="page-banner-outside">
            <div class="page-banner__inner animation animate--opacity slide-up">
              <div class="page-banner__title page-banner__title--inds">
                <?php echo $hero_bnr_title ?>
              </div>
              <div class="page-banner__desc">
                <?php echo $hero_bnr_desc ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    $ind_srv_loop = CFS()->get('industries_services');
  ?>
  <div class="industries-main-content">
    <div class="industries-main-content__inner">
      <?php
        foreach ( $ind_srv_loop as $field ) {
          $values = $field['industries_service_position'];
          foreach ( $values as $key => $label ) {
            if($label !== 'left') {?>

              <?php $values_outer_option = $field['type_media_into_service'];
              foreach ( $values_outer_option as $key_option => $label_option ) {
                $media_file_option = $label_option;
              }
              ?>

              <div class="service-content <?php echo(!empty($field['industries_service_video_link_vm']) || !empty($field['industries_service_video_link_yt']) && $media_file_option != 'Image') ? 'service-content--center': ''?> <?php echo($field['size_image']) ? 'service-content--small' : ''?> service-content--mediaright" <?php echo($field['background_color_service']) ? 'style="background-color:'. $field['background_color_service'] .';"' : ''?>>
                <div class="service-content__info animation animate--opacity slide-up">
                  <div class="service-header">
                    <div class="service-header__sub">
                      <?php echo $field['industries_service_subtitle']?>
                    </div>
                    <div class="service-header__title">
                      <?php echo $field['industries_service_title']?>
                    </div>
                  </div>
                  <div class="service-context">
                    <div class="service-context__desc">
                      <?php echo $field['industries_service_description']?>
                    </div>
                    <div class="service-context__btn-wrap">
                      <a href="<?php echo $field['link_to_get_a_quote_pages']['url']?>" target="<?php echo $field['link_to_get_a_quote_pages']['target']?>" class="btn-link-more"><?php echo $field['link_to_get_a_quote_pages']['text']?><span class="btn-icon"></span></a>
                    </div>
                  </div>
                </div>
                <div class="service-content__media animated animate--opacity scale">
                  <div class="service-media-container">
                    <div class="service-media-container__inner <?php echo($media_file_option == 'Video link vimeo') ? 'inner-content-vimeo' : ''?>">
                      <?php
                      $values_inner = $field['type_media_into_service'];
                      foreach ( $values_inner as $key_inner => $label_inner ) {
                        if($label_inner == 'Image' && !empty($field['industries_service_image'])) { ?>
                          <div style="<?php echo 'background-image: url('.$field['industries_service_image'].');'?>" class="service-image <?php echo($field['size_image']) ? 'service-image--small' : ''?> "></div>
                        <?php } ?>
                        <?php if($label_inner == 'Video file' && !empty($field['industries_service_video_filemp4']) && !empty($field['industries_service_video_filewbm'])) { ?>
                          <video playsinline="playsinline" autobuffer="true" controls>
                            <source src="<?php echo $field['industries_service_video_filemp4'];  ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                            <source src=<?php echo $field['industries_service_video_filewbm']; ?>" type='video/webm; codecs="vp8, vorbis"'>
                          </video>
                        <?php } ?>
                        <?php if($label_inner == 'Video link vimeo' && !empty($field['industries_service_video_link_vm'])) { ?>
                          <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="<?php echo $field['industries_service_video_link_vm']?>?color=ffffff&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
                          <script src="https://player.vimeo.com/api/player.js"></script>
                        <?php } ?>
                        <?php if($label_inner == 'Video link youtube' && !empty($field['industries_service_video_link_yt'])) { ?>
                        <div class="responsive-embed">
                          <iframe width="560" height="315" src="<?php echo $field['industries_service_video_link_yt']?>-o?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>

            <?php } else { ?>

              <?php $values_outer_option = $field['type_media_into_service'];
              foreach ( $values_outer_option as $key_option => $label_option ) {
                $media_file_option = $label_option;
              }
              ?>


              <div class="service-content <?php echo(!empty($field['industries_service_video_link_vm']) || !empty($field['industries_service_video_link_yt']) && $media_file_option != 'Image') ? 'service-content--center': ''?> <?php echo($field['size_image']) ? 'service-content--small' : ''?> service-content--medialeft" <?php echo($field['background_color_service']) ? 'style="background-color:'. $field['background_color_service'] .';"' : ''?>>
                <div class="service-content__info animation animate--opacity slide-up">
                  <div class="service-header">
                    <div class="service-header__sub">
                      <?php echo $field['industries_service_subtitle']?>
                    </div>
                    <div class="service-header__title">
                      <?php echo $field['industries_service_title']?>
                    </div>
                  </div>
                  <div class="service-context">
                    <div class="service-context__desc">
                      <?php echo $field['industries_service_description']?>
                    </div>
                    <div class="service-context__btn-wrap">
                      <a href="<?php echo $field['link_to_get_a_quote_pages']['url']?>" target="<?php echo $field['link_to_get_a_quote_pages']['target']?>" class="btn-link-more"><?php echo $field['link_to_get_a_quote_pages']['text']?><span class="btn-icon"></span></a>
                    </div>
                  </div>
                </div>
                <div class="service-content__media animated animate--opacity scale">
                  <div class="service-media-container">
                    <div class="service-media-container__inner <?php echo($media_file_option == 'Video link vimeo') ? 'inner-content-vimeo' : ''?>">

                      <?php
                      $values_inner = $field['type_media_into_service'];
                      foreach ( $values_inner as $key_inner => $label_inner ) {
                        if($label_inner == 'Image' && !empty($field['industries_service_image'])) { ?>
                          <div style="<?php echo 'background-image: url('.$field['industries_service_image'].');'?>" class="service-image <?php echo($field['size_image']) ? 'service-image--small' : ''?> "></div>
                        <?php } ?>
                        <?php if($label_inner == 'Video file' && !empty($field['industries_service_video_filemp4']) && !empty($field['industries_service_video_filewbm'])) { ?>
                          <div class="media-is-video-container">
                            <?php echo do_shortcode('[evp_embed_video control="false" url="'.$field['industries_service_video_filewbm'].'" url="'.$field['industries_service_video_filemp4'].'" class="fp-minimal" template="mediaelement"]')?>
                          </div>
                        <?php } ?>
                        <?php if($label_inner == 'Video link vimeo' && !empty($field['industries_service_video_link_vm'])) { ?>
                        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/195458349?color=ffffff&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                        <?php } ?>
                        <?php if($label_inner == 'Video link youtube' && !empty($field['industries_service_video_link_yt'])) { ?>
                        <div class="responsive-embed">
                          <iframe width="560" height="315" src="<?php echo $field['industries_service_video_link_yt']?>-o?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                      <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>
          <?php } ?>

       <?php } ?>
    </div>
  </div>
<?php endwhile; ?>
