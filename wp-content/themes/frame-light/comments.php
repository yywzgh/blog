<?php

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */


global $fmr;

if (post_password_required()) {
    return;
}
?>
<div class="open_post_comments">
    <h4><?php esc_html_e('Comments', 'frame-light') ?> (<?php echo esc_attr(get_comments_number()); ?>):</h4>
    <?php
    /*
     * function to construct comments
     */
   /* wp_list_comments( array(
        'style'       => 'ol',
        'short_ping'  => true,
        'avatar_size' => 56,
    ) );/*/
  ?>
    <div class="reviews open">


        <?php
        if (have_comments()) : ?>
            <ol class="comment-list" style='padding:0'>

                <?php
                //show comments
            

                wp_list_comments( array(

                    'short_ping'  => true,
                    'avatar_size' => 56,
                    'callback' => 'fmr_mytheme_comment'
                ) )
                ?>
            </ol><!-- .comment-list -->
            <?php
        endif; // have_comments()

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'frame-light'); ?></p>
            <?php
            paginate_comments_links();
        endif; ?>
    </div>


    <div class="add_comment">
        <div class="write_comment">
            <div class="row">
                <?php
                //We get the option to comment form
                $req = get_option('require_name_email');
                $aria_req = ($req ? " aria-required='true'" : '');
                $html_req = ($req ? " required='required'" : '');
                $html5 = 'html5';
                $args = array(
                    'fields' => array(
                        'author' => '<div class="row"><div class="col-sm-6 col-md-6">' . '<label for="author"  class="enter_label" >' . esc_html__('Name', 'frame-light') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
                            '<input  class="e-mail_in" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . $html_req . ' /></div>',

                        'email' => '<div class="col-sm-6 col-md-6"><label for="email" class="enter_label">' . esc_html__('Email', 'frame-light') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
                            '<input class="e-mail_in" id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' />
					</div></div>',


                    ),
                    'comment_field' => '<div class="col-md-12"><label for="comment">' . esc_html__('Comment', 'frame-light') . '</label><textarea  class="e-mail_in" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
                    'comment_notes_after' => '',
                    'id_form' => 'commentform',
                    'id_submit' => 'submit',
                    'title_reply' => esc_html__('Write a comment:', 'frame-light'),
                    'title_reply_to' => esc_html__('Write a comment to %s', 'frame-light'),
                    'cancel_reply_link' => esc_html__('Cancel reply', 'frame-light'),
                    'label_submit' => esc_html__('Post Comment', 'frame-light'),
                    'class_submit' => 'submit', // class  submit.
                    'submit_button' => '<button name="%1$s" type="submit"  class="add_comment">' . esc_html__('Add comment' , 'frame-light') . '</button>
                    ', // format submit.
                    'submit_field' => '<div class="col-sm-3 col-md-3">%1$s %2$s</div>',
                    // Format button submit% 1s - button% 2s - hidden fields.
                );
                comment_form($args);
                ?>    </div>
        </div>
    </div>
</div><!-- .comments-area -->


