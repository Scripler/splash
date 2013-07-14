<?php
    {
        $sett = & acfg::$pages[ 'mytheme-contact' ][ 'content' ];
        
        $sett[ 'message' ] = array(
            'type' => array( 
                'template' => 'code',
            ),
            'content' => ahtml::myThemesContact()
        );
    }
?>