<?php get_header(); ?>

<!-- slider body -->
    <section class="d-none d-md-block p-4 slider-part">
        <div class="container">
            <div class="row">
                <div class="col-md-6 bg-white>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-topic">
                                <img src=https://picsum.photos/640/360 class="d-block w-100" alt="...">
                            </div>
                            <div class="mt-3 md-topic">
                                <img src=https://picsum.photos/640/360 class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-topic">
                                <img src=https://picsum.photos/640/360 class="d-block w-100" alt="...">
                            </div>
                            <div class="mt-3 md-topic">
                                <img src=https://picsum.photos/640/360 class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- start slider -->
                <?php get_template_part('parts/slider','slider' ) ?>
                <!-- end slider -->
            </div>

        </div>
    </section>
<!-- end slider body -->




    <!-- the body after slider -->
<section>
    <div class="container">
        <div class="row justify-content-end animation">
            <!-- sidebar -->
            <div class="d-none col-lg-3 d-lg-block acoady-sidebar animation">
                <?php 
                    if(is_active_sidebar('main-sidebar')){
                        dynamic_sidebar('main-sidebar');
                    } ?>
                    <!-- <?php //get_template_part('parts/most-viewed','viewed'); ?> -->
                    <?php get_template_part('parts/last-posts-sidebar','last-posts-sidebar'); ?>
                    
            </div>
            <!-- end sidebar -->

            <!-- content section -->

            <div class="col-xs-12 col-lg-9 main-posts">
                <?php
                    $categories = get_categories( array(
                        'orderby' => 'id',
                        'order'   => 'ASC'
                    ) );
                    foreach($categories as $category) {

                    index_page_arrgs($category->term_id); 

                } ?>
            </div>
                

            <!-- end content -->
        </div>
    </div>
</section>

<?php get_footer();?>