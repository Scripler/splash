<?php
    {   /* FRONT PAGE OPTIONS */
        $sett = & acfg::$pages[ 'mytheme-under-construction' ][ 'content' ];
        //mytheme_admin::save();
        
        $sett[ 'logo' ] = array(
            'type' => array(
                'template' => 'inline',
                'input' => 'upload'
            ),
            'label' => __( 'Upload logo' , "mythemes" ),
            'hint' => __( 'This logo will be used only for under construction side' , "mythemes" )
        );
        
        $sett[ 'activate' ] = array(
            'type' => array(
                'template' => 'inline',
                'input' => 'logic'
            ),
            'action' => "{'t' : '.mytheme-used-page' , 'f' : '-' }",
            'label' => __( 'Activate under construction template' , "mythemes" ),
            'hint' => __( 'It will activate only on front page' , 'mythemes' )
        );
        
        if( isset( $_POST[ 'mytheme-under-construction-activate' ] ) && $_POST[ 'mytheme-under-construction-activate' ] == 1 ){
            $use = true;
        }
        else if( isset( $_POST[ 'mytheme-under-construction-activate' ] ) && $_POST[ 'mytheme-under-construction-activate' ] == 0 ){
            $use = false;
        }
        else {
            $use = (boolean)myTheme::get( 'under-construction-activate' );
        }
        
        if( $use ){
            $pageClass = 'mytheme-used-page';
        }
        else{
            $pageClass = 'mytheme-used-page hidden';
        }
        
        $sett[ 'default-text' ] = array(
            'type' => array(
                'template' => 'inline',
                'input' => 'textarea'
            ),
            'templateClass' => $pageClass,
            'label' => __( 'Default under construction description' , "mythemes" )
        );
        
        $sett[ 'page' ] = array(
            'type' => array(
                'template' => 'inline',
                'input' => 'search'
            ),
            'templateClass' => $pageClass,
            'query' => array( 'post_type' => 'page' , 'post_status' => 'published' ),
            'label' => __( 'Show content from page ( 600 chars )' , "mythemes" ),
            'hint' => __( 'Will display the first 600 characters from page content' , "mythemes" )
        );
    }
?>