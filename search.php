<?php
/**
 * The template for displaying search results pages
 */

get_header();

if ( have_posts() ) {
	?>
	<header class="container mt-5">
        <div class="mx-auto">        <?php         get_search_form();    ?> </div>
		<h1 class="text-center">
			<?php
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'Results for "%s"', 'twentytwentyone' ),
				'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</h1>
	</header><!-- .page-header -->

	<div class="text-center">
		<?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					' تم العثور على %d نتائج لبحثك ',
					' تم العثور على %d نتائج لبحثك ',
                    
					(int) $wp_query->found_posts,
				)
			),
			(int) $wp_query->found_posts
		);
		?>
	</div><!-- .search-result-count -->
	<?php
	// Start the Loop.
	while ( have_posts() ) {
		the_post(); ?>
                <div class="container mt-2 first-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='text-right m-2'>
                                <i class="far fa-calendar-alt mt-2"></i>
                                <span class="ml-2 mt-2"><?php the_time('F j,Y') ?></span>
                            </div>
                            <div class="text-center my-2">
                                    <a href="<?php the_permalink() ?>"> <strong class="text-unstyled mt-2"><?php the_title() ?></strong> </a>
                            </div>
                            <div class="exc text-left"><?php my_excerpt(40) ?></div>
                        </div>
                        <div class="col-lg-6 search-img">
                            <!-- <img src=https://picsum.photos/640/360 class="d-block w-100" alt="..."> -->
                            <a href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail(array(640,360), ['class'=>'img-responsive d-block mx-auto']) ?>
                            </a>
                        </div>
                    </div>
                </div>
    <?php
	} // End the loop.
    ?>
    <div class="container d-flex justify-content-between my-5 next-prev">
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
<?php
	// Previous/next page navigation.


	// If no content, include the "No posts found" template.
} else { ?>
	<div class="container text-center my-5">
        <h3 class="py-3"> Sorry there is no results please try again with different words</h3>
        <?php         get_search_form();    ?>
    </div>
    <?php
}

get_footer();
