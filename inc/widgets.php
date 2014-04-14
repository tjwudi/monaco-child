<?php
class MC_WP_Widget_Meta extends WP_Widget {

  function __construct() {
    $widget_ops = array('classname' => 'widget_meta', 'description' => __( "Login, RSS, &amp; WordPress.org links.") );
    parent::__construct('site_meta', __('Site Meta'), $widget_ops);
  }

  function widget( $args, $instance ) {
    extract($args);
    $title = apply_filters('widget_title', empty($instance['title']) ? __('Site Meta') : $instance['title'], $instance, $this->id_base);

    echo $before_widget;
    if ( $title )
      echo $before_title . $title . $after_title;
    ?>
    <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php echo esc_attr(__('Syndicate this site using RSS 2.0')); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
        <li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php echo esc_attr(__('The latest comments to all posts in RSS')); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
        <?php wp_meta(); ?>
      </ul>
    <?php
    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);

    return $instance;
  }

  function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = strip_tags($instance['title']);
    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <?php
  }
}