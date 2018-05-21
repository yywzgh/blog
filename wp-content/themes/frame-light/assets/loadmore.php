<?php

/*-----------------------Ajax paginate post cat------------------------------------------*/
$fmr_wp_infinitepaginate = "";
$GLOBALS['fmr_wp_infinitepaginate'] = "";
/**
 * @return categorias
 */
function fmr_wp_infinitepaginate()
{

    $set = get_theme_mod('fmr_site_Identity_modern', 's3');
    $paged = (int)sanitize_text_field($_POST['page_no']);
    $posts_per_page = (int)sanitize_text_field(get_option('posts_per_page'));
    
    if ($_POST['is_sticky'] == '1') {
        $ofset += 1;
    }



    $GLOBALS['fmr_new_arr'] = array(
        'paged' => $paged,
        'showposts' => $posts_per_page,
        'cat' => sanitize_text_field($_POST['cat']),
        'post_status' => 'publish',
        'post_type' => 'post');


    if (isset($_POST['year']) && !empty($_POST['year']))
        $GLOBALS['fmr_new_arr']['year'] = sanitize_text_field($_POST['year']);

    if (isset($_POST['monthnum']) && !empty($_POST['monthnum']))
        $GLOBALS['fmr_new_arr']['monthnum'] = sanitize_text_field($_POST['monthnum']);

    if (isset($_POST['day']) && !empty($_POST['day']))
        $GLOBALS['fmr_new_arr']['day'] = sanitize_text_field($_POST['day']);
    if (isset($_POST['s']) && !empty($_POST['s']))
        $GLOBALS['fmr_new_arr']['s'] = sanitize_text_field(($_POST['s']));




    $custom_query = new WP_Query($GLOBALS['fmr_new_arr']);
    if ($custom_query->have_posts()):
        while ($custom_query->have_posts()):
            $custom_query->the_post();         
                if ($set == 's1') get_template_part('partials/loop', 'classic');
                if ($set == 's2') get_template_part('partials/loop', 'masonry');
                if ($set == 's3') get_template_part('partials/loop', 'grid');           


        endwhile;
        wp_reset_postdata();
    endif;

    exit;
    die();
}

add_action('wp_ajax_fmr_infinite_scroll', 'fmr_wp_infinitepaginate'); // for logged in user
add_action('wp_ajax_nopriv_fmr_infinite_scroll', 'fmr_wp_infinitepaginate'); // if user not logged in


