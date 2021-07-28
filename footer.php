<marquee class="marq d-none d-sm-block" behavior="alternate" direction="right" smallamount="6" onmouseover="if (!window.__cfRLUnblockHandlers) return false; this.stop();" onmouseout="if (!window.__cfRLUnblockHandlers) return false; this.start();">

<div class="col-xs-12 col-lg-9 main-posts">
	<?php
		if (is_single()){
			$p_tags=get_the_tags( get_the_ID() );
			foreach($p_tags as $p_tag){
				$query=new WP_Query(array('tag' => $p_tag->name));
				while ( $query->have_posts() ) {
					$query->the_post();  ?>
					<div class="tags-box d-inline-block mt-5">
                        <div class="row">
                            <div class="col-sm-6">
                                <i class="far fa-calendar-alt mt-2"></i>
                                <span class="ml-2 mt-2"><?php the_time('F j,Y') ?></span>
                                <!-- <i class="fas fa-user"></i>
                                <span class="ml-2">Admin</span> -->
                                <i class="fas fa-comments mt-2"></i>
                                <span class="mt-2"><?php comments_popup_link( '0 comment', '1 comment', '% comments') ?></span>
                                <div class="text-left">
                                    <a href="<?php the_permalink() ?>"> <h6 class="text-unstyled mt-2"><?php the_title() ?></h6> </a>
                                    <div class="exc"><?php my_excerpt(25) ?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="thumnail-4">
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
			}
		}
		
	?>
	</div>
</marquee>

<div class="footer text-center mt-5">
	copyright &copy; 2021 Acoady.com
</div>

<?php wp_footer();?>
</body>
</html>
