<?php
    //Query 3 recent published post in descending order
    $args = array( 'post_type' => 'post','posts_per_page' => '10', 'order' => 'DESC','post_status' => 'publish');
    // $recent_posts = wp_get_recent_posts( $args );
    $recent_posts = new WP_Query( $args );

    if ( $recent_posts->have_posts() ) {
        $x = 0;
        while ( $recent_posts->have_posts() ) {
            $recent_posts->the_post();
                ?>
                <div class="container mt-2 first-box">
                    <div class="text-center my-2">
                            <a href="<?php the_permalink() ?>"> <strong class="text-unstyled mt-2"><?php the_title() ?></strong> </a>
                    </div>
                    <div class="">
                        <!-- <img src=https://picsum.photos/640/360 class="d-block w-100" alt="..."> -->
                        <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail(array(150,150), ['class'=>'img-responsive d-block mx-auto']) ?>
                        </a>
                    </div>
                    <div class='text-right m-2'>
                        <i class="far fa-calendar-alt mt-2"></i>
                        <span class="ml-2 mt-2"><?php the_time('F j,Y') ?></span>
                    </div>
                    <div class="exc text-left"><?php my_excerpt(10) ?></div>
                </div>
            <?php
        }
    }
    wp_reset_query();
?>