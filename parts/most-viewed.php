
<?php 
    $recent_posts = new WP_Query( array(
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'posts_per_page' => 5
                ) );

    if ( $recent_posts->have_posts() ) {
        while ( $recent_posts->have_posts() ) {
            echo 'xxxxxxxxx';
            $recent_posts->the_post(); ?>
            <a href="<?php the_permalink() ?>"><h4><?php the_title() ?></h4> </a>
            <?php
    }}

?>