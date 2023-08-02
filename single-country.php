<?php

get_header();

while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background_image');echo $pageBannerImage['sizes']['pageBanner'] ?>);"></div>
        <div class="page-banner__content container container--narrow">
            
            <h1 class="page-banner__title">
                <?php the_title(); ?>
            </h1>
            <div class="page-banner__intro">
                <p><?php the_field('page_banner_subtitle') ?></p>
            </div>
        </div>
    </div>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('country');
                ?>">Back to <i class="fa fa-home" aria-hidden="true"></i> Featured Countries Home </a> <span
                    class="metabox__main">Posted by
                    <?php
                    the_title();
                    ?>
                </span>
            </p>
        </div>
        <div class="generic-content">
            <?php
            the_content();
            ?>
        
        </div>
        <?php 
            $relatedIngredients = get_field('related_ingredients');
            // Need to wrap in an if statement so that only runs if there are related ingredients
            if($relatedIngredients) {
                echo '<hr class = "section-break">';
                echo '<h2 class = "headline headline--small">Related Ingredient(s)</h2>';
                echo '<ul class = "link-list min-list">';
                foreach($relatedIngredients as $ingredient){ ?>
                    <li><a href = "<?php echo get_the_permalink($ingredient); ?>"><?php echo get_the_title($ingredient); ?></a></li>
                <?php }
                echo '</ul>';
            }
           
        ?>

    </div>

    <?php }


?>