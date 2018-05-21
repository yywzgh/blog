<?php get_header(); ?>
    <div class="middle_content">
        <div class="container">
            <div class="row">
                <?php
                get_template_part('partials/category', 'sidebar');

                ?>
                <?php
                $class = (get_theme_mod('fmr_home_effects_sidebar', 's2') == 's2') ? 'col-md-9' : 'col-md-12';
                ?>
                <div class="<?php echo esc_attr($class); ?>">
                    <div class="row">
                        <div class="happy">
                            <div class="happy_items clearfix">


                                <?php
                                $set = get_theme_mod('fmr_site_Identity_modern', 's3');
                                if (isset($_GET['showas'])) {
                                    if ($_GET['showas'] == 'list')
                                        $set = 's1';

                                    if ($_GET['showas'] == 'masonry')
                                        $set = 's2';

                                    if ($_GET['showas'] == 'grid')
                                        $set = 's3';

                                }

                                if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        if ($set == 's1') get_template_part('partials/loop', 'classic');
                                        if ($set == 's2') get_template_part('partials/loop', 'masonry');
                                        if ($set == 's3') get_template_part('partials/loop', 'grid');
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>

                            </div>
                        </div>
                        <?php
                        if (get_theme_mod('fmr_performance_ajax', true) == false)
                            the_posts_navigation();

                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

<?php


get_footer();