<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elegant
 */

?>

	<footer class="footer">
    <div class="footer__container">

      <div class="footer__left">
        <p class="footer-text"><?php echo get_theme_mod('footer_left_text'); ?></p>
      </div>

      <div class="footer__right">
        <p class="footer-text"><?php echo get_theme_mod('footer_right_text'); ?></p>
      </div>

    </div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
