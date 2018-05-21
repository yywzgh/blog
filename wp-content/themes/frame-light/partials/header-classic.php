<?php
global $fmr_bg_img, $fmr_class;
//Get background image

$paralax = "";
$background_image = get_theme_mod('background_image');
if (!isset($fmr_bg_img{3}) && isset($background_image{3})) $fmr_bg_img = esc_attr($background_image);


$header_image = get_header_image();
$paralax = (isset($header_image{5})) ? $header_image : '';


?>

<!-- header -->
<div class="heading_blog parallax-window" data-image="<?php echo esc_url($paralax); ?>">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 clearfix map_header">
                    <a href="#" class="menu_xs hidden-md hidden-sm hidden-lg   ">
                        <i class="fa fa-bars fa-2x"></i>
                    </a>

                    <?php

                    if (get_theme_mod('header_textcolor') != 'blank' && get_theme_mod('custom_logo') == ''): ?>
                        <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                        <span class="dating">
                            <?php echo esc_html(get_bloginfo("name")); ?>
                        </span>

                        </a>
                        <?php
                    endif;
                    the_custom_logo();

                    $fmrs = array(
                        'container' => 'div',
                        'container_class' => '',
                        'theme_location' => 'fmr_header-menu1',
                        'menu' => '',
                        'container_id' => '',
                        'menu_class' => 'navigate head_nav',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s primary-nav  navigate pull-right">%3$s</ul>',
                        'depth' => 0,
                        'walker' => new fmr_top_menu_walker()
                    );


                    if (get_current_user_id() && has_nav_menu("fmr_header-logedin")) {
                        $fmrs['theme_location'] = "fmr_header-logedin";
                        wp_nav_menu($fmrs);
                    } else if (has_nav_menu('fmr_header-menu1')) {
                        wp_nav_menu($fmrs);
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <!--  bg_fon -->
    <?php
    // special class
    $classe = "";

    if (isset($post->post_type) && !in_array($post->post_type, array("post", "page"))) $classe = "open_items_fon";
    ?>

    <div class="bg_fon <?php echo esc_attr($classe); ?>">
        <canvas>
        </canvas>
        <div id="top_cont" class="container">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <div class="nav_a_l">
                        <div class="sing_title">
                            <?php
                            if (is_single() || is_page()) {
                                the_title();
                            }
                            if ((is_front_page() || is_home()) && get_theme_mod('fmr_home_effects_effect', false) == false) {
                                echo esc_html(get_bloginfo('description'));
                            }
                            if (isset($_GET['s']{0})) {
                                printf(esc_html(esc_html__('Search Results for: %s', 'silvana')), get_search_query());
                            }
                            ?>
                        </div><?php
                        if ((is_home() || is_front_page()) && get_theme_mod('fmr_home_effects_effect', false) == true) {
                            ?>
                            <h1 id="home_title"><?php  echo esc_html(get_theme_mod('fmr_home_effects_title')); ?></h1>

                            <div class="decription">
                                <?php echo esc_html(get_theme_mod('fmr_home_effects_des')); ?>
                            </div>

                            <?php
                            $button_text = get_theme_mod('fmr_home_effects_btn_t');
                            if (isset($button_text{0})):
                                ?>
                                <a href="<?php echo esc_url(get_theme_mod('fmr_home_effects_btn_url')); ?>"
                                   class="sub_obj_edit">
                                    <?php echo esc_html(get_theme_mod('fmr_home_effects_btn_t')); ?>
                                </a>
                                <?php
                            endif;

                        } ?>
                    </div>
                    <?php

                    if (!isset($fmr_bread{50})) {
                        ?>
                        <div class="nav_a_r pull-right hidden-xs">
                            <div class="searchform search_input">
                                <form action="<?php echo esc_url(get_home_url('/')); ?>" method="get">
                                    <input type='text' class='search_input_in' name='s'
                                           placeholder="<?php esc_html_e("Search", 'frame-light'); ?>" value=''>

                                    <button type='submit' class='search_input_button'>
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                            <ul>
                                <li>
                                    <a href="#" class="search-click">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>


                            </ul>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog_xs text-center">
        <a href="#" class="hidden-md hidden-sm hidden-lg">
            <i class="fa fa-bars fa-2x"></i>
            <span><?php esc_html_e("Category", 'frame-light'); ?></span>
        </a>
    </div>
</div>