<?php
/* Template Name: Page Blog Expanded */
?>
<?php get_header(); ?>

  <main>
    <div class="blog">
      <div class="blog__container">
        <div class="blog__content">
          <div class="blog__top">
            <div class="blog__posts">
              <?php
              add_filter("the_content", "plugin_myContentFilterBlogPost");

              function plugin_myContentFilterBlogPost($content)
              {
                return mb_substr($content, 0, 400);
              }

              add_filter("the_excerpt", "plugin_myExcerptFilterBlogPost");

              function plugin_myTitleFilterBlogPost($title)
              {
                return mb_substr($title, 0, 70);
              }

              $args = array(
                'post_type'      => 'post',
                'posts_per_page' => '256',
              );

              $query = new WP_Query($args);
              if($query->have_posts()) {
                while($query->have_posts()) {
                  $query->the_post();
                  ?>
                  <div class="post">
                    <div class="post__container">
                      <?php if(has_post_thumbnail()) {
                        echo get_the_post_thumbnail(get_the_ID());
                      }else {
                        echo '<img src="'.EL_IMG_DIR.'/dae6d405-af3c-4e0d-b961-d49795a88ec1_1.f0276d14656e2f9f78bc6f315f649c18.jpeg">';
                      }; ?>
                      <h2 class="post-title"><?php the_title(); ?></h2>
                      <p class="post-date"><?php the_time('j F Y'); ?></p>
                      <div class="post-text"><?php the_content(); ?></div>
                      <a href="<?php the_permalink(); ?>" class="post-btn">Read More</a>
                    </div>
                  </div>
                  <?php
                }

              } else {}

              wp_reset_postdata();

              ?>
            </div>
            <div class="blog__sidebar">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>