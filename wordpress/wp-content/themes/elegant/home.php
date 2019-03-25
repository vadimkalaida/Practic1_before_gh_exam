<?php get_header(); ?>

<main>
  <div class="whowe">
    <div class="whowe__container">
      <h2 class="whowe-small-headline"><?php echo get_theme_mod('who_we_are_top_small_headline'); ?></h2>
      <h3 class="whowe-headline"><?php echo get_theme_mod('who_we_are_headline'); ?></h3>
      <p class="whowe-text"><?php echo get_theme_mod('who_we_are_text'); ?></p>
      <a href="<?php echo home_url( '/about' ) ?>" class="whowe-button">Read More About Us</a>
    </div>
  </div>

  <div class="whatwe">
    <div class="whatwe__container">
      <h2 class="whatwe-small-headline"><?php echo get_theme_mod('what_we_do_top_small_headline'); ?></h2>
      <h3 class="whatwe-headline"><?php echo get_theme_mod('what_we_do_headline'); ?></h3>
      <div class="whatwe__works">
        <?php
        $args = array(
          'post_type'      => 'el_works',
          'posts_per_page' => '16',
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
  </div>

  <div class="whowe2">
    <div class="whowe2__container">
      <h2 class="whowe2-small-headline"><?php echo get_theme_mod('who_we_are2_top_small_headline'); ?></h2>
      <h3 class="whowe-headline"><?php echo get_theme_mod('who_we_are2_headline'); ?></h3>
      <p class="whowe-text"><?php echo get_theme_mod('who_we_are2_text'); ?></p>
      <div class="whowe2__persons">
        <?php
        add_filter("the_content", "plugin_myContentFilterHomeTeam");

        function plugin_myContentFilterHomeTeam($content)
        {
          return mb_substr($content, 0, 200);
        }

        add_filter("the_excerpt", "plugin_myExcerptFilterHomeTeam");

        function plugin_myExcerptFilterHomeTeam($excerpt)
        {
          return mb_substr($excerpt, 0, 20);
        }

        $args = array(
          'post_type'      => 'el_team',
          'posts_per_page' => '12',
        );

        $query = new WP_Query($args);
        if($query->have_posts()) {
          while($query->have_posts()) {
            $query->the_post();
            ?>
        <div class="whowe2__persons__person">
          <?php if(has_post_thumbnail()) {
            echo get_the_post_thumbnail(get_the_ID());
          }else {
            echo '<img src="'.EL_IMG_DIR.'/dae6d405-af3c-4e0d-b961-d49795a88ec1_1.f0276d14656e2f9f78bc6f315f649c18.jpeg">';
          }; ?>
          <div class="whowe2__person-job"><?php the_excerpt(); ?></div>
          <div class="whowe2__person-name"><?php the_title(); ?></div>
          <div class="whowe2__person-text"><?php the_content(); ?></div>
        </div>
        <?php
        }

        } else {}

        wp_reset_postdata();

        ?>
      </div>
    </div>
  </div>

  <div class="lastpost">
    <div class="lastpost__container">
      <h2 class="lastpost-small-headline"><?php echo get_theme_mod('last_post_top_small_headline'); ?></h2>
      <h2 class="lastpost-headline"><?php echo get_theme_mod('last_post_headline'); ?></h2>
      <?php
      add_filter("the_content", "plugin_myContentFilterHomeLastPost");

      function plugin_myContentFilterHomeLastPost($content)
      {
        return mb_substr($content, 0, 200);
      }

      add_filter("the_excerpt", "plugin_myExcerptFilterHomeLastPost");

      function plugin_myTitleFilterHomeLastPost($title)
      {
        return mb_substr($title, 0, 20);
      }

      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => '1',
      );

      $query = new WP_Query($args);
      if($query->have_posts()) {
      while($query->have_posts()) {
      $query->the_post();
      ?>
      <div class="lastpost__post">
        <div class="lastpost__post__left">
          <?php if(has_post_thumbnail()) {
            echo get_the_post_thumbnail(get_the_ID());
          }else {
            echo '<img src="'.EL_IMG_DIR.'/dae6d405-af3c-4e0d-b961-d49795a88ec1_1.f0276d14656e2f9f78bc6f315f649c18.jpeg">';
          }; ?>
        </div>
        <div class="lastpost__post__right">
          <p class="lastpost__post-date"><?php the_time('F j, Y'); ?></p>
          <h4 class="lastpost__post-title"><?php the_title(); ?></h4>
          <div class="lastpost__post-text"><?php the_content(); ?></div>
          <a href="<?php the_permalink(); ?>" class="lastpost__post-btn">Read</a>
        </div>
      </div>
        <?php
      }

      } else {}

      wp_reset_postdata();

      ?>
      <a href="<?php echo home_url( '/blog' ) ?>" class="lastpost-btn">More From Our Blog</a>
    </div>
  </div>

  <div class="home-contact">
    <div class="home-contact__container">
      <h2 class="home-contact-small-headline"><?php echo get_theme_mod('home_contact_top_small_headline'); ?></h2>
      <h3 class="home-contact-headline"><?php echo get_theme_mod('home_contact_headline'); ?></h3>
      <div class="home-contact__content">
        <div class="home-contact__content__top">
          <iframe src="https://www.google.com/maps/d/embed?mid=19RyxOhbvnf8OQZyUVujZDJEwbJE" style="width: 100%; height: 295px; border: none;"></iframe>
        </div>
        <div class="home-contact__content__bottom">
          <div class="home-contact__content__bottom__line">
            <div class="home-contact__content__bottom__text">
              <h4 class="home-contact__content__bottom__text-headline"><?php echo get_theme_mod('home_contact_block_line1_left_headline'); ?></h4>
              <p class="home-contact__content__bottom__text-paragraph"><?php echo get_theme_mod('home_contact_block_line1_left_first_paragraph'); ?></p>
              <p class="home-contact__content__bottom__text-paragraph2"><?php echo get_theme_mod('home_contact_block_line1_left_second_paragraph'); ?></p>
            </div>
            <div class="home-contact__content__bottom__text">
              <h4 class="home-contact__content__bottom__text-headline"><?php echo get_theme_mod('home_contact_block_line1_right_headline'); ?></h4>
              <p class="home-contact__content__bottom__text-paragraph"><?php echo get_theme_mod('home_contact_block_line1_right_first_paragraph'); ?></p>
              <p class="home-contact__content__bottom__text-paragraph2"><?php echo get_theme_mod('home_contact_block_line1_right_second_paragraph'); ?></p>
            </div>
          </div>
          <div class="home-contact__content__bottom__line">
            <div class="home-contact__content__bottom__text">
              <h4 class="home-contact__content__bottom__text-headline"><?php echo get_theme_mod('home_contact_block_line2_left_headline'); ?></h4>
              <p class="home-contact__content__bottom__text-paragraph"><?php echo get_theme_mod('home_contact_block_line2_left_first_paragraph'); ?></p>
              <p class="home-contact__content__bottom__text-paragraph2"><?php echo get_theme_mod('home_contact_block_line2_left_second_paragraph'); ?></p>
            </div>
            <div class="home-contact__content__bottom__text">
              <h4 class="home-contact__content__bottom__text-headline"><?php echo get_theme_mod('home_contact_block_line2_right_headline'); ?></h4>
              <p class="home-contact__content__bottom__text-paragraph"><?php echo get_theme_mod('home_contact_block_line2_right_first_paragraph'); ?></p>
              <p class="home-contact__content__bottom__text-paragraph2"><?php echo get_theme_mod('home_contact_block_line2_right_second_paragraph'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
