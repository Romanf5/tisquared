<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';

  //Header customize

  //logo

  $wp_customize->add_section('logo', array(
    'title' => __('Logotypes', 'theme'),
    'description' => __('Download your logo', 'theme'),
    'priority' => 10
  ));

  $wp_customize->add_setting('header-logo', array(
    'default' => get_template_directory_uri() . '/assets/images/logo.png',
    'transport' => 'refresh'
  ));


  $wp_customize->add_control(new \WP_Customize_Image_Control(
    $wp_customize, 'h_logo', array(
      'label' => __('Upload a header logo: max-width: 200px, max-height: 50px', 'theme'),
      'section' => 'logo',
      'settings' => 'header-logo'
    )
  ));

  $wp_customize->add_setting('header-logo-fixed', array(
    'default' => get_template_directory_uri() . '/assets/images/logo-blue.png',
    'transport' => 'refresh'
  ));


  $wp_customize->add_control(new \WP_Customize_Image_Control(
    $wp_customize, 'h_logo-fixed', array(
      'label' => __('Upload a header logo: max-width: 200px, max-height: 50px', 'theme'),
      'section' => 'logo',
      'settings' => 'header-logo-fixed'
    )
  ));

  //Header info

  $wp_customize->add_section('header', array(
    'title' => __('Header info', 'theme'),
    'description' => __('Change header info', 'theme'),
    'priority' => 10
  ));

  $wp_customize->add_setting('header-info-btn-text', array(
    'h-info-btn-text',
    array('default' => 'Get a quote')
  ));


  $wp_customize->add_control(
    'h-info-btn-text', array(
      'label' => __('Header button text', 'theme'),
      'section' => 'header',
      'type' => 'text',
      'settings' => 'header-info-btn-text'
    )
  );

  $wp_customize->add_setting('header-info-btn-url', array(
    'h-info-btn-url',
    array('default' => '#')
  ));


  $wp_customize->add_control(
    'h-info-btn-url', array(
      'label' => __('Header button text url', 'theme'),
      'section' => 'header',
      'type' => 'text',
      'settings' => 'header-info-btn-url'
    )
  );

  $wp_customize->add_setting('header-info-btn-target', array(
    'h-info-btn-target',
    array('default' => '_self')
  ));


  $wp_customize->add_control(
    'h-info-btn-target', array(
      'label' => __('Header button url target: _blank, _parent, _top
', 'theme'),
      'section' => 'header',
      'type' => 'text',
      'settings' => 'header-info-btn-target'
    )
  );

  //Footer

  $wp_customize->add_section('footer', array(
    'title' => __('Footer', 'theme'),
    'description' => __('Download your logo', 'theme'),
    'priority' => 10
  ));

  $wp_customize->add_setting('footer-logo', array(
    'default' => get_template_directory_uri() . '/assets/images/footer-logo.png',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(new \WP_Customize_Image_Control(
    $wp_customize, 'f_logo', array(
      'label' => __('Upload a header logo: max-width: 148px, max-height: 90px', 'theme'),
      'section' => 'footer',
      'settings' => 'footer-logo'
    )
  ));

  $wp_customize->add_setting('footer-copy', array(
    'f-footer-cop',
    array('default' => '')
  ));


  $wp_customize->add_control(
    'h-info-btn-text', array(
      'label' => __('Footer copyright', 'theme'),
      'section' => 'footer',
      'type' => 'text',
      'settings' => 'footer-copy'
    )
  );

  $wp_customize->add_section('page404', array(
    'title' => __('Page 404', 'theme'),
    'description' => __('Download your image to page 404', 'theme'),
    'priority' => 10
  ));

  $wp_customize->add_setting('page-404-logo', array(
    'transport' => 'refresh'
  ));


  $wp_customize->add_control(new \WP_Customize_Image_Control(
    $wp_customize, 'p_404_logo', array(
      'label' => __('Upload a page 404 image : max-width: 310px, max-height: 272px', 'theme'),
      'section' => 'page404',
      'settings' => 'page-404-logo'
    )
  ));
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
