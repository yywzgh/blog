<?php

/**
 * Class fmr base theme class
 */
class fmr_class
{

    public function __construct()
    {
        // Include required files
        $this->includes();
        //theme support
        $this->theme_support_setting();
        /**
         * Hooks
         */
        add_action('init', array($this, 'fmr_register_my_menus_2'), 500);
        add_action('widgets_init', array($this, 'fmr_arphabet_widgets_init'));
        add_action('after_setup_theme', array($this, 'fmr_register_my_menusp'));
        add_action('wp_head', array($this, 'fmr_add_js_vars'));
        /*
         * Filter
         */

        add_filter('body_class', array($this, 'fmr_add_body_class'));
        add_filter('get_custom_logo', array($this, 'fmr_get_custom_logo'));


    }

    function includes()
    {

        require get_template_directory() . '/assets/menu.php';
        require get_template_directory() . '/assets/customizer.php';
        require get_template_directory() . '/assets/style_scripts.php';


        //ajax

        require get_template_directory() . '/assets/fa.php';
        require get_template_directory() . '/assets/loadmore.php';
        //main css

    }

    function theme_support_setting()
    {
        add_theme_support('custom-background');
        add_theme_support("title-tag");
        add_theme_support('automatic-feed-links');
        add_theme_support("custom-header", array());
        add_theme_support('post-thumbnails');
        add_post_type_support('item', array('comments'));
        add_image_size("fmr_panorama", 1111, 400, true);
        add_image_size("fmr_square408", 395, 408, true);
        set_post_thumbnail_size(1111, 400, true);
    }

    /***********************************
     * start
     ************************************/
    function fmr_arphabet_widgets_init()
    {
        register_sidebar(array(
            'name' => esc_html__('Left menu area', 'frame-light'),
            'id' => 'fmr_left_menu_widget',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer area', 'frame-light'),
            'id' => 'fmr_footer',
            'before_widget' => '<div class="col-md-3">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        ));
    }

    /***********************************
     * Hooks
     ************************************/


    function fmr_register_my_menus_2()
    {
        wp_deregister_style('custom-background-css');
        register_nav_menus(array('fmr_header-menu1' => esc_html__('Global header menu', 'frame-light'),

            'fmr_header-logedin' => esc_html__('Loggedin header menu', 'frame-light')));
    }


    function fmr_add_js_vars()
    {
        global $wp_query;
        ?>
        <meta name="fragment" content="!"/>
        <script type="text/javascript">
            "use strict";
            var fmr_ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
            var fmr_gpid = '<?php echo intval($wp_query->get_queried_object_id()); ?>';
            var fmr_cpage = '<?php echo esc_js(get_query_var('cpage')); ?>';
            var templateUrl = '<?php echo esc_url(get_template_directory_uri()); ?>';
            var pluginsUrl = '<?php echo esc_url(plugins_url()); ?>';

        </script>
        <?php
    }


    /***********************************
     * filters
     ************************************/


    function fmr_register_my_menusp()
    {
        load_theme_textdomain('frame-light', get_template_directory() . '/languages');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
    }

    function fmr_add_body_class($classes)
    {

        global $post;

        if (isset($post)) {
            $classes[] = $post->post_type . '-' . $post->post_name;
        }
        if ((is_home() || is_front_page()) && get_theme_mod('fmr_home_effects_effect', false) == true) {
            $classes[] = 'fmr_home_page';
        }

        return sanitize_html_class($classes);
    }



    /************************************************************
     *                          Metods
     ************************************************************/
    /***
     * @param $theid
     * @param int $widht
     * @param int $height
     */
    function fmr_get_post_thumbnail($theid, $widht = 269, $height = 339, $big_src = false)
    {

        $thumbnail = get_the_post_thumbnail($theid, 'full');

        preg_match_all('#src="(.*?)"#si', $thumbnail, $thumb_url);

        $thumb = "";
        if (isset($thumb_url[1][0])) {
            $thumb = esc_url($thumb_url[1][0]);
        }
        if ($big_src) {
            echo esc_url($thumb);
        } else {
            if (function_exists('mr_image_resize')) {
                echo esc_url(mr_image_resize($thumb, $widht, $height));
            } else {
                echo esc_url($thumb);
            }

        }


    }

    function fmr_get_post_thumbnail_no_bf($theid)
    {

        $thumbnail = get_the_post_thumbnail($theid, 'full');

        preg_match_all('#src="(.*?)"#si', $thumbnail, $thumb_url);

        $thumb = "";

        if (isset($thumb_url[1][0]))
            $thumb = esc_url($thumb_url[1][0]);

        return $thumb;

    }

 

    /**
     * Prepares correct the url to google font
     * @param $fonts_param
     * @return string url google fonts
     */
    function fmr_google_fonts_url($fonts_param)
    {
        $font_url = '';
        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Google font: on or off', 'frame-light')) {
            $font_url = add_query_arg('family', urlencode($fonts_param), "//fonts.googleapis.com/css");
        }
        $font_url = str_replace('%2B', '+', $font_url);
        return $font_url;
    }

    /*get_avatar_url*/

    function fmr_get_url_img_avatar($user_ID, $width = 128, $height = 128, $class = "", $return = false)
    {

        preg_match("/src=(.*?) /i", get_avatar($user_ID, 120), $matches);

        if (function_exists('mr_image_resize')) {
            $img_url = mr_image_resize(substr(trim($matches[1]), $width, $height, true));

        } else {
            $img_url = substr(trim($matches[1]));
        }
        if ($return) {
            return esc_url($img_url);
        } else {
            echo '<img src="' . esc_url($img_url) . '" class="' . esc_attr($class) . '" height="' . esc_attr($height) . '" width="' . esc_attr($width) . '" alt="">';
        }
    }

    function fmr_get_custom_logo($html)
    {
        $html = str_replace('custom-logo', 'header_logo', $html);
        $html = preg_replace('#width".*?"#', '', $html);
        return $html;

    }

}

$GLOBALS['fmr_class'] = new fmr_class();


function fmr_get_permalink_by_template($template, $pageid = null)
{
    $pgs = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template
    ));
    if (!isset($pgs[0]->ID)) return false;
    if ($pageid == null) return esc_url(get_permalink($pgs[0]->ID));
    if ('' != get_option('permalink_structure')) {
        // using pretty permalinks, append to url
        return user_trailingslashit(esc_url(get_permalink($pgs[0]->ID)) . $pageid); // www.example.com/pagename/test
    } else {
        return add_query_arg('page', $pageid, esc_url(get_permalink($pgs[0]->ID)));
    }


}



/**
 * @param $comment
 * @param $args
 * @param $depth
 */
function fmr_mytheme_comment($comment, $args, $depth)
{
    $user = get_user_by("email", $comment->comment_author_email);
    ?>
    <div class="post   <?php if ($depth > 1): ?> out_bg_comments  <?php endif; ?>  ">
        <div class="row">
            <div class="
                <?php
            //check if there have parents comment
            if ($depth > 1) { ?>  ol-sm-1 col-sm-offset-1 col-md-1 col-md-offset-1
                     <?php } else { ?> col-sm-1 col-md-1 <?php } ?> ">
                <div class="user_prof">
                    <?php if (function_exists("get_avatar")) echo get_avatar($comment, 70); ?>
                </div>
            </div>
            <div class="col-sm-11 col-md-10">
                <div class="comment_block">
                    <p class="user_name">
                        <?php comment_author();
                        ?>
                        <span><?php echo esc_html(get_comment_date()); ?></span>
                    </p>

                    <p class="comment_block_p">
                        <?php comment_text(); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

if (!isset($content_width)) {
    $content_width = 1170;
}