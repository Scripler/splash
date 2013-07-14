<?php
    $pages = & acfg::$pages;
    
    $pages = array(
        /* MAIN PAGE */
        'mytheme-general' => array(
            'menu' => array(
                'label' => 'myTheme',
                'ico'	=> '',
            ),
            'title' => __( 'General Settings' , "mythemes" ),
            'description' => '',
        ),
		
        /* SUBPAGES */
        'mytheme-under-construction' => array(
            'menu' => array(
                'label' => __( 'Under Construction' , "mythemes" ),
            ),
			
            'title' => __( 'Under Construction Settings' , "mythemes" ),
            'description' => '',
            'content' => array(	),
        ),
        
        'mytheme-social' => array(
            'menu' => array(
                'label' => __( 'Social' , "mythemes" ),
            ),
			
            'title' => __( 'Social Settings' , "mythemes" ),
            'description' => '',
            'content' => array(),
        ),
        
        'mytheme-docs' => array(
            'menu' => array(
                'label' => __( 'Docs' , "mythemes" ),
            ),
            'title' => __( 'Docs' , "mythemes" ),
            'description' => '',
            'update' => false,
            'content' => array(),
        ),
        
        'mytheme-contact' => array(
            'menu' => array(
                'label' => __( 'Contact' , "mythemes" ) . ' <span class="not-upper">myThemes</span>',
            ),
            'title' => __( 'Direct contact' , "mythemes" ) . ' <span class="not-upper my-logo"><span>my</span>Themes</span>',
            'description' => '',
            'update' => false,
            'content' => array(),
        )
    );
?>