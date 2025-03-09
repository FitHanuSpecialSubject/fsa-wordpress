<?php

/**
 * Register Block Pattern Category
 */

// Hook
add_action('init', 'carpenter_master_block_pattern_category');

// Callback
if (! function_exists('carpenter_master_block_pattern_category')) :
  function carpenter_master_block_pattern_category()
  {

    register_block_pattern_category(
      'carpenter-master-patterns',
      array(
        'label'       => __('Carpenter Master Patterns', 'carpenter-master'),
        'description' => __('Patterns for Carpenter Master', 'carpenter-master'),
      )
    );
  }
endif;

/**
 * Register Block Styles
 */

// Hook
add_action('init', 'carpenter_master_block_styles');

// Callback
if (! function_exists('carpenter_master_block_styles')) :
  function carpenter_master_block_styles()
  {
    // Block: core/details
    // Style: Primary
    // Via: Block Style
    register_block_style(
      'core/details',
      array(
        'name'  => 'details-1',
        'label' => __('Plus', 'carpenter-master'),
      )
    );

    // Block: core/image, core/post-featured-image
    // Style: Shine
    // Via: Block Style
    register_block_style(
      ['core/image', 'core/post-featured-image'],
      array(
        'name'  => 'image-shine',
        'label' => __('Shine', 'carpenter-master'),
      )
    );
  }
endif;

/**
 * Enqueue Block Stylesheets.
 */

// Hook
add_action('init', 'carpenter_master_block_stylesheets');

// Callback
if (! function_exists('carpenter_master_block_stylesheets')) :
  function carpenter_master_block_stylesheets()
  {

    // Block: core/button
    $asset = include get_parent_theme_file_path('public/css/button.asset.php');
    wp_enqueue_block_style(
      'core/button',
      array(
        'handle' => 'carpenter-master-button-style',
        'src'    => get_parent_theme_file_uri('public/css/button.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/button.css'),
      )
    );

    // Block: core/columns
    $asset = include get_parent_theme_file_path('public/css/columns.asset.php');
    wp_enqueue_block_style(
      'core/columns',
      array(
        'handle' => 'carpenter-master-columns-style',
        'src'    => get_parent_theme_file_uri('public/css/columns.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/columns.css'),
      )
    );

    // Block: core/cover
    $asset = include get_parent_theme_file_path('public/css/cover.asset.php');
    wp_enqueue_block_style(
      'core/cover',
      array(
        'handle' => 'carpenter-master-cover-style',
        'src'    => get_parent_theme_file_uri('public/css/cover.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/cover.css'),
      )
    );

    // Block: core/group
    $asset = include get_parent_theme_file_path('public/css/group.asset.php');
    wp_enqueue_block_style(
      'core/group',
      array(
        'handle' => 'carpenter-master-group-style',
        'src'    => get_parent_theme_file_uri('public/css/group.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/group.css'),
      )
    );

    // Block: core/image
    $asset = include get_parent_theme_file_path('public/css/image.asset.php');
    wp_enqueue_block_style(
      'core/image',
      array(
        'handle' => 'carpenter-master-image-style',
        'src'    => get_parent_theme_file_uri('public/css/image.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/image.css'),
      )
    );

    // Block: core/navigation
    $asset = include get_parent_theme_file_path('public/css/navigation.asset.php');
    wp_enqueue_block_style(
      'core/navigation',
      array(
        'handle' => 'carpenter-master-navigation-style',
        'src'    => get_parent_theme_file_uri('public/css/navigation.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/navigation.css'),
      )
    );

    // Block: core/paragraph
    $asset = include get_parent_theme_file_path('public/css/paragraph.asset.php');
    wp_enqueue_block_style(
      'core/paragraph',
      array(
        'handle' => 'carpenter-master-paragraph-style',
        'src'    => get_parent_theme_file_uri('public/css/paragraph.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/paragraph.css'),
      )
    );

    // Block: core/post-featured-image
    $asset = include get_parent_theme_file_path('public/css/post-featured-image.asset.php');
    wp_enqueue_block_style(
      'core/post-featured-image',
      array(
        'handle' => 'carpenter-master-post-featured-image-style',
        'src'    => get_parent_theme_file_uri('public/css/post-featured-image.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/post-featured-image.css'),
      )
    );
  }
endif;

/**
 * Load front-end assets.
 */

// Hook
add_action('wp_enqueue_scripts', 'carpenter_master_assets');

// Callback
if (! function_exists('carpenter_master_assets')) :
  function carpenter_master_assets()
  {
    $asset = include get_parent_theme_file_path('public/css/screen.asset.php');

    wp_enqueue_style(
      'carpenter-master-style',
      get_parent_theme_file_uri('public/css/screen.css'),
      $asset['dependencies'],
      $asset['version']
    );
  }
endif;

/**
 * Load back-end assets.
 * enqueue_block_editor_assets: Throw Warning in FSE
 */

// Hook
//add_action('enqueue_block_editor_assets', 'carpenter_master_block_editor_assets');
add_action('enqueue_block_assets', 'carpenter_master_block_editor_assets');

// Callback
if (! function_exists('carpenter_master_block_editor_assets')) :
  function carpenter_master_block_editor_assets()
  {
    $style_asset = include get_parent_theme_file_path('public/css/editor.asset.php');

    wp_enqueue_style(
      'carpenter-master-editor',
      get_parent_theme_file_uri('public/css/editor.css'),
      $style_asset['dependencies'],
      $style_asset['version']
    );
  }
endif;
