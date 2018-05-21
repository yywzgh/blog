<?php

add_action('wp_enqueue_scripts', 'fmr_style_scripts', 500);
add_action('customize_controls_enqueue_scripts', 'fmr_adminjs');

function fmr_adminjs()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('fmr_admins', get_template_directory_uri() . '/js/admins.js', "",
        1, true);

}

function fmr_style_scripts()
{
    global $fmr_class, $wp_customize, $wp_query;

    /*
     * styles
     */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style('fmr_style_main', get_stylesheet_uri());
    wp_enqueue_style('animate', get_template_directory_uri() . "/css/animate.css");
    wp_enqueue_style('font-awesome', get_template_directory_uri() . "/css/font-awesome.min.css");
    wp_enqueue_style('fmr_media', get_template_directory_uri() . "/css/media.css");

    //   enqueue google_fonts
    wp_enqueue_style('fmr_fonts_google_Montserra', $fmr_class->fmr_google_fonts_url('Montserrat:400,700'));
    wp_enqueue_style('fmr_fonts_google_Ubuntu', $fmr_class->fmr_google_fonts_url('Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic'));


    if (is_user_logged_in() || isset($wp_customize)) {
        wp_enqueue_style('fmr_is_admin', get_template_directory_uri() .
            "/css/is_admin.css");


    } else {
        wp_enqueue_style('fmr_is_not_admin', get_template_directory_uri() .
            "/css/is_not_admin.css");
    }


    /*
     * script
     */

    //Geocoding google
    wp_enqueue_script('fmr_parallax_js', get_template_directory_uri() . "/js/parallax.min.js", array('jquery'), false, true);
    wp_enqueue_script('fmr_common_js', get_template_directory_uri() . "/js/common.js", array('jquery'), false, true);
    wp_enqueue_script('jquery_scroll', get_template_directory_uri() . "/js/SmoothScroll.js");
    wp_enqueue_script('query_autoresize', get_template_directory_uri() . "/js/autoresize.jquery.js");
    wp_enqueue_script('masonry');
    $cat = 0;
    $qc = get_query_var('cat');
    if (get_the_category() && !empty($qc)) {

        $fmr_category = get_category(get_query_var('cat'));
        $cat = $fmr_category->cat_ID;
    }

    $total = isset($wp_query->max_num_pages) ? esc_html($wp_query->max_num_pages) : 0;
    if (get_theme_mod('fmr_performance_ajax', true) == false)
        $total = 0;

    wp_localize_script('fmr_common_js', 'fmr_obj',
        array(
            'total' => $total,
            'year' => (isset($wp_query->query['year']{0})) ? esc_html(@$wp_query->query['year']) : '',
            'monthnum' => (isset($wp_query->query['monthnum']{0})) ? esc_html(@$wp_query->query['monthnum']) : '',
            'day' => (isset($wp_query->query['day']{0})) ? esc_html(@$wp_query->query['day']) : '',
            's' => esc_html(get_search_query()),
            'cat' => $cat,
            'get_set' => esc_html(get_theme_mod('fmr_site_Identity_modern'))

        ));

    if (is_singular()) wp_enqueue_script("comment-reply");


    if (current_user_can('administrator')) {
        wp_enqueue_script('fmr_admins', get_template_directory_uri() . '/js/admins.js', "",
            1, true);
    }

    $custom_css = "";


    $custom_css .= "
    body {
  /*  background: none !important;    */
    }
    .body_opacity {
            background: rgba(0,0,0,1);
        }
    ";


    if (is_single()) {
        $custom_css .= "#container {    margin-top: 150px;    ";
    }


    wp_add_inline_style('fmr_style', $custom_css);

    $custom_css2 = '';

    if ((is_front_page() || is_home() )&& get_theme_mod('fmr_home_effects_effect', false) == true) {

        $custom_css2 .= ".heading_blog header {
            background: rgba(0, 0, 0, 0.00);           
}";
    }

    wp_add_inline_style('fmr_style_main', $custom_css2);

}

