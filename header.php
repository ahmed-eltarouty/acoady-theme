<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body oncontextmenu="return false;">
	        <!-- start first nav -->
		<nav class="navbar navbar-dark bg-dark d-relative p-0">
            <div class="container text-light d-flex flex-row-reverse">
                <div class="row flex-row-reverse">
                    <div class="nav1">
                        <span class="mr-sm-4 font-weight-bold" ><?php echo ArabicDate();?></span>
                        <span class="mr-2 font-weight-bold d-none d-sm-inline" >أخر الموضوعات</span>
                    </div>
                    <div class ='m-2 d-none d-lg-inline'>
					<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  						<div class="carousel-inner">
								<a class="nav1-topic" href="">

									<?php
									$recent_posts = wp_get_recent_posts(array(
										'numberposts' => 10, // Number of recent posts thumbnails to display
										'post_status' => 'publish' // Show only the published posts
									));
									$x=0;
									foreach( $recent_posts as $post_item ) : 
										if($x==0){?>
										    <div class="carousel-item active" data-interval="10000">
												<a class="text-white head-titles" href="<?php echo get_permalink($post_item['ID']) ?>">
													<p class=""><?php echo $post_item['post_title'] ?></p>
												</a>
											</div>
											<?php
										}else{ ?>
											<div class="carousel-item" data-interval="10000">
												<a class="text-white head-titles" href="<?php echo get_permalink($post_item['ID']) ?>">
													<p class=""><?php echo $post_item['post_title'] ?></p>
												</a>
											</div>
											<?php
										}
										$x++;
									endforeach; ?>
										</div>
									</div>
								</a>
                    		</div>
                		</div>

                <div class="colors d-xm-none d-md-block">
                    <ul>
                        <li data-color='#4db2ec'></li>
                        <li data-color='#080'></li>
                        <li data-color='#800'></li>
                        <li data-color='#008'></li>
                    </ul>
                </div>
                <div class="my-2 my-2-sm">
                    <a class='d-inline text-white ' href="#" class="instagram" data-title="Instagram" target="_blank">
                        <span class="font-icon-social-instagram"><i class="fab fa-facebook fa-lg ml-1"></i></span>
                    </a>
                    
                    <a href="#" class="text-white text-decoration-none" data-title="Instagram" target="_blank">
                        <span class="font-icon-social-instagram"><i class="fab fa-twitter fa-lg ml-1"></i></span>
                    </a>
                    
                    <a href="#" class="text-white text-decoration-none" data-title="Instagram" target="_blank">
                        <span class="font-icon-social-instagram"><i class="fab fa-youtube fa-lg ml-1"></i></span>
                    </a>

                    <a href="#" class="text-white text-decoration-none" data-title="Instagram" target="_blank">
                        <span class="font-icon-social-instagram"><i class="fab fa-instagram fa-lg ml-1"></i></span>
                    </a>
                    <a href="#" class="text-white text-decoration-none d-none d-sm-inline" data-title="Pinterest" target="_blank">
                        <span class="font-icon-social-pinterest"><i class="fab fa-pinterest fa-lg ml-1"></i></span>
                    </a>
					<a href="https://acoady.com/?s=" class="text-white text-decoration-none" target="_blank" data-title="Search">
						<span class="font-icon-social-pinterest"><i class="fas fa-search fa-lg ml-1"></i></span>
					</a>
                </div>
            </div>
        
        </nav>
        <!-- end first nav -->

        <!-- start Header -->
        <div class="container p-2">
            <h1 class="d-flex justify-content-end mr-1"><?php bloginfo( 'name' )?></h1>
            <span class="d-flex justify-content-end font-weight-bold"><?php bloginfo( 'description');?></span>
        </div>
        <!-- end Header -->

	<!-- first menu look at 049 -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark main-nav">
		<div class="container d-flex flex-row-reverse">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">
			<a href="<?php echo bloginfo('wpurl'); ?>" title="Home"><i class="fas fa-home fa-2x"></i></a>
				<?php acoady_nav_menu() ?>
			</div>
			
		</div>
	</nav>

	