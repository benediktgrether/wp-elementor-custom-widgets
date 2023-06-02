<?php

/**
 * Plugin Name: Everyday Elementor Widgets
 * Description: Own Everyday Plugins 
 * Plugin URI: https://everyday.agency/
 * Author: Benedikt Grether
 * Version: 1.0.0
 * Author URI: https://benediktgrether.de
 *
 * Text Domain: everyday-elementor-widgets
 *
 */

/**
 * Elementor Widget Docs
 * https://developers.elementor.com/docs/widgets/
 */


// Security - Nobody can Access the Plugin directly
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Card Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_everyday_custom_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/card-widget.php');
    require_once(__DIR__ . '/widgets/grid-widget.php');

    $widgets_manager->register(new \Everyday_Elementor_Card_Widget());
    $widgets_manager->register(new \Everyday_Elementor_Grid_Widget());
}
add_action('elementor/widgets/register', 'register_everyday_custom_widget');


// Add own Category

function add_elementor_widget_categories($elements_manager)
{

    $elements_manager->add_category(
        'everyday',
        [
            'title' => esc_html__('Everyday Custom Widget', 'textdomain'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');
