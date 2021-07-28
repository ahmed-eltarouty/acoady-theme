<div class="col-md-6 slider1">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php
                    //Query 3 recent published post in descending order
                    $args = array( 'post_type' => 'post','posts_per_page' => '3', 'order' => 'DESC','post_status' => 'publish');
                    // $recent_posts = wp_get_recent_posts( $args );
                    $recent_posts = new WP_Query( $args );

                    if ( $recent_posts->have_posts() ) {
                        $x = 0;
                        while ( $recent_posts->have_posts() ) {
                            $recent_posts->the_post();
                            if ($x == 0){ ?>
                                <div class="carousel-item active">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail('', ['class'=>'d-block w-100 slider-img']) ?>
                                    </a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <a href="<?php the_permalink() ?>"><h5 class="text-white"><?php the_title() ?></h5> </a>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="carousel-item">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail('', ['class'=>'d-block w-100 slider-img']) ?>
                                    </a>
                                    <div class="carousel-caption d-none d-md-block">
                                        <a href="<?php the_permalink() ?>"><h5 class="text-white"><?php the_title() ?></h5> </a>
                                    </div>
                                </div>
                                <?php
                            }
                            $x++;
                        }
                    }

            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>









<!-- <div class="col-sm-6 slider1">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src=https://picsum.photos/640/360 class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
            </div>
            <div class="carousel-item">
                <img src=https://picsum.photos/640/360 class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
            <img src=https://picsum.photos/640/360 class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
</div> -->