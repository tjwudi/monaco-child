<?php

/**
 * flexslider_extend
 * 向首页的slider加入一个样式表
 */
function flexslider_extend() {
  wp_enqueue_style( 'flexslider-extend', get_stylesheet_directory_uri() . '/flexslider.css', array('flexslider') );
}
add_action( 'wp_enqueue_scripts', 'flexslider_extend' );

/**
 * get_banner_image_uri
 * 获取首页标题背景图的位置
 */
function get_banner_image_uri() {
  echo get_stylesheet_directory_uri() . '/images/banner.png';
}

/**
 * Admin Page theme
 * @return [type] [description]
 */
function monaco_child_admin_theme_style() {
    wp_enqueue_style( 'monaco-child-admin-theme', get_stylesheet_directory_uri() . '/admin.css' );
}
add_action('admin_enqueue_scripts', 'monaco_child_admin_theme_style');
add_action('login_enqueue_scripts', 'monaco_child_admin_theme_style');

/**
 * Query修改
 */
function monaco_child_pre_get_posts( $query ) {
  if ( $query->is_main_query() ) {
    if ( is_home() ) {
      // 主页上不显示“秀丽山水”分类
      $query->set( 'cat', '-6' );
      // 主页上最多4篇文章
      $query->set( 'posts_per_page', 4 );
    }
  }
}
add_action( 'pre_get_posts', 'monaco_child_pre_get_posts' );

/**
 * Replaces the excerpt "more" text by a link
 */
function monaco_child_get_the_excerpt($content) {
  global $post;
  $link = '<a class="moretag" href="'. get_permalink($post->ID) . '"> ' . __('[Read the full article...]', 'patrick')  . '</a>';
  return preg_replace('/\[.*\]$/', '', $content) . $link;
}
add_filter( 'get_the_excerpt', 'monaco_child_get_the_excerpt' );

/**
 * Custom Widgets
 */
// 从widgets.php中加载custom widgets
// We are programmers, we write clean and elegant code.
require_once( get_stylesheet_directory() . '/inc/widgets.php' );
function monaco_child_register_widgets() {
  register_widget( 'MC_WP_Widget_Meta' );
}
add_action( 'widgets_init', 'monaco_child_register_widgets' );

/**
 * monaco_child_setup
 * 主题配置
 */
function monaco_child_setup(){
  // 加载翻译文件
  load_child_theme_textdomain( 'patrick', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'monaco_child_setup' );
