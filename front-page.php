<?php get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/chocolate-hero.jpg') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
        <h2 class="headline headline--medium">Embark on a Flavorful Journey</h2>
        <h3 class="headline headline--small">Discover the Ingredients that Connect Sweet Traditions <strong>Worldwide</strong> 
            </h3>
        <a href="<?php echo get_post_type_archive_link('ingredient') ?>" class="btn btn--large btn--blue">Discover Sweet Links</a>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Featured Countries</h2>
            <?php 
                $homepageCountries = new WP_Query(array(
                    'posts_per_page'=> 3,
                    'post_type' => 'Country',
                    'orderby' => 'title',
                    'order' => 'ASC'
                ));
                while($homepageCountries ->have_posts()){
                    $homepageCountries -> the_post();?>
                    <div class="event-summary">
                    <a class="event-summary__date t-center" href="#">
        
                       <span class="event-summary__month">
                        <span class = "emoji">
                        🇪🇸 
                        <!-- need to replace this with the correct flags this is a placeholder  -->
                        </span>
                       
                        </span>
                    <span class="event-summary__day">
                      
                    </span>
                        </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php if(has_excerpt()){
                                echo get_the_excerpt();
                            }else{
                                echo wp_trim_words(get_the_content(), 18); 
                            }?>
                            <a href="<?php the_permalink(); ?>"
                            class="nu gray">Read
                            more</a>
                        </p>
                    </div>
                    </div>
            <?php }
        ?>
           
            

        <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('country') ?>" class="btn btn--blue">View All Featured Countries</a></p>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Featured Desserts</h2>
            <?php
      $homepagePosts = new WP_Query(
        array(
          'posts_per_page' => 3,
          'category_name' => 'test-category'
        )
      );

      while ($homepagePosts->have_posts()) {
        $homepagePosts->
          the_post(); 
        get_template_part('/template-parts/content-recipe', get_post_type());
            
          }
      ?>

       


        <p class="t-center no-margin"><a href="<?php
          echo site_url('/blog');
        ?>" class=" btn btn--yellow">View All Blog Posts</a></p>
    </div>
</div>
</div>

<div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
            <div class="hero-slider__slide"
                style="background-image: url(<?php echo get_theme_file_uri('images/cocada.jpg') ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Captivating Visuals </h2>
                        <p class="t-center">Stunning images of featured desserts &amp; ingredients</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide"
                style="background-image: url(<?php echo get_theme_file_uri('images/mango-panna-cotta.jpg') ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Exploring Authentic Recipes</h2>
                        <p class="t-center">Some of our desserts will have recipes so you create these treats at home.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide"
                style="background-image: url(<?php echo get_theme_file_uri('images/macaroon.jpg') ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Celebrating Cultural Heritage</h2>
                        <p class="t-center">Honoring the culinary heritage of each country, showcasing the unique flavors and tradition</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
</div>
<?php get_footer();

?>