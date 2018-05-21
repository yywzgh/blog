<?php
global $fmr_class;

?>

<div class="hh-item hh-item_masonry" <?php post_class(); ?>>

    <div class="happy_item">
        <?php
        $pt = get_the_post_thumbnail();
        if ( isset($pt{5})) { ?>


            <div class="h_img">
                <?php

                $size = 'fmr_square408';
                $img = get_the_post_thumbnail_url(null, $size);
                if (isset($img{8})) { ?>
                    <img src="<?php echo esc_url($img); ?>" class="img-responsive"
                         height="490px"   width="100%" alt="<?php the_title(); ?>">
                <?php }
                ?>
                <div class="happy_f_block_hover">
                    <div class="plus-hover-content">
                        <i class="fa fa-eye fa-3x"></i><span></span>
                    </div>

                </div>
            </div>
            <?php
        } ?>
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
