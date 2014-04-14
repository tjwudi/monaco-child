<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package patrick
 * @since patrick 1.0
 */
?>

  </div><!-- #main -->

  <div id="bottom" class="container_6">
<ul>

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar("Footer") ) : ?>  

    
<?php endif; ?>
  </ul>

<div class="clear"> </div>
</div>



  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
      <div class="fcred">
      Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?>.<br />
      </div>
    </div><!-- .site-info -->
  </footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>