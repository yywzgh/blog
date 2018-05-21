<?php
global $fmr_class, $post, $wp_query;

?>
<div class="col-sm-12 col-md-12 marg_b_20">
    <div class="happy_item  <?php post_class(); ?>">


        <?php

        $size = 'fmr_square408';
        $img = get_the_post_thumbnail_url(null, $size);
        if (isset($img{8})) { ?>


            <div class="col-sm-4 col-md-4">
                <div class="h_img">
                    <img src="<?php echo esc_url($img); ?>" class="img-responsive"
                         height="178" width="100%" alt="<?php the_title(); ?>">

                    <div class="happy_f_block_hover">
                        <div class="plus-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>

                    </div>

                </div>
            </div>
        <?php }
        ?>
        <div class="
    <?php if (isset($img{8})) { ?>
        col-sm-8
        <?php } else { ?>
           col-sm-12
    <?php } ?>
        col-md-8 happy-inline">
            <h4>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>

            <?php the_excerpt(); ?>

            <div class="happy_comments clearfix">
                <a href="<?php the_permalink(); ?>">

                    <i class="fa fa-comments"></i>
                    <?php comments_number(); ?>

                </a>
            </div>
        </div>
    </div>
</div>
