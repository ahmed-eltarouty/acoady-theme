<?php

    require_once('wp-bootstrap-navwalker.php');
    /**
    ** functions
    **
    ** Added by Acoady
    */


// add feathured image support
add_theme_support('post-thumbnails');


function acoady_styles(){
    wp_enqueue_style('bootstrap.min.css','https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css');
    wp_enqueue_style('all.min.css','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css');
    wp_enqueue_style('style.css',get_template_directory_uri(). '/style.css');
}


function acoady_scripts(){
    wp_deregister_script('jquery');
    wp_register_script( 'jquery-3.2.1.slim.min.js','https://code.jquery.com/jquery-3.2.1.slim.min.js','',false,true);
    wp_enqueue_script( 'jquery-3.2.1.slim.min.js','');
    wp_enqueue_script( 'popper.min.js','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js','', false, true);
    wp_enqueue_script( 'bootstrap.min.js','https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.min.js','', false, true);
    wp_enqueue_script( 'myscript.js',get_template_directory_uri(). '/myscript.js','', false, true);
}

add_action( 'wp_enqueue_scripts','acoady_styles');
add_action( 'wp_enqueue_scripts','acoady_scripts');


/**
 * Main menu
 */


//regeister the menu locations
 function acoady_main_menu(){
     register_nav_menus(array(
         'Main-Menu' => 'Navigation Bar',
         'top_menu' => 'Top Menu'
     ));
 }

 function acoady_nav_menu(){ //display the menu
    wp_nav_menu(array(
        'theme_location' => 'Main-Menu',
        'menu_class'     => 'navbar-nav mr-auto flex-md-row-reverse',
        'container'      => false,
        'depth'          => 2,
        'walker'         => new wp_bootstrap_navwalker()
    )); 
    }


 add_action('init','acoady_main_menu');


// the excerpt 

// function acoady_excerpet_length($length){
//     return 15;
// }

// add_filter( 'excerpt_length', 'acoady_excerpet_length');
class Excerpt {

    // Default length (by WordPress)
    public static $length = 55;
  
    // So you can call: my_excerpt('short');
    public static $types = array(
        'short' => 25,
        'regular' => 55,
        'long' => 100
      );
  
    /**
     * Sets the length for the excerpt,
     * then it adds the WP filter
     * And automatically calls the_excerpt();
     *
     * @param string $new_length 
     * @return void
     * @author Baylor Rae'
     */
    public static function length($new_length = 55) {
      Excerpt::$length = $new_length;
  
      add_filter('excerpt_length', 'Excerpt::new_length');
  
      Excerpt::output();
    }
  
    // Tells WP the new length
    public static function new_length() {
      if( isset(Excerpt::$types[Excerpt::$length]) )
        return Excerpt::$types[Excerpt::$length];
      else
        return Excerpt::$length;
    }
  
    // Echoes out the excerpt
    public static function output() {
      the_excerpt();
    }
  
  }
  
  // An alias to the class
  function my_excerpt($length = 55) {
    Excerpt::length($length);
  }

function acoady_excerpet_more($more){
    return '';
}

add_filter( 'excerpt_more', 'acoady_excerpet_more');


// register sidebar

function acoady_sidebar(){
    register_sidebar(array(
        'name'          => 'Main-sidenar',
        'id'            => 'main-sidebar',
        'description'   => 'The main sidebar for the site',
        'class'         => 'main-sidebar',
        'before-widget' => '<div class="widget-content">',
        'after-widget'  => '</div>',
        'before-title'  => '<h3 class="widget-title">',
        'before-title'  => '</h3>'
    ));
}

add_action('widgets_init','acoady_sidebar');


function index_page_arrgs($cats){ 

    //Query 3 recent published post in descending order
    $args = array( 'post_type' => 'post','posts_per_page' => '5', 'order' => 'DESC','post_status' => 'publish','cat' => $cats  );
    // $recent_posts = wp_get_recent_posts( $args );
    $recent_posts = new WP_Query( $args ); 
    if ( $recent_posts->have_posts() ) { ?>

        <div class="topics-head mb-3">
            <a href="<?php echo get_category_link($cats)?>">
                <h3 class="mb-2"><?php echo get_cat_name( $category_id = $cats );?></h3>
            </a>
        </div>
        <div class="row justify-content-end">

                                                        <!-- Posts Query  -->
    <?php

    // $arrlength = count($recent_posts);
    // The Loop
          $x = 0;
        while ( $recent_posts->have_posts() ) {
            $recent_posts->the_post();
            if ($x == 0){ ?>
                <div class="col-sm-6 order-sm-2 ">
                    <!-- <img src=https://picsum.photos/640/360 class="d-block w-100" alt="..."> -->
                    <div class="thumnail-1">
                        <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail('', ['class'=>'img-responsive img-thumbnail']) ?>
                        </a>
                    </div>
                    <div class="text-right mt-1">
                        <i class="far fa-calendar-alt"></i>
                        <span class="ml-2"><?php the_time('F j,Y') ?></span>
                        <!-- <i class="fas fa-user"></i>
                        <span class="ml-2">Admin</span> -->
                        <i class="fas fa-comments mt-2"></i>
                        <span class="mt-2"><?php comments_popup_link( '0 comment', '1 comment', '% comments') ?></span>
                        <div class="text-left">
                            <a href="<?php the_permalink() ?>"><h4><?php the_title() ?></h4> </a>
                            <?php my_excerpt( 20 ) ?>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                <?php
            }else{
                    ?>

                    <div class="first-box">
                        <div class="row mb-2">
                            <div class="col-sm-6 topics">
                                <div class="d-flex justify-content-sm-around mt-1">                             
                                    <i class="far fa-calendar-alt m-1 m-sm-0"></i>
                                    <span class="m-1 m-sm-0"><?php the_time('F j,Y') ?></span>
                                    <!-- <i class="fas fa-user"></i>
                                    <span class="ml-2">Admin</span> -->
                                    <i class="fas fa-comments m-1 m-sm-0"></i>
                                    <span class="m-1 m-sm-0"><?php comments_popup_link( '0 comment', '1 comment', '% comments') ?></span>
                                </div>
                                <div class="text-left ml-2">
                                    <a href="<?php the_permalink() ?>"> <h6 class="text-unstyled mt-2"><?php the_title() ?></h6> </a>
                                    <div class="exc"><?php my_excerpt(14) ?></div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2 mb-sm-0">
                                <div class="thumnail-3">
                                    <!-- <img src=https://picsum.photos/640/360 class="d-block w-100" alt="..."> -->
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail(array(640,360), ['class'=>'img-responsive d-block w-100 img-body']) ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php

                }
                $x++;
        }


    } else {
        // no posts found
    }

?>
</div>


</div> 
<?php
 wp_reset_postdata();
}

function ArabicDate() {
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d'); // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D'); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    // header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = $ar_day.' '.date('d').' , '.$ar_month.' , '.date('Y');
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}