<?php 
/**
 * The Template for displaying all single posts.
 *
 * @package patrick
 * @since patrick 1.0
 */


// 如果是“秀丽风景”分类，跳转到该分类首页
if ( in_category ( 6, $_post ) ) {
  wp_redirect( '/?cat=6' );
  return;
}

get_header();
?>

    <div id="primary" class="site-content ">
      <div id="content" class="grid_4" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'single' ); ?>

        <?php patrick_content_nav( 'nav-below' ); ?>

        <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || '0' != get_comments_number() )
            comments_template( '', true );
        ?>

      <?php endwhile; // end of the loop. ?>

      </div><!-- #content -->
    </div><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>