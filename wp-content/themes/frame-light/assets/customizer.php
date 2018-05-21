<?php
/**
 * Adds sections and settings to customizer
 * @param $wp_customize
 */
function fmr_true_customizer_init($wp_customize)
{





    /*--------------------------------------------------- performance----------------------*/
    $tmp_sectionname = "fmr_performance";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' =>esc_html__('performance', 'frame-light'),
        'priority' => 31,
        'description' => ''));
    $tmp_settingname = $tmp_sectionname . '_paralax_hidde';
    $wp_customize->add_setting($tmp_settingname, array('default' => false,
        'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Paralax hide?', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'checkbox'));

    $tmp_settingname = $tmp_sectionname . '_ajax';
    $wp_customize->add_setting($tmp_settingname, array('default' => true,
        'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>  esc_html__(' Enable ajax load post?', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'checkbox'));
    /*--------------------------------------------------
     *  home eefect
     * -----------------------------------------------
     */

    $tmp_sectionname = "fmr_home_effects";

    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' =>esc_html__('Home effects ', 'frame-light'),
        'priority' => 31,
        'description' => ''));


    $tmp_settingname = $tmp_sectionname . '_effect';
    $wp_customize->add_setting($tmp_settingname, array('default' => false,
        'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Show effect on home?', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'checkbox',
    ));




    $tmp_settingname = $tmp_sectionname . '_title';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_attr'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Title', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));


    $tmp_settingname = $tmp_sectionname . '_des';
    $wp_customize->add_setting($tmp_settingname, array('default' =>'',
        'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control('Shortcode_for_comments', array(
        'label' =>esc_html__('Description', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'type' => 'textarea',
        'settings' => $tmp_settingname));


    $tmp_settingname = $tmp_sectionname . '_btn_t';
    $wp_customize->add_setting($tmp_settingname, array('default' =>'',
        'sanitize_callback' => 'esc_attr'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('button text', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));

    $tmp_settingname = $tmp_sectionname . '_btn_url';
    $wp_customize->add_setting($tmp_settingname, array('default' =>'',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('button url', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));

    /*---------------------------------------------------Single post----------------------*/

 

    $tmp_settingname = $tmp_sectionname . '_sidebar';
    $wp_customize->add_setting($tmp_settingname, array('default' => 's2',
        'sanitize_callback' => 'sanitize_text_field'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>  esc_html__('layout', 'frame-light'),
        'section' => 'title_tagline',
        'settings' => $tmp_settingname,
        'type' => 'select',
        'choices' => array(
            's1' => '1 column',
            's2' => '2 column show sidebar'
        )));


    /*-----------------------------social networks---------------------------*/
    $tmp_sectionname = "fmr_social_networks";
    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' =>esc_html__('social networks', 'frame-light'),
        'priority' => 31,
        'description' =>esc_html__('Enter url desired social networks so that they appear on the site', 'frame-light')));
    /*Google */
    $tmp_settingname = $tmp_sectionname . '_control_google';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Google + url', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));
    /*VK*/
    $tmp_settingname = $tmp_sectionname . '_control_VK';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('VK url', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));
    /*facebook*/
    $tmp_settingname = $tmp_sectionname . '_control_facebook';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Facebook  url', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));
    /*instagram*/
    $tmp_settingname = $tmp_sectionname . '_control_instagram';

    /*twitter*/
    $tmp_settingname = $tmp_sectionname . '_control_twitter';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Twitter url', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));


    /*mail ru*/
    $tmp_settingname = $tmp_sectionname . '_control_mail_ru';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('mail ru', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));


    /*youtube*/
    $tmp_settingname = $tmp_sectionname . '_control_youtube';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('www.youtube.com', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));


    /*Blogger*/
    $tmp_settingname = $tmp_sectionname . '_control_blogger';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Blogger', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));

    /*ok*/
    $tmp_settingname = $tmp_sectionname . '_control_ok';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('OK', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));


    /********dribbble*************/
    $tmp_settingname = $tmp_sectionname . '_control_dribbble';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Dribbble', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));

    /********rutube*************/
    $tmp_settingname = $tmp_sectionname . '_control_rutube';
    $wp_customize->add_setting($tmp_settingname, array('default' => '',
        'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Rutubee', 'frame-light'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text'));


    /*-----------------------------Site Identity---------------------------*/
    $tmp_sectionname = "fmr_site_Identity";

    $wp_customize->add_section($tmp_sectionname . '_section_m', array(
        'title' =>esc_html__('Site Identity', 'frame-light'),
        'priority' => 31,
        'description' => ''));
    $tmp_settingname = $tmp_sectionname . '_modern';
    $wp_customize->add_setting($tmp_settingname, array('default' => 's3',
        'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Post category style', 'frame-light'),
        'section' => 'title_tagline',
        'settings' => $tmp_settingname,
        'type' => 'select',
        'choices' => array(
            's1' => 'Classic',
            's2' => 'Masonry',
            's3' => 'Grid',
        )));

    $tmp_settingname = $tmp_sectionname . '_single_hide_cat';
    $wp_customize->add_setting($tmp_settingname, array('default' => false,
        'sanitize_callback' => 'wp_validate_boolean'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' =>esc_html__('Hide categories', 'frame-light'),
        'section' => 'title_tagline',
        'settings' => $tmp_settingname,
        'type' => 'checkbox',
    ));


    /*-------------------------------top header ------------------------------*/
    //add_section
    $wp_customize->add_section('fmr_top_header', array(
        'title' =>esc_html__('Head', 'frame-light'),
        'description' => '',
        'priority' => 20,
    ));
    //add setting
    $wp_customize->add_setting('fmr_top_header_left', array('default' => "",
        'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_setting('fmr_top_header_right', array('default' => "",
        'sanitize_callback' => 'wp_kses_post'));
    //add control
    $wp_customize->add_control('ok_video_url1', array(
        'label' =>esc_html__('Topline left', 'frame-light'),
        'section' => 'fmr_top_header',
        'type' => 'textarea',
        'settings' => 'fmr_top_header_left'));
    $wp_customize->add_control('Top_header_right', array(
        'label' =>esc_html__('Topline right', 'frame-light'),
        'section' => 'fmr_top_header',
        'type' => 'textarea',
        'settings' => 'fmr_top_header_right'));




}




add_action('customize_register', 'fmr_true_customizer_init');
?>