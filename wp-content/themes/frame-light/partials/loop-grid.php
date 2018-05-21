<?php
global $fmr_class;

?>

<div class="col-sm-6 col-md-6 happy_full_padd">
    <div class="pg" <?php post_class(); ?>>

        <h1 class="grid_h1"><?php the_title() ?></h1>
        <?php

        $size = 'fmr_square408';
        $img = get_the_post_thumbnail_url(null, $size);
        if (isset($img{8})) { ?>
            <img src="<?php echo esc_url($img); ?>" class="img-responsive"
               height="490px"   width="100%" alt="<?php the_title(); ?>">
        <?php }
        ?>

        <div class="bleed hover-in">
            <div class="item_container" data-url="<?php the_permalink(); ?>">
                <div class="item">
                    <div class="hover-down">
                        <div class="happy_info">

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
            </div>
        </div>

    </div>
</div> 
