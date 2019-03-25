<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elegant
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php if(is_home()) {?>
	  <header class="header">
      <div class="header__container">
  <?php } ?>

  <?php if(is_page('blog')) {?>
  <header class="header-blog">
    <div class="header-blog__container">
  <?php } ?>

  <?php if(is_page('blogexpanded')) {?>
    <header class="header-blog">
      <div class="header-blog__container">
  <?php } ?>

  <?php if(is_page('about')) {?>
  <header class="header-about">
    <div class="header-about__container">
  <?php } ?>
        <div class="header__top">
          <div class="header__top__left">
            <a href="<?php echo home_url(); ?>" class="header-logo"><img src="<?php echo get_theme_mod('site_logo-img'); ?>" alt="Site Logo Image" class="header-logo-img"></a>
          </div>
          <div class="header__top__right">
            <?php if(has_nav_menu('primary')): ?>
              <?php
              wp_nav_menu(array(
                'menu_class'    => 'header__nav',
                'menu_id'       => 'nav',
                'theme_location'=> 'primary',
              ));
              ?>
            <?php endif; ?>
            <p class="header__top-menu-text" id="menu-text"><?php echo get_theme_mod('header_navigation-text-menu'); ?></p>
            <div class="nav-toggle-btn" id="nav-toggle-btn" onclick="openMenu(); openMenuClickFunc()">
              <i class="fa fa-bars nav-toggle-btn-open" id="nav-toggle-btn-open" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <?php if(is_home()) {?>
          <div class="header__content">
            <h2 class="header-bigheadline"><?php echo get_theme_mod('header_home_big_headline'); ?></h2>
          </div>
        <?php } ?>

      <?php if(is_page('about')) { ?>
        <div class="header-about__content">
          <a href="#about-text" class="header-about__content-btn-down" id="btn-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
        </div>
      <?php } ?>
      <?php if(is_page('blogexpanded')) { ?>
        <div class="header-blogexpanded__content">
          <h2 class="header-blogexpanded__content-headline"><?php the_title(); ?></h2>
        </div>
      <?php } ?>
      </div>
    </header>

