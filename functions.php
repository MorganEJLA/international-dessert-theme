<?php 

function pageBanner($args = NULL){
  if(!isset($args['title'])){
    $args['title'] = get_the_title();

  }
  if(!isset($args['subtitle'])){
    $args['subtitle'] = get_field('page_banner_subtitle');
  }
  if(!isset($args['photo'])){
    if(get_field('page_banner_background_image')AND 
    !is_archive() AND !is_home()){
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');

  }
}
  ?>
  <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url(<?php echo $args['photo']; ?>);"></div>
        <div class="page-banner__content container container--narrow">
            
            <h1 class="page-banner__title">
                <?php echo $args['title'] ?>
            </h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle']; ?></p>
            </div>
        </div>
    </div>
<?php }

function desserts_files(){
    wp_enqueue_script('main-dessert.js', get_theme_file_uri('/build/index.js'),array('jquery'),'1.0',true);
    wp_enqueue_style('custom-google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('desserts_main_styles',get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('desserts_extra_styles',get_theme_file_uri('/build/index.css'));
}
add_action('wp_enqueue_scripts', 'desserts_files');

function desserts_features(){
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerLocationOne', 'Footer Location One');
    register_nav_menu('footerLocationTwo', 'Footer Location Two');

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_image_size('pastryChefLandscape', 400, 260, true);
    add_image_size('pastryChefPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
}
add_action('after_setup_theme', 'desserts_features');



function atg_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'headerMenuLocation') {
      if(get_post_type()=='post' && $item->title=='Blog')
        $classes[] = 'current-menu-item';
      if(get_post_type()=='country' && $item->title=='Select Countries')
      $classes[] = 'current-menu-item';
      if(get_post_type()=='country' && $item->title=='Ingredients')
      $classes[] = 'current-menu-item';
      if(get_post_type()=='post' && $item->title=='All Pastry Chefs')
      $classes[] = 'current-menu-item';
      
    }
   
   
    
    return $classes;
  }
 
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

function desserts_adjust_queries($query){
  if(!is_admin() AND is_post_type_archive('ingredient') AND $query-> is_main_query() ){
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);

  }
  if(!is_admin() AND is_post_type_archive('country')AND $query->is_main_query()){
    $query->set('posts_per_page', '3');
 
  }
}


add_action('pre_get_posts', 'desserts_adjust_queries');