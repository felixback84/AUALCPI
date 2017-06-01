<?php/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen-custom
 * @since Twenty Thirteen 1.0
 */
?>
<div id="bloqueComentarios">
    <?php if ( have_comments() ) : ?>
        <ul>
            <?php
                wp_list_comments( array(
                    'style'       => 'li',
                    'short_ping'  => true,
                    'avatar_size' => 50,
                    'per_page' => 10,
                ) );
            ?>
        </ul>
 
        <?php
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
	        <nav class="navigation comment-navigation" role="navigation">
	            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
	            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
	            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
	        </nav>
        <?php endif; ?>
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        	<p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
        <?php endif; ?>
    <?php endif;  ?>
    <?php comment_form(); ?>
</div>