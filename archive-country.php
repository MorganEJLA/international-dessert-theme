<?php

get_header(); 
pageBanner(array(
    'title' => 'All Featured Countries',
    'subtitle' => 'Explore all of our featured countries!'
));
    
    ?>

<div class="container container--narrow page-section">
    <?php
    while (have_posts()) {
        the_post(); 
        get_template_part('/template-parts/content-recipe');
     }

    echo paginate_links();
    ?>
</div><

<?php get_footer();

?>