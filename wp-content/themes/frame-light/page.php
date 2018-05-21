<?php
get_header();
global $fmr_class;
?>
    <div class="middle_content page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <?php if (have_posts()) : while (have_posts()) :
                    the_post(); ?>
                   
                      
                        <div class="post_text" <?php post_class(); ?>>
                            <?php the_content(); ?>
                        </div>
                    <?php
                    if (comments_open() || get_comments_number()) :
                        echo '<div class="post_content">';
                        comments_template();
                        echo '</div>';
                    endif;
                    ?>
                  
                </div>
            <?php endwhile; ?>
            <?php
            endif;
            ?>
			</div>
		</div>
    </div>

<?php
get_footer();
?>