<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elegant
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
  <div class="sidebar__projects">
    <h3 class="sidebar__projects-headline">Projects</h3>
    <div class="sidebar__projects__photos">
      <?php
      $args = array(
        'post_type'      => 'el_works',
        'posts_per_page' => '4',
      );

      $query = new WP_Query($args);
      if($query->have_posts()) {
        while($query->have_posts()) {
          $query->the_post();
          ?>
          <?php if(has_post_thumbnail()) {
            echo get_the_post_thumbnail(get_the_ID());
          }else {
            echo '<img src="'.EL_IMG_DIR.'/dae6d405-af3c-4e0d-b961-d49795a88ec1_1.f0276d14656e2f9f78bc6f315f649c18.jpeg">';
          }; ?>
          <?php
        }

      } else {}

      wp_reset_postdata();

      ?>
    </div>
  </div>
</aside><!-- #secondary -->
