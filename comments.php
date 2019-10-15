<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
    <hr>

		<h4 class="comments-title"><?php comments_number(__('Ingen kommentarer', 'your-text-domain'), __('1 kommentar', 'your-text-domain'), '% ' . __('kommentarer', 'your-text-domain') ); ?></h4>

    <span class="title-line"></span>
		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ul',
						'short_ping'  => true,
						'avatar_size' => 70,
            'callback' => 'theabech_comments'
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
	<?php endif; ?>

	<?php
    $comment_args = array(
      'class_submit' => 'btn btn-primary submit',
		  'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" required="required"></textarea></p>',
      'fields' => array(
			   'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> <input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
			   'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> <input id="email" name="email" class="form-control" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
			   'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> <input id="url" name="url" class="form-control" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
    ),
      'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
      'title_reply_after'  => '</h2>',
    );
		comment_form($comment_args);
		?>

</div><!-- .comments-area -->
