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
			<br /><br />
			<h2><?php _e( 'Error 404 - Not Found' , "mythemes" ); ?></h2>
            <p><?php _e( 'We apologize but this page, post or resource does not exist or can not be found. Perhaps it is necessary to change the call method to this page, post or resource.' , "mythemes" ) ?></p>
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