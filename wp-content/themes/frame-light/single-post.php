<?php
get_header();
global $fmr_class;
?>
    <div class="middle_content">
        <div class="container">
            <div class="row">


                <?php get_template_part('partials/category', 'sidebar'); ?>

                <?php
                $class = (get_theme_mod('fmr_home_effects_sidebar', 's2') == 's2') ? 'col-md-9' : 'col-md-12';
                ?>
                <div class="col-sm-12 <?php echo esc_attr($class); ?>">
                    <?php if (have_posts()) : while (have_posts()) :
                    the_post(); ?>
                    <div class="open_post">
                       
                        <ul class="post_inf">
                            <?php
                            $posttags = get_the_tags();
                            if ($posttags) { ?>
                                <li>
                                    <i class="fa fa-bookmark-o"></i>
                                    <?php $categories = get_the_category();
                                    $separator = ', ';
                                    $output = '';
                                    if ($categories) {
                                        foreach ($categories as $category) {
                                            $output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf("%s", $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
                                        }
                                        echo trim($output, $separator);
                                    }
                                    ?>
                                </li>
                                <?php
                            }
                            ?>
                            <li>
                                <i class="fa fa-comments"></i>
                                <a href="<?php echo esc_url(get_the_permalink() . '/#respond'); ?>"> <?php comments_number(); ?></a>
                            </li>
                            <li>
                                <i class="fa fa-calendar"></i>
                                <a href="<?php echo esc_url(get_day_link(get_the_date("Y"), get_the_date("m"), get_the_date("d"))); ?>">
                                    <?php echo esc_attr(get_the_date("d.m.Y")); ?>
                                </a>
                            </li>
                        </ul>
                        <?php
                        $img = $fmr_class->fmr_get_post_thumbnail_no_bf($post->ID);
                        if (isset($img{5})):
                            ?>
                            <img src="<?php echo esc_url($fmr_class->fmr_get_post_thumbnail_no_bf($post->ID)); ?>"
                                 class="img-responsive" height="267" width="825" alt="">
                        <?php endif; ?>
                        <div class="post_text" <?php post_class(); ?>>
                            <?php the_content(); ?>
                        </div>
                        <?php
                        $desc = get_the_author_meta('description');
                        if (isset($desc{1})) {
                            ?>
                            <div class="one_comment clearfix">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-2 col-md-2">
                                        <?php
                                        $my_post = get_post(get_the_ID());  // $id - ID Post
                                        $fmr_class->fmr_get_url_img_avatar($my_post->post_author, 128, 128);
                                        ?>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-8 col-md-10 col-md-offset-0">
                                        <h4><?php the_author(); ?> </h4>
                                        <p>
                                            <?php echo esc_html($desc); ?>
                                        </p>
                                        <?php posts_nav_link();
                                        wp_link_pages();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <div class="post-pagination">

                       <?php   wp_link_pages(); ?>

                        </div>
                            <?php
                        if (comments_open() || get_comments_number()) :
                            echo '<div class="post_content">';
                            comments_template();
                            echo '</div>';
                        endif;
                        ?>

                    </div>
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