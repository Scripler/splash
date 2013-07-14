<?php

    define( '_DEV_LOGO_', get_template_directory_uri() .'/media/admin/images/mythemes.png' );
    define( 'SHORT_PATH' , true ); /* USED FOR DEBUG */
        
    include dirname( __FILE__ ) . '/deb.class.php';
    include dirname( __FILE__ ) . '/tools.class.php';
    
    /* READ OPTIONS | META */
    include dirname( __FILE__ ) . '/sett.class.php';
    include dirname( __FILE__ ) . '/meta.class.php';

	
    include dirname( __FILE__ ) . '/cfg.php';
    include dirname( __FILE__ ) . '/mytheme.class.php';
    
    /* SET DEFAULT VALUES FOR SETTINGS FROM PAGES */
    include get_template_directory() . '/cfg/admin/default.php';
    
	/* LOAD THEME ADMIN DATA */
    if( is_admin() ){
        include dirname( __FILE__ ) . '/admin/ahtml.class.php';
        
        /* REGISTER PAGES */
        include get_template_directory() . '/cfg/admin/pages.php';
        include dirname( __FILE__ ) . '/admin/main.php';
        
        /* PAGES SETTINGS */
        if( isset( acfg::$pages ) && !empty( acfg::$pages ) ){
            foreach( acfg::$pages as $slug => $d ){
                include get_template_directory() . '/cfg/admin/' . str_replace( 'mytheme-' , '' , $slug ). '.php';
            }
        }
    }
	
    /* REGISTER ( MENUS | SIDEBARS ) */
    myTheme::reg_menus();
    myTheme::reg_sidebars();
?>