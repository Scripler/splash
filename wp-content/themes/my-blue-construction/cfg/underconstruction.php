    <body <?php body_class( 'my-front-page' ); ?>>
        <div id="mytheme-wrapper">
            <div id="home-header">
                <?php 
                    if( strlen( esc_url( myTheme::get( 'under-construction-logo' ) ) ) ){
                        echo '<div class="logo-image"><img src="' . esc_url( myTheme::get( 'under-construction-logo' ) ) . '" /></div>';
                    }else{
                ?>
                        <h1 class="home"><?php bloginfo( 'name' ); ?></h1>
                        <p class="logo-description"><?php bloginfo( 'description' ); ?></p>
                <?php
                    }
                ?>
            </div>
            <div id="home-page"><!-- blank --></div>
            <div id="home-main"><!-- blank --></div>
            <div id="home-content">
                <div id="home-social">	
                    <?php
                        /* FACEBOOK */
                        if( strlen( esc_url( myTheme::get( 'social-facebook' ) ) ) ) { 
                            echo '<a href="' . esc_url( myTheme::get( 'social-facebook' ) ) . '" class="facebook" title="' . esc_attr__( 'facebook profile' , "mythemes" ) . ' : ' . esc_url( myTheme::get( 'social-facebook' ) ) . '">';
                            echo '<img src="' . get_template_directory() . '/resource/images/facebook-hover.png" width="0" height="0" alt="" />';
                            echo '</a>';
                        }

                        /* TWITTER */
                        if( strlen( esc_attr( myTheme::get( 'social-twitter' ) ) ) ) { 
                            echo '<a href="http://twitter.com/' . esc_attr( myTheme::get( 'social-twitter' ) ) . '" class="twitter" title="' . esc_attr__( 'twitter account' , "mythemes" ) . ' : ' . esc_attr( myTheme::get( 'social-twitter' ) ) . '">';
                            echo '<img src="' . get_template_directory() . '/resource/images/twitter-hover.png" width="0" height="0" alt="" />';
                            echo '</a>';
                        }

                        /* FEED */
                        if( (int) myTheme::get( 'social-rss' ) ){
                            echo '<a href="'; bloginfo( 'rss2_url' ); 
                            echo '" class="rss" title="' . esc_attr__( 'RSS Feed' , "mythemes" ) .'">';
                            echo '<img src="' . get_template_directory() . '/resource/images/rss-hover.png" width="0" height="0" alt="" />';
                            echo '</a>';
                        }
                    ?>
                </div>

                <?php
                    if( strlen( esc_attr( myTheme::get( 'social-subscribe' ) ) ) ) {
                ?>
                        <div id="home-subscribe">
                            <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="javascript:utils.feedburner( '<?php echo esc_attr( myTheme::get( 'social-subscribe' ) ); ?>' );">
                                <input type="text" class="text" name="email" value="<?php esc_attr_e( 'your email for subscription' , "mythemes" ); ?>" onfocus="javascript:utils.focusEvent( this , '<?php esc_attr_e( 'your email for subscription' , "mythemes" ); ?>' )" onblur="javascript:utils.blurEvent( this , '<?php esc_attr_e( 'your email for subscription' , "mythemes" ); ?>' )">
                                <input type="hidden" value="<?php echo esc_attr( myTheme::get( 'social-subscribe' ) ); ?>" name="uri">
                                <input type="hidden" name="loc" value="en_US">
                                <input type="submit" class="submit" value="">
                            </form>
                        </div>
                <?php
                    }
                ?>

                <div id="home-blog-info">
                    <?php
                        $pid = myTheme::get( 'under-construction-page' );
                        $p = get_post( $pid );

                        echo '<div class="post-home-description">';

                        if(  $pid > 0 && !isset( $p -> ID ) ) { /* SHOW PAGE ON FRONT PAGE */


                            if( has_post_thumbnail( $p -> ID ) ){
                                echo '<a href="' . get_permalink( $p -> ID ) . '">' . get_the_post_thumbnail( $p -> ID , 'thumbnail' ) .'</a>';
                            }


                            if( strlen( $p -> post_excerpt ) ){
                                echo '<p>' . $p -> post_excerpt  . '</p>';
                            }else{
                                echo '<p>' . mb_substr( strip_tags( strip_shortcodes( $p -> post_content ) ) , 0 , 600 ) . ' [...]</p>';
                            }
                        }
                        else{ /* SHOW DEFAULT CONTENT ON FRONT PAGE */ 
                            echo '<p>' . myTheme::get( 'under-construction-default-text' ) . '</p>';
                        }
                        echo '<div class="clear"></div>';    
                        echo '</div>';
                    ?>
                </div>
            </div>
        </div>	
        <div id="home-footer">
            <div class="menu">
                <nav class="inline linet">
                    <?php
                        $location = get_nav_menu_locations();
                        if( $location[ 'under-construction-menu' ] > 0 ) {
                            wp_nav_menu( array( 'theme_location' => 'under-construction-menu' ) );
                        }
                    ?>
                </nav>
            </div>    
            <p class="home-footer"> 
                <?php echo myTheme::cfg( 'copyright' ); ?>
            </p>
            <?php wp_footer(); ?>
        </div>
    </body>
</html>