<?php


get_header();
pageBanner(array(
    'title' => 'Ingredients!',
    'subtitle' => 'Discover a delightful array of featured ingredients, their delectable desserts, and the countries they hail from!'
)); 
?>

<div class="container container--narrow page-section">
<ul class = "link-list min-list">
<?php
    while (have_posts()) {
        the_post(); ?>
        <li><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php }

    echo paginate_links();
?>
</ul>

</div>

<?php get_footer();

?>