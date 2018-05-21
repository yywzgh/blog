<?php
global $fmr_class;
?>
<div class="col-sm-12 col-md-12 marg_b_20">
    <div class="happy_item">
        <div class="col-sm-4 col-md-4">
            <div class="h_img">
                <?php

                $size = 'fmr_square408';
                $img = get_the_post_thumbnail_url(null, $size);
                if (isset($img{8})) { ?>
                    <img src="<?php echo esc_url($img); ?>" class="img-responsive"
                         height="178" width="100%"  alt="<?php the_title(); ?>">
                <?php }
                ?>
                <a href="<?php the_permalink(); ?>" class="happy_like">
                    <i class="fa fa-thumbs-up"></i>

                </a>
                <div class="happy_f_block_hover">
                    <div class="plus-hover-content">
                        <i class="fa fa-plus fa-3x"></i>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-sm-8 col-md-8">
            <h4>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <p class="happy_like_p">
                <?php the_excerpt(); ?>
            </p>
            <div class="happy_comments clearfix">
                <a href="<?php the_permalink(); ?>">
                    <p>
                        <i class="fa fa-comments"></i>
                        <?php comments_number(); ?>
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
        