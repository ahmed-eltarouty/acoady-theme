
<?php get_header(); ?>

<div class="container">

<?php if ( have_posts() ){ ?>



    <?php
        the_archive_title( '<h1 class="text-center mt-4">', '</h1>' );

        the_archive_description( '<div class="text-center">', '</div>' );
        ?>
        <body>
            <div class="container">
                <div class="row justify-content-end">
            <?php
            while(have_posts()){ 
                            the_post(); ?>
                <div class="col-sm-3 mt-3">
                    <div class="dd">
                        <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail('', ['class'=>'img-responsive img-thumbnail']) ?>
                        </a>
                    </div>
                    <a href="<?php the_permalink() ?>"><h5 class="text-center mt-2"><?php the_title() ?></h5> </a>

                </div>

            <?php
        }

    }

    ?>
    </div>
    <div class="container d-flex justify-content-between mt-5 next-prev">
        <?php
            if(get_previous_posts_link()){
                previous_posts_link();
            }else{
                echo '<p class="d-inline" title="there is no previous page">previouse pages</p>';
            }
        
            if(get_next_posts_link()){
                next_posts_link();
            }else{
                echo '<p class="d-inline" title="there is no next page">next pages</p>';
            }
        ?>
    </div>
    </div>
</body><!-- .entry-header-outer /-->

<?php  get_footer();?>


