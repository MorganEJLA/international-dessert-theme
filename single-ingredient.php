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
            <?php
            the_content();
            ?>

        </div>

        <?php 

        $country = new WP_Query(array(
            'posts_per_page'=> 5,
            'post_type' => 'Country',
            'orderby' => 'title',
            'order' => 'ASC', 
            'meta_query' => array(
            array(
                'key' => 'related_ingredients',
                'compare' => 'LIKE', 
                'value' => '"'. get_the_ID() . '"'
                )
            )
        ));
        echo '<hr class = "section-break"/>';
        echo '<h3>Related Countries use ' . get_the_title() . '</h3>';
        
        while($homepageCountries ->have_posts()){
            $homepageCountries -> the_post();?>
            <div class="event-summary">
            <a class="event-summary__date t-center" href="#">
                
                <span class = "event-summary__day"></span>

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
    
        <?php }
    
        
    ?>