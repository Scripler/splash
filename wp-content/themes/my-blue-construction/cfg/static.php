<?php
    $cfg = array(
        
        /* FOOTER SETTINGS */
        'copyright' => '&copy; copyright 2012. Designed by <a class="home" href="http://mythem.es" target="_blank">myThemes</a>. Powered by <a class="home" href="http://wordpress.org">WordPress</a>.',
        
        /* MENUS SETTINGS */
        'menus' => array(
            'base-menu' => __( 'Base Menu' , "mythemes" ),
            'under-construction-menu' => __( 'Under Construction Menu' , "mythemes" )
        ),
        
        /* SIDEBARS SETTINGS */
        'sidebars' => array(
            array(
                'name' => __( 'General Sidebar' , "mythemes" ),
                'id' => 'blog_sidebar',
                'description' => __( 'Sidebar for Blog section' , "mythemes" ),
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget' => '</li>',
                'before_title' => '<h4 class="sidebartitle">',
                'after_title' => '</h4>',
            )
        )
    );
?>