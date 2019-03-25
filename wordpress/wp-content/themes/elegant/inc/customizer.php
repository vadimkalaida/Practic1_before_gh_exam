<?php
/**
 * elegant Theme Customizer
 *
 * @package elegant
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elegant_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'elegant_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'elegant_customize_partial_blogdescription',
		) );
		//SITE LOGO
    $wp_customize->add_section( 'site_logo_section' , array(
      'title'      => __( 'Site Logo Section', 'elegant' ),
      'priority'   => 30,
    ) );
    $wp_customize->add_setting( 'site_logo-img' , array(
      'default'   => '',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo-img', array(
      'label'      => __( 'Site Logo Image', 'elegant' ),
      'section'    => 'site_logo_section',
      'settings'   => 'site_logo-img',
    ) ) );
    //HEADER NAVIGATON TEXT 'MENU'
    $wp_customize->add_section( 'header_navigation_section' , array(
      'title'      => __( 'Header Navigation Section', 'elegant' ),
      'priority'   => 30,
    ) );
    $wp_customize->add_setting( 'header_navigation-text-menu' , array(
      'default'   => 'MENU',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_navigation-text-menu', array(
      'label'      => __( 'Header Navigation text early navigation button', 'elegant' ),
      'section'    => 'header_navigation_section',
      'settings'   => 'header_navigation-text-menu',
    ) ) );
    //HEADER-HOME BIG HEADLINE
    $wp_customize->add_section( 'header_home_section' , array(
      'title'      => __( 'Home Header Section', 'elegant' ),
      'priority'   => 30,
    ) );
    $wp_customize->add_setting( 'header_home_big_headline' , array(
      'default'   => 'Say Haloa to your Portfolio',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_home_big_headline', array(
      'label'      => __( 'Header Home Big Headline', 'elegant' ),
      'section'    => 'header_home_section',
      'settings'   => 'header_home_big_headline',
    ) ) );



    //FOOTER SECTION

    $wp_customize->add_section( 'footer_section' , array(
      'title'      => __( 'Footer Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //FOOTER LEFT TEXT
    $wp_customize->add_setting( 'footer_left_text' , array(
      'default'   => '© 2014 Designed and Developed by Diogo Dantas',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_left_text', array(
      'label'      => __( 'Footer Left Text', 'elegant' ),
      'section'    => 'footer_section',
      'settings'   => 'footer_left_text',
    ) ) );
    //FOOTER RIGHT TEXT
    $wp_customize->add_setting( 'footer_right_text' , array(
      'default'   => 'Email: imdiogodantas@gmail.com',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_right_text', array(
      'label'      => __( 'Footer Right Text', 'elegant' ),
      'section'    => 'footer_section',
      'settings'   => 'footer_right_text',
    ) ) );



    //(PAGE: HOME) WHO WE ARE SECTION

    $wp_customize->add_section( 'who_we_are_section' , array(
      'title'      => __( '(PAGE: HOME) Who We Are Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) WHO WE ARE SMALL TOP HEADLINE
    $wp_customize->add_setting( 'who_we_are_top_small_headline' , array(
      'default'   => 'Who we Are',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'who_we_are_top_small_headline', array(
      'label'      => __( 'SMALL TOP HEADLINE', 'elegant' ),
      'section'    => 'who_we_are_section',
      'settings'   => 'who_we_are_top_small_headline',
    ) ) );
    //(PAGE: HOME) WHO WE ARE HEADLINE
    $wp_customize->add_setting( 'who_we_are_headline' , array(
      'default'   => 'Tell The World About Yourself',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'who_we_are_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'who_we_are_section',
      'settings'   => 'who_we_are_headline',
    ) ) );
    //(PAGE: HOME) WHO WE ARE TEXT
    $wp_customize->add_setting( 'who_we_are_text' , array(
      'default'   => 'Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc, fiant sollemnes in futurum.',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'who_we_are_text', array(
      'label'      => __( 'TEXT', 'elegant' ),
      'section'    => 'who_we_are_section',
      'settings'   => 'who_we_are_text',
    ) ) );



    //(PAGE: HOME) WHAT WE DO SECTION

    $wp_customize->add_section( 'what_we_do_section' , array(
      'title'      => __( '(PAGE: HOME) What We Do Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) WHAT WE DO SMALL TOP HEADLINE
    $wp_customize->add_setting( 'what_we_do_top_small_headline' , array(
      'default'   => 'What we do',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'what_we_do_top_small_headline', array(
      'label'      => __( 'SMALL TOP HEADLINE', 'elegant' ),
      'section'    => 'what_we_do_section',
      'settings'   => 'what_we_do_top_small_headline',
    ) ) );
    //(PAGE: HOME) WHAT WE DO HEADLINE
    $wp_customize->add_setting( 'what_we_do_headline' , array(
      'default'   => 'Show Your Amazing Work',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'what_we_do_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'what_we_do_section',
      'settings'   => 'what_we_do_headline',
    ) ) );



    //(PAGE: HOME) WHO WE ARE2 SECTION

    $wp_customize->add_section( 'who_we_are2_section' , array(
      'title'      => __( '(PAGE: HOME) Who We Are 2 Section (under what we do section)', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) WHO WE ARE2 SMALL TOP HEADLINE
    $wp_customize->add_setting( 'who_we_are2_top_small_headline' , array(
      'default'   => 'Who we Are',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'who_we_are2_top_small_headline', array(
      'label'      => __( 'SMALL TOP HEADLINE', 'elegant' ),
      'section'    => 'who_we_are2_section',
      'settings'   => 'who_we_are2_top_small_headline',
    ) ) );
    //(PAGE: HOME) WHO WE ARE2 HEADLINE
    $wp_customize->add_setting( 'who_we_are2_headline' , array(
      'default'   => 'The Amazing People Behind This',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'who_we_are2_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'who_we_are2_section',
      'settings'   => 'who_we_are2_headline',
    ) ) );
    //(PAGE: HOME) WHO WE ARE2 TEXT
    $wp_customize->add_setting( 'who_we_are2_text' , array(
      'default'   => 'Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'who_we_are2_text', array(
      'label'      => __( 'TEXT', 'elegant' ),
      'section'    => 'who_we_are2_section',
      'settings'   => 'who_we_are2_text',
    ) ) );



    //(PAGE: HOME) LAST POST SECTION

    $wp_customize->add_section( 'last_post_section' , array(
      'title'      => __( '(PAGE: HOME) Last Post Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) LAST POST SMALL TOP HEADLINE
    $wp_customize->add_setting( 'last_post_top_small_headline' , array(
      'default'   => 'Last Post',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'last_post_top_small_headline', array(
      'label'      => __( 'SMALL TOP HEADLINE', 'elegant' ),
      'section'    => 'last_post_section',
      'settings'   => 'last_post_top_small_headline',
    ) ) );
    //(PAGE: HOME) LAST POST HEADLINE
    $wp_customize->add_setting( 'last_post_headline' , array(
      'default'   => 'We Like to Write',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'last_post_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'last_post_section',
      'settings'   => 'last_post_headline',
    ) ) );



    //(PAGE: HOME) CONTACT US SECTION

    $wp_customize->add_section( 'home_contact_section' , array(
      'title'      => __( '(PAGE: HOME) Contact Us Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) CONTACT US SMALL TOP HEADLINE
    $wp_customize->add_setting( 'home_contact_top_small_headline' , array(
      'default'   => 'Contact Us',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_top_small_headline', array(
      'label'      => __( 'SMALL TOP HEADLINE', 'elegant' ),
      'section'    => 'home_contact_section',
      'settings'   => 'home_contact_top_small_headline',
    ) ) );
    //(PAGE: HOME) CONTACT US HEADLINE
    $wp_customize->add_setting( 'home_contact_headline' , array(
      'default'   => 'Work With Us',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'home_contact_section',
      'settings'   => 'home_contact_headline',
    ) ) );



    //(PAGE: HOME) CONTACT US BLOCK LINE1 LEFT PART SECTION

    $wp_customize->add_section( 'home_contact_block_line1_left_section' , array(
      'title'      => __( '(PAGE: HOME) Contact Us Block Line 1 Left Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE1 LEFT PART HEADLINE
    $wp_customize->add_setting( 'home_contact_block_line1_left_headline' , array(
      'default'   => 'Location',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line1_left_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'home_contact_block_line1_left_section',
      'settings'   => 'home_contact_block_line1_left_headline',
    ) ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE1 LEFT PART FIRST PARAGRAPH
    $wp_customize->add_setting( 'home_contact_block_line1_left_first_paragraph' , array(
      'default'   => '198 West 21th Street, New',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line1_left_first_paragraph', array(
      'label'      => __( 'FIRST PARAGRAPH', 'elegant' ),
      'section'    => 'home_contact_block_line1_left_section',
      'settings'   => 'home_contact_block_line1_left_first_paragraph',
    ) ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE1 LEFT PART SECOND PARAGRAPH
    $wp_customize->add_setting( 'home_contact_block_line1_left_second_paragraph' , array(
      'default'   => 'York, NY 10010',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line1_left_second_paragraph', array(
      'label'      => __( 'SECOND PARAGRAPH', 'elegant' ),
      'section'    => 'home_contact_block_line1_left_section',
      'settings'   => 'home_contact_block_line1_left_second_paragraph',
    ) ) );



    //(PAGE: HOME) CONTACT US BLOCK LINE1 RIGHT PART SECTION

    $wp_customize->add_section( 'home_contact_block_line1_right_section' , array(
      'title'      => __( '(PAGE: HOME) Contact Us Block Line 1 Right Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE1 RIGHT PART HEADLINE
    $wp_customize->add_setting( 'home_contact_block_line1_right_headline' , array(
      'default'   => 'Phone',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line1_right_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'home_contact_block_line1_right_section',
      'settings'   => 'home_contact_block_line1_right_headline',
    ) ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE1 RIGHT PART FIRST PARAGRAPH
    $wp_customize->add_setting( 'home_contact_block_line1_right_first_paragraph' , array(
      'default'   => '+88 (0) 101 0000000',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line1_right_first_paragraph', array(
      'label'      => __( 'FIRST PARAGRAPH', 'elegant' ),
      'section'    => 'home_contact_block_line1_right_section',
      'settings'   => 'home_contact_block_line1_right_first_paragraph',
    ) ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE1 RIGHT PART SECOND PARAGRAPH
    $wp_customize->add_setting( 'home_contact_block_line1_right_second_paragraph' , array(
      'default'   => '+88 (0) 101 0000000',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line1_right_second_paragraph', array(
      'label'      => __( 'SECOND PARAGRAPH', 'elegant' ),
      'section'    => 'home_contact_block_line1_right_section',
      'settings'   => 'home_contact_block_line1_right_second_paragraph',
    ) ) );



    //(PAGE: HOME) CONTACT US BLOCK LINE2 LEFT PART SECTION

    $wp_customize->add_section( 'home_contact_block_line2_left_section' , array(
      'title'      => __( '(PAGE: HOME) Contact Us Block Line 2 Left Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE2 LEFT PART HEADLINE
    $wp_customize->add_setting( 'home_contact_block_line2_left_headline' , array(
      'default'   => 'Fax',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line2_left_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'home_contact_block_line2_left_section',
      'settings'   => 'home_contact_block_line2_left_headline',
    ) ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE2 LEFT PART FIRST PARAGRAPH
    $wp_customize->add_setting( 'home_contact_block_line2_left_first_paragraph' , array(
      'default'   => '+88 (0) 202 0000 000',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line2_left_first_paragraph', array(
      'label'      => __( 'FIRST PARAGRAPH', 'elegant' ),
      'section'    => 'home_contact_block_line2_left_section',
      'settings'   => 'home_contact_block_line2_left_first_paragraph',
    ) ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE1 LEFT PART SECOND PARAGRAPH
    $wp_customize->add_setting( 'home_contact_block_line2_left_second_paragraph' , array(
      'default'   => '+88 (0) 202 0000 000',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line2_left_second_paragraph', array(
      'label'      => __( 'SECOND PARAGRAPH', 'elegant' ),
      'section'    => 'home_contact_block_line2_left_section',
      'settings'   => 'home_contact_block_line2_left_second_paragraph',
    ) ) );



    //(PAGE: HOME) CONTACT US BLOCK LINE2 RIGHT PART SECTION

    $wp_customize->add_section( 'home_contact_block_line2_right_section' , array(
      'title'      => __( '(PAGE: HOME) Contact Us Block Line 2 Right Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE2 RIGHT PART HEADLINE
    $wp_customize->add_setting( 'home_contact_block_line2_right_headline' , array(
      'default'   => 'Email',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line2_right_headline', array(
      'label'      => __( 'HEADLINE', 'elegant' ),
      'section'    => 'home_contact_block_line2_right_section',
      'settings'   => 'home_contact_block_line2_right_headline',
    ) ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE2 RIGHT PART FIRST PARAGRAPH
    $wp_customize->add_setting( 'home_contact_block_line2_right_first_paragraph' , array(
      'default'   => 'elegant@elegant.com',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line2_right_first_paragraph', array(
      'label'      => __( 'FIRST PARAGRAPH', 'elegant' ),
      'section'    => 'home_contact_block_line2_right_section',
      'settings'   => 'home_contact_block_line2_right_first_paragraph',
    ) ) );
    //(PAGE: HOME) CONTACT US BLOCK LINE2 RIGHT PART SECOND PARAGRAPH
    $wp_customize->add_setting( 'home_contact_block_line2_right_second_paragraph' , array(
      'default'   => 'commercial@elegant.com',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_contact_block_line2_right_second_paragraph', array(
      'label'      => __( 'SECOND PARAGRAPH', 'elegant' ),
      'section'    => 'home_contact_block_line2_right_section',
      'settings'   => 'home_contact_block_line2_right_second_paragraph',
    ) ) );



    //(PAGE: ABOUT) ABOUT TEXT SECTION

    $wp_customize->add_section( 'about_text_section' , array(
      'title'      => __( '(PAGE: ABOUT) About Text Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //PAGE: ABOUT) ABOUT TEXT
    $wp_customize->add_setting( 'about_text_paragraph' , array(
      'default'   => 'That\'s an interesting thing about design defines so much more than what products have a very minimalist way. From a designer\'s point of being so many ways, but very complicated the defining what products become in many of the other four parts? True simplicity. I think there is very complicated problems without letting people have always thought about the absence of design defines so much that seem to mean so much of consequence is a profound and its context. There\'s no other four parts? Powerpoint. Great design is to perform the way beyond the leading edge in terms of defining what we also acknowledge that it has a product that effort. Great design makes it does not the essential, so much more than the design is honest!',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'about_text_paragraph', array(
      'label'      => __( 'TEXT', 'elegant' ),
      'section'    => 'about_text_section',
      'settings'   => 'about_text_paragraph',
    ) ) );



    //(PAGE: ABOUT) SERVICES SECTION

    $wp_customize->add_section( 'services_section' , array(
      'title'      => __( '(PAGE: ABOUT) Services Section', 'elegant' ),
      'priority'   => 30,
    ) );
    //PAGE: ABOUT) SERVICES  LEFT IMAGE
    $wp_customize->add_setting( 'services_image' , array(
      'default'   => '',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'services_image', array(
      'label'      => __( 'LEFT IMAGE', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_image',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT HEADLINE
    $wp_customize->add_setting( 'services_headline' , array(
      'default'   => 'Services',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_headline', array(
      'label'      => __( 'RIGHT HEADLINE', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_headline',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT TEXT
    $wp_customize->add_setting( 'services_text' , array(
      'default'   => 'We’ll work with you to define a strong visual identity. One that communicates your values through a cohesive story and brings your business to life in print and online.',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_text', array(
      'label'      => __( 'RIGHT TEXT', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_text',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT LINE1
    $wp_customize->add_setting( 'services_line1' , array(
      'default'   => '-  Branding',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_line1', array(
      'label'      => __( 'RIGHT LINE 1', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_line1',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT LINE2
    $wp_customize->add_setting( 'services_line2' , array(
      'default'   => '-  Visual Identity',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_line2', array(
      'label'      => __( 'RIGHT LINE 2', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_line2',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT LINE3
    $wp_customize->add_setting( 'services_line3' , array(
      'default'   => '-  Web & Digital Design',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_line3', array(
      'label'      => __( 'RIGHT LINE 3', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_line3',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT LINE4
    $wp_customize->add_setting( 'services_line4' , array(
      'default'   => '-  Annual Reports',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_line4', array(
      'label'      => __( 'RIGHT LINE 4', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_line4',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT LINE5
    $wp_customize->add_setting( 'services_line5' , array(
      'default'   => '-  Books & Brochures',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_line5', array(
      'label'      => __( 'RIGHT LINE 5', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_line5',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT LINE6
    $wp_customize->add_setting( 'services_line6' , array(
      'default'   => '-  Programs & Editorial',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_line6', array(
      'label'      => __( 'RIGHT LINE 6', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_line6',
    ) ) );
    //PAGE: ABOUT) SERVICES RIGHT LINE7
    $wp_customize->add_setting( 'services_line7' , array(
      'default'   => '-  Creative Consultancy',
      'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_line7', array(
      'label'      => __( 'RIGHT LINE 7', 'elegant' ),
      'section'    => 'services_section',
      'settings'   => 'services_line7',
    ) ) );
	}
}
add_action( 'customize_register', 'elegant_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function elegant_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function elegant_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elegant_customize_preview_js() {
	wp_enqueue_script( 'elegant-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'elegant_customize_preview_js' );
