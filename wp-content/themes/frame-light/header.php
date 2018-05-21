<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    global $fmr, $fmr_dditional, $fmr_dditional2, $fmr_bg_img;
    ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php
    global $fmr_myFrame_dditional;
    ?>
    <?php
    //Get background image
    $bg_img = get_theme_mod('background_image');
    if (!isset($fmr_bg_img{3}) && isset($bg_img{3})) $fmr_bg_img = esc_attr(get_theme_mod('background_image'));

    ?>
    <?php $all_options = wp_load_alloptions();
    foreach ($all_options as $key => $value) {
        if ($value == "ismegamenu" and strstr($key, "menu-item-")) {
            $id_megamenu[] = str_replace("menu-item-", "", $key);
        }
    }


    $fmr_myFrame_dditional .= " headstyle_classic";

    if (!get_theme_mod('fmr_top_header_left') && !get_theme_mod('fmr_top_header_right')) $fmr_myFrame_dditional .= " notopline";
    ?>
    <?php wp_head() ?>
</head>

<body <?php body_class("$fmr_myFrame_dditional,$fmr_dditional"); ?>>


<?php global $fmr_bg_img;

if (get_theme_mod('fmr_top_header_left') || get_theme_mod('fmr_top_header_right')) {
?>
<div class="top_mnu hidden-xs top_line">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <?php
                $allowed_html = array(
                    'a' => array('href' => array(), 'title' => array()),
                    'b' => array(),
                    'i' => array('class' => array()),
                    'br' => array(),
                    'strong' => array());
                echo wp_kses(get_theme_mod('fmr_top_header_left'), $allowed_html);
                ?>
                <div class="pull-right">
                    <?php $fmr_right_top = get_theme_mod('fmr_top_header_right', '[login]');
                    if (is_user_logged_in()) {
                        $fmr_link2login = "<a href='" . wp_logout_url() . "'>" . esc_html__('Logout', 'frame-light') . "</a>";
                    } else {
                        $fmr_link2login = "<a href='/auth/'>" . esc_html__('Login', 'frame-light') . "</a>";
                    }
                    $fmr_right_top = str_replace("[login]", $fmr_link2login, $fmr_right_top);
                    $allowed_html = array(
                        'a' => array('href' => array(), 'title' => array()),
                        'b' => array(),
                        'br' => array(),
                        'strong' => array());
                    echo wp_kses($fmr_right_top, $allowed_html);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
get_template_part("partials/header", "classic");
