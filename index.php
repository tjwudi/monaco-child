<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package patrick
 * @since patrick 1.0
 */

get_header(); ?>

    <?php get_template_part( 'slide', 'index' ); ?>
    
    <div class="intro">
      <div class="intro-text">
      <?php echo of_get_option('w2f_intro_text'); ?>
      </div>
    </div>
    <div id="primary" class="site-content">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <?php
            /* Include the Post-Format-specific template for the content.
             * If you want to overload this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );
          ?>

        <?php endwhile; ?>
        <div class="clear"></div>
        <div class="grid_4">
        <?php patrick_content_nav( 'nav-below' ); ?>
        </div>
        <?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

        <?php get_template_part( 'no-results', 'index' ); ?>

      <?php endif; ?>

      <div class="grid_4 pbl">
        <a href="/?page_id=44" class="contact-btn"><?php _e('Contact us now!', 'patrick') ?></a>
      </div>

      <div class="grid_4">
        <?php wp_pagenavi(); ?>
      </div>

      </div><!-- #content -->
    </div><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>