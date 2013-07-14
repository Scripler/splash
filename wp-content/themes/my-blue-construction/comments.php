<?php
function my_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment -> comment_type ) {
        case '' : {
            echo '<li '; comment_class(); echo' id="li-comment-'; comment_ID(); echo '">';
            echo '<div id="comment-'; comment_ID(); echo '" class="comment-box">';

            echo '<div class="comment-gravatar">';
            echo myTheme::gravatar( $comment, 60 );
            echo '<span class="comment-arrow"></span>';
            echo '</div>';

            echo '<div class="comment-body">';
            echo '<header>';
            echo '<cite>';
            echo get_comment_author_link( $comment -> comment_ID );
            echo '</cite>';
            echo '<time class="comment-time">';
            printf( '%1$s ' , get_comment_date() );
            echo '</time>';
            echo '<div class="clearfix"></div>';
            echo '</header>';

            echo '<p class="comment-quote">';
            if ( $comment -> comment_approved == '0' ) {
                echo '<em class="comment-awaiting-moderation">';
                _e( 'Your comment is awaiting moderation.' , 'myTheme' );
                echo '</em>';
            }

            $order   = array( "\r\n" , "\n" , "\r" );
            $replace = '<br />';	
            echo str_replace( $order , $replace , get_comment_text() );            
            echo '</p>';

            echo '<span class="comment-replay">';
            comment_reply_link(  array_merge(  $args , array( 
                'depth' => $depth, 
                'max_depth' => $args['max_depth'] 
            )));
            echo '</span>';
            echo '</div>';
            echo '</li>';
            break;
        }	
        case 'pingback'  :{
        }
        case 'trackback' : {
            break;
        }
    }
}

if( comments_open() ){

    if( is_user_logged_in() ){
        echo '<div id="comments" class="comments-list user-logged-in">';
    }
    else{
        echo '<div id="comments" class="comments-list">';
    }
    
    /* WORDPRESS COMMENTS PASSWORD REQUIRED */
    if ( post_password_required() ) {
        echo '<p class="nopassword">';
        _e( 'This post is password protected. Enter the password to view any comments.' , 'mythemes' );
        echo '</p>';
        echo '</div>';
        return;
    }

    /* IF EXISTS WORDPRESS COMMENTS */
    if ( have_comments() ) {
        echo '<h3>';
        
        if( count( get_comments( array( 'type' => 'comment' , 'post_id' => $post -> ID ) ) ) == 1 ) {
            _e( 'Comment' , 'mythemes' );
        }else{
            _e( 'Comments' , 'mythemes' );
        } 
        echo ' ( <strong>' . count( get_comments( array( 'type' => 'comment' , 'post_id' => $post -> ID ) ) ). '</strong> )'; 
        echo '</h3>';
		
		echo '<ol>';
        wp_list_comments( array( 'callback' => 'my_comment' , 'type' =>  'comment' ) );
		echo '</ol>';
        
        /* WORDPRESS PAGINATION FOR COMMENTS */
        echo '<div class="comments-pagination">';
        paginate_comments_links();
        echo '</div>';
    }
	
    /* FORM SUBMIT COMMENTS */
    $commenter = wp_get_current_commenter();

    /* CHECK VALUES */
    if( esc_attr( $commenter[ 'comment_author' ] ) )
        $name = esc_attr( $commenter[ 'comment_author' ] );
    else
        $name = __( 'Nickname ( required )' , 'mythemes' );

    if( esc_attr( $commenter[ 'comment_author_email' ] ) )
        $email = esc_attr( $commenter[ 'comment_author_email' ] );
    else
        $email = __( 'E-mail ( required )' , 'mythemes' );

    if( esc_attr( $commenter[ 'comment_author_url' ] ) )
        $web = esc_attr( $commenter[ 'comment_author_url' ] );
    else
        $web = __( 'Website' , 'mythemes' );

    /* FIELDS */
    $fields =  array(
        'author' => '<div class="field">'.
                '<div class="inputs">'.
                '<p class="comment-form-author input">'.
                '<input class="required" value="' . $name . '" onfocus="if (this.value == \'' . __( 'Nickname ( required )' , 'mythemes' ). '\') {this.value = \'\';}" onblur="if (this.value == \'\' ) { this.value = \'' . __( 'Nickname ( required )' , 'mythemes' ) . '\';}" id="author" name="author" type="text" size="30"  />' .
            '</p>',
        'email'  => '<p class="comment-form-email input">'.
                '<input class="required" value="' . $email . '" onfocus="if (this.value == \'' . __( 'E-mail ( required )' , 'mythemes' ). '\') {this.value = \'\';}" onblur="if (this.value == \'\' ) { this.value = \'' . __( 'E-mail ( required )' , 'mythemes' ) . '\';}" id="email" name="email" type="text" size="30" />' .
            '</p>',
        'url'    => '<p class="comment-form-url input">'.
                '<input value="' . $web . '" onfocus="if (this.value == \'' . __( 'Website' , 'mythemes' ). '\') {this.value = \'\';}" onblur="if (this.value == \'\' ) { this.value = \'' . __( 'Website' , 'mythemes' ). '\';}" id="url" name="url" type="text" size="30" />' .
            '</p></div>',
    );
    
    if( is_user_logged_in() ){
        $rett  = '<div class="comment-form-comment textarea user-logged-in">';
        $rett .= '<div class="comment-gravatar">';
        $rett .= myTheme::gravatar( wp_get_current_user() -> user_email , 60 );
        $rett .= '<span class="comment-arrow"></span>';
        $rett .= '</div>';
        $rett .= '<textarea id="comment" name="comment" cols="45" rows="4" aria-required="true"></textarea>';
        $rett .= '</div>';
    }else{
        $rett  = '<div class="textarea"><p class="comment-form-comment textarea user-not-logged-in">';
        $rett .= '<textarea id="comment" name="comment" cols="45" rows="10" aria-required="true"></textarea>';
        $rett .= '</p></div><div class="clearfix"></div></div>';
    }

    $args = array(	
        'title_reply' => __( "Leave a reply" , 'mythemes' ),
        'comment_notes_after'   => '',
        'comment_notes_before'  => '<p class="comment-notes">' . __( 'Your email address will not be published.' , 'mythemes' ) . '</p>',
        'logged_in_as'          => '<p class="logged-in-as">' . __( 'Logged in as' , 'mythemes' ) . ' <a href="' . home_url('/wp-admin/profile.php') . '">' . get_the_author_meta( 'nickname' , get_current_user_id() ) . '</a>. <a href="' . wp_logout_url( get_permalink( $post -> ID ) ) .'" title="' . __( 'Log out of this account' , 'mythemes' ) . '">' . __( 'Log out?' , 'mythemes' ) . ' </a></p>',		
        'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field'         => $rett,
        'label_submit'          => __( 'Submit Comment' , 'mythemes' )
    );

    comment_form( $args );
    echo '<div class="clearfix"></div>';
    echo '</div>';
}