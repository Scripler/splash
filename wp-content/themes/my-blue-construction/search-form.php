<form method="get" id="search-form" action="<?php echo home_url(); ?>/">
    <input type="text" value="<?php esc_attr_e( 'Search' , "mythemes" ); ?>" name="s" id="search-input" onfocus="utils.focusEvent( '<?php esc_attr_e( 'Search' , "mythemes" ); ?>' );" onblur="utils.blurEvent( '<?php esc_attr_e( 'Search' , "mythemes" ); ?>' );" >
    <input type="submit" id="search-submit" value="" >
</form>
<div id="shadow-bar"> <!-- blank --> </div>
