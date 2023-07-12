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

    <?php }