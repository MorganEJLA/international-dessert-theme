<?php

get_header();

while (have_posts()) {
    the_post();
    pageBanner();
   ?>
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
        if($country-> have_posts()){
            echo '<hr class = "section-break"/>';
        echo '<h3>Related countries that feature ' . get_the_title() . '</h3>';
        
        while($country -> have_posts()){
            $country -> the_post();?>
            <li><a href = "<?php the_permalink(); ?>"><?php the_title();  ?></a></li>
            
        
        <?php }
        echo '</ul>';
        }
    ?>
    </div>

<?php }