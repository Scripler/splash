<?php
    class myTheme{
        
        function get( $optName )
        {
            return sett::get( 'mytheme-' . $optName );
        }
        
        function cfg( $sett )
        {
            $file = get_template_directory() . '/cfg/static.php';
            
            if( file_exists( $file ) ){
                include $file;
                
                if( isset( $cfg[ $sett ] ) ){
                    if( is_array( $cfg[ $sett ] ) ){
                        if( isset( $cfg[ $sett ][ 'pageSlug' ] ) && isset( $cfg[ $sett ][ 'fieldName' ] ) ){
                            return sett::get( $cfg[ $sett ][ 'pageSlug' ] , $cfg[ $sett ][ 'fieldName' ] );
                        }
                        else{
                            return $cfg[ $sett ];
                        }
                    }
                    else{
                        return $cfg[ $sett ];
                    }
                }
                else{
                    return null;
                }
            }
            else{
                return null;
            }
        }
        
        function reg_menus( )
        {
            register_nav_menus( self::cfg( 'menus' ) );
        }
        
        function reg_sidebars( )
        {
            $sidebars = self::cfg( 'sidebars' );

            if( !empty( $sidebars ) ){
                foreach( $sidebars as $sidebar ){
                    register_sidebar( $sidebar );
                }
            }
        }
        
        function menu( $id ,  $args = array() ){

            $menu = new menu( $args );

            $vargs = array(
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => isset( $args['class'] ) ? $args['class'] : '',
                'menu_id'         => '',
                'echo'            => false,
                'fallback_cb'     => '',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'depth'           => 0,
                'walker'          => $menu,
                'theme_location'  => $id ,
            );

            $result = wp_nav_menu( $vargs );

            if(!$result){
                $result = $menu -> get_terms_menu();
            }

            if($menu -> need_more){
                    $result .="</li></ul>".$menu -> aftersubm ;
            }

            return $result;
        }
        
        function pagination(){
            global $wp_query;
            if( (int) get_query_var('paged') > 0 ){
                $paged = get_query_var('paged');
            }else{
                if( (int) get_query_var('page') > 0 ){
                    $paged = get_query_var('page');
                }else{
                    $paged = 1;
                }
            }
            
            return $paged;
        }
        
        function gravatar( $author, $size, $default = '' )
        {
            $result = get_avatar( $author , $size , $default );
            
            return $result;
        }
        
        function title()
        {
            bloginfo('name'); ?> &raquo; <?php bloginfo('description'); ?><?php if ( is_single() ) { ?><?php } ?><?php wp_title();
        }
    }
?>