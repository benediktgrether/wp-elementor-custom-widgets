<?php
// Security - Nobody can Access the Widget directly
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


// Widget class
class Everyday_Elementor_Grid_Widget extends \Elementor\Widget_Base
{
    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
        wp_register_style('grid-widget-css', plugin_dir_url(__FILE__) . '../assets/css/widgets/grid-widget.css');

        // wp_register_script('demo-elementor-widget-js',  plugin_dir_url(__FILE__) . '/assets/js/demo-elementor-widget.js', ['elementor-frontend'], '1.0.0', true);
    }
    // Widget-Identifikator
    public function get_name()
    {
        return 'grid';
    }

    // Widget-Titel
    public function get_title()
    {
        return __('Grid', 'text-domain');
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

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['grid', 'grid', 'everyday', 'everyday-grid', 'everyday grid', 'grid everyday', 'grid-everyday'];
    }


    // Widget-Code
    protected function render()
    {
        $settings = $this->get_settings();

        $wrapper_class = isset($settings['wrapper_class']) ? $settings['wrapper_class'] : '';

        $items = isset($settings['items']) ? $settings['items'] : [];
        ?>
            <div class="grid-container <?php echo esc_attr($wrapper_class); ?>"">
            <?php foreach ($items as $item) : ?>
                <div class="<?php echo esc_attr($item['grid_position']); ?> grid-item box-hover box-hover-home">
                    <div class="pulse-button"></div>
                    <div class="overlay-hover"></div>
                    <?php $image = $item['image']; ?>
                    <?php $class = "img-grid"; ?>
                    <?php include 'includes/simple-image.php'; ?>
                    <div class="top-text-hover">
                        <p class="grid-title"><?php echo esc_html($item['title']); ?></p>
                        <p class="grid-desc"><?php echo esc_html($item['desc']); ?></p>
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

        $repeater->add_control(
            'desc',
            [
                'label' => __('Title', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Wer bei uns arbeitet ist garantiert schwindelfrei. ', 'text-domain'),
            ]
        );

		$repeater->add_control(
			'grid_position',
			[
				'label' => esc_html__( 'Grid Positionierung', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'first-grid' => esc_html__( 'first-grid', 'textdomain' ),
					'second-grid'  => esc_html__( 'second-grid', 'textdomain' ),
					'third-grid' => esc_html__( 'third-grid', 'textdomain' ),
					'fourth-grid' => esc_html__( 'fourth-grid', 'textdomain' ),
					'fifth-grid' => esc_html__( 'fifth-grid', 'textdomain' ),
					'sixth-grid' => esc_html__( 'sixth-grid', 'textdomain' ),
				],
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

    public function get_style_depends()
    {

        return ['grid-widget-css'];
    }

    // public function get_script_depends(){

    //     return [ 'demo-elementor-widget-js' ];

    // }
}


