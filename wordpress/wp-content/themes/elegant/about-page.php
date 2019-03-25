<?php
/* Template Name: Page About */
?>
<?php get_header(); ?>

<main>
  <div class="about-text" id="about-text">
    <div class="about-text__container">
      <p class="about-text-paragraph"><?php echo get_theme_mod('about_text_paragraph'); ?></p>
    </div>
  </div>

  <div class="services">
    <img src="<?php echo get_theme_mod('services_image'); ?>" alt="Services Image">
    <div class="services__right">
      <h3 class="services__right-headline"><?php echo get_theme_mod('services_headline'); ?></h3>
      <div class="services__right__text">
        <div class="services__right__text__left">
          <p class="services__right-text"><?php echo get_theme_mod('services_text'); ?></p>
        </div>
        <div class="services__right__text__right">
          <p class="services__right-line"><?php echo get_theme_mod('services_line1'); ?></p>
          <p class="services__right-line"><?php echo get_theme_mod('services_line2'); ?></p>
          <p class="services__right-line"><?php echo get_theme_mod('services_line3'); ?></p>
          <p class="services__right-line"><?php echo get_theme_mod('services_line4'); ?></p>
          <p class="services__right-line"><?php echo get_theme_mod('services_line5'); ?></p>
          <p class="services__right-line"><?php echo get_theme_mod('services_line6'); ?></p>
          <p class="services__right-line"><?php echo get_theme_mod('services_line7'); ?></p>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>