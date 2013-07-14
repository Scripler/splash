<?php
	include dirname( __FILE__ ) . '/fw/main.php';
    /* include dirname( __FILE__ ) . '/stt/stt.php'; */

    if( !isset( $content_width ) ) { 
        $content_width = 530; 
    }

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );

    define( '_CONTENT_' ,'Default lorem ipsum content' );
    
    load_theme_textdomain( "mythemes" , get_template_directory() . '/media/languages' );
    
    load_child_theme_textdomain( "mythemes" );
?>