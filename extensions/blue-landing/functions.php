<?php

if ( is_admin() )
	return;

if ( ! class_exists( 'BuilderExtensionBlueLandingLayout' ) ) {
	class BuilderExtensionBlueLandingLayout {
		
		function BuilderExtensionBlueLandingLayout() {
			
			// Include the file for setting the image sizes
			//require_once( dirname( __FILE__ ) . '/lib/image-size.php' );
			
			// Helpers
			it_classes_load( 'it-file-utility.php' );
			$this->_base_url = ITFileUtility::get_url_from_file( dirname( __FILE__ ) );
			
			// Calling only if on a singular
			if ( !is_singular() ) {
				add_action( 'builder_layout_engine_render', array( &$this, 'change_render_content' ), 0 );
			}
		}
		
		function extension_render_content() {	
			
		?>
			<?php if ( have_posts() ) : ?>
				<div class="loop">
					<div class="loop-content">
						<?php while ( have_posts() ) : // The Loop ?>
							<?php the_post(); ?>
						
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<!-- title, meta, and date info -->
												
								<!-- post content -->
								<div class="entry-content clearfix">
									<?php the_content(); ?>
								</div>
								
								
							</div>
							<!-- end .post -->
												
						<?php endwhile; // end of one post ?>
					</div>
				</div>
			<?php else : // do not delete ?>
				<?php do_action( 'builder_template_show_not_found' ); ?>
			<?php endif; // do not delete ?>
		<?php
	
}


		
		function change_render_content() {
			remove_action( 'builder_layout_engine_render_content', 'render_content' );
			add_action( 'builder_layout_engine_render_content', array( &$this, 'extension_render_content' ) );
		}




	
	} // end class 
	
	$BuilderExtensionBlueLandingLayout = new BuilderExtensionBlueLandingLayout();
}


