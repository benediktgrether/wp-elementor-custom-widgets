<?php
// Security - Nobody can Access the Widget directly
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Widget class
class Everyday_Elementor_Grid_Widget extends \Elementor\Widget_Base
{

    // Widget-Identifikator
    public function get_name()
    {
        return 'grid';
    }

    // Widget-Titel
    public function get_title()
    {
        return __('Mein benutzerdefiniertes Grid', 'text-domain');
    }

    // Widget-Icon (optional)
    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    // Widget-Kategorien
    public function get_categories()
    {
        return ['everyday'];
    }

    // Widget-Code
    protected function render()
    {
        $settings = $this->get_settings();

        $wrapper_class = isset($settings['wrapper_class']) ? $settings['wrapper_class'] : '';

        $items = isset($settings['items']) ? $settings['items'] : [];
        // wp_enqueue_style('my-custom-grid-widget', plugin_dir_url(__FILE__) . 'css/my-custom-grid-widget.css');

        $plugin_url = plugin_dir_url(__FILE__); // Plugin-URL holen
        wp_enqueue_style('my-custom-grid-widget-css', $plugin_url . 'css/my-custom-grid-widget.css'); // Externe CSS-Datei einbinden


?>

        <div class="row <?php echo esc_attr($wrapper_class); ?>">
            <?php foreach ($items as $item) : ?>
                <div class="column-home">
                    <div class="box-hover">
                        <div class="pulse-button"></div>
                        <div class="overlay-hover"></div>
                        <?php if (!empty($item['image']['url'])) : ?>
                            <img class="img-grid" src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['image']['alt']); ?>">
                        <?php endif; ?>
                        <div class="top-text-hover">
                            <p class="grid-title"><?php echo esc_html($item['title']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
<?php
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Grid Items', 'text-domain'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'text-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Grid Item', 'text-domain'),
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => __('Grid Items', 'text-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'title' => __('Grid Item 1', 'text-domain'),
                    ]
                ],
            ]
        );

        $this->add_control(
            'wrapper_class',
            [
                'label' => __('Wrapper Class', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => __('Enter the CSS class for the wrapper', 'text-domain'),
            ]
        );

        $this->end_controls_section();
    }
}
