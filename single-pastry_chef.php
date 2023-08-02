<?php

get_header();

while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url(<?php echo get_theme_file_uri('/images/bahia-street.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                <?php the_title(); ?>
            </h1>
            <div class="page-banner__intro">
                <p>Dont forget to replace later</p>
            </div>
        </div>
    </div>
    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class = "row group">
                <div class = "one-third">
                    <?php the_post_thumbnail('pastryChefPortrait'); ?>

                </div>
                <div class = "two-thirds">
                    <?php the_content(); ?>
                </div>
            </div>
        
        </div>
        <?php 
            $country_featured = get_field('country_featured');
            // Need to wrap in an if statement so that only runs if there are related ingredients
            if($country_featured) {
                echo '<hr class = "section-break">';
                echo '<h2 class = "headline headline--small">Country of Origin(s)</h2>';
                echo '<ul class = "link-list min-list">';
                foreach($country_featured as $country){ ?>
                    <li><a href = "<?php echo get_the_permalink($country); ?>"><?php echo get_the_title($country); ?></a></li>
                <?php }
                echo '</ul>';
            }
           
        ?>

    </div>

    <?php }

   

?>