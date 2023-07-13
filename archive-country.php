<?php

get_header(); ?>
<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/bahia-street.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            All Featured Countries
        </h1>
        <div class="page-banner__intro">
            <p>Explore all of our featured countries!</p>
        </div>
    </div>
</div>
<div class="container container--narrow page-section">
    <?php
    while (have_posts()) {
        the_post(); ?>
        <div class="event-summary">
                    <a class="country-featured" href="#">
                        <?php
                        // don't forget to replace 'image' with your field name
                            $imageID = get_field('country_featured');
                            // can be one of the built-in sizes ('thumbnail', 'medium', 'large', 'full' or a custom size)
                            $size = 'thumbnail';

                            if ($imageID) {
                                // creates the img tag
                                echo wp_get_attachment_image($imageID, $size);
                            }
                        ?>
            <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p>
                    <?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>"
                        class="nu gray">Learn more</a>
                </p>
            </div>
        </div>
    <?php }

    echo paginate_links();
    ?>
</div>

<?php get_footer();

?>