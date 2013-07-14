<?php get_header(); ?>
	<div id="container">
		<?php
			if( myTheme::get( 'general-sidebar' ) == 'left'){
		?>	
				<div id="sidebar">
					<?php get_sidebar(); ?>
				</div>
		<?php		
			}
		?>
		<div id="content">
			<p class="search-result"><b><?php _e( 'Search Results' , "mythemes" ); ?></b></p>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div <?php post_class();?> id="post-<?php the_ID(); ?>">
						
							<?php 
								if(strlen($post -> post_title) == 0){ 
							?> 
									<p><a href="<?php the_permalink() ?>"><?php _e( 'Read more about this' , "mythemes" ); ?>..</a></p> 
							<?php 
								}else{
							?>
									<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e( 'Permanent Link to' , "mythemes" ); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<?php
								}
							?>	
							
							<?php the_excerpt(); ?>
					</div>
				<?php endwhile; ?>

				<div class="navigation">
					<span class="previous-posts"><?php next_posts_link('&laquo; ' . __( 'Previous' , "mythemes" ) ) ?></span> <span class="next-posts"><?php previous_posts_link( __( 'Next' , "mythemes" ) . ' &raquo;') ?></span>
				</div>

			<?php else : ?>
				<h4><?php _e( 'Sorry, nothing found.' , "mythemes" ); ?></h4>
                <p><?php _e( 'Unfortunately we did not find any results for your request.' , "mythemes" ); ?></p>
			<?php endif; ?>
		</div>
		<?php
			if( myTheme::get( 'general-sidebar' ) == 'right'){
		?>	
				<div id="sidebar">
					<?php get_sidebar(); ?>
				</div>
		<?php		
			}
		?>
		<div class="content-bottom"></div>
	</div>
<?php get_footer(); ?>