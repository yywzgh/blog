<?php

class fmr_top_menu_walker extends Walker_Nav_Menu
{

    public $title, $count;


    /**
     * add classes to ul sub-menus
     *
     * @param $output
     * @param int $depth
     * @param array $args
     */
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        // depth dependent classes
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent
        $display_depth = ($depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ($display_depth % 2 ? 'menu-odd' : 'menu-even'),
            ($display_depth >= 2 ? 'sub-sub-menu' : ''),
            'menu-depth-' . $display_depth);
        $class_names = implode(' ', $classes);
        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    /**
     * add main/sub classes to li's and links
     *
     * @param $output
     * @param $item
     * @param int $depth
     * @param array $args
     * @param int $id
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $item_output = "";
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent
        // depth dependent classes
        $depth_classes = array(
            ($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
            ($depth >= 2 ? 'sub-sub-menu-item' : ''),
            ($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
            'menu-item-depth-' . $depth);
        $depth_class_names = esc_attr(implode(' ', $depth_classes));
        // passed classes
        $classes = empty($item->classes) ? array() : (array )$item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class',
            array_filter($classes), $item)));

        // build html
        $active_class = "";
        if (urldecode($item->url) ==  get_the_permalink()) {
            $active_class = " active";
        }
        $output .= $indent . '<li id="nav-menu-item-' . esc_attr($item->ID) .
            '" class="' . esc_attr($class_names) . $active_class . '">';


        // link attributes
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->
            attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) .
            '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
        $title = esc_attr($args->link_before . apply_filters('the_title', $item->title,
                $item->ID));
        preg_match_all("#\[fa(.*?)\]#", $title, $arr);
        if (isset($arr[1][0])) {
            $title = str_replace("[fa" . $arr[1][0] . "]", '<i class="fa fa' . $arr[1][0] .
                '"></i>', $title);
        }
        $item_output .= '<a  ' . $attributes . '>';
        $item_output .= $title;
        $item_output .= '</a>';
        $item_output .= $args->after;
        // build html
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth,
            $args, $id);
    }
}

?>