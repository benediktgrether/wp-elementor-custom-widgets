<?php
// Security - Nobody can Access the Widget directly
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Card Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Everyday_Elementor_Card_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve card widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'card';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Card', 'everyday-elementor-widgets');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-header';
	}


	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url()
	{
		return 'https://developers.elementor.com/docs/widgets/';
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
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
		return ['card', 'testomonial'];
	}


	// Setting the Controls on the left.
	// https://developers.elementor.com/docs/editor-controls/
	/**
	 * Register Card widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'textdomain'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Input Controls
		$this->add_control(
			'card_title',
			[
				'label' => esc_html__('Card Title', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Type your card title here', 'textdomain'),
			]
		);

		$this->add_control(
			'card_description',
			[
				'label' => esc_html__('Card Description', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__('Default description', 'textdomain'),
				'placeholder' => esc_html__('Type card description here', 'textdomain'),
			]
		);

		$this->add_control(
			'card_wysiwyg',
			[
				'label' => esc_html__('WYSIWYG Description', 'textdomain'),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__('Default description', 'textdomain'),
				'placeholder' => esc_html__('Type your Card wysiwyg description here', 'textdomain'),
			]
		);

		$this->end_controls_section();

		// Style Controls
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'textdomain'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_option',
			[
				'label' => esc_html__('Title Options', 'textdomain'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'seperator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Title Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} .card-title' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{ WRAPPER }} .card-title'
			]
		);

		$this->add_control(
			'description_options',
			[
				'label' => esc_html__('Description Options', 'textdomain'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'seperator' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Description Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} .card-description' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{ WRAPPER }} .card-description'
			]
		);

		$this->end_controls_section();
	}

	// Render Function in Frontend and Backend
	protected function render()
	{

		// get our input from the widget settings
		$settings = $this->get_settings_for_display();

		// get the individual vales of the input from the controls
		$card_title = $settings['card_title'];
		$card_description = $settings['card_description'];
		$card_wysiwyg = $settings['card_wysiwyg'];

?>

		<!-- start rendering -->

		<div class="card">
			<h3 class="card-title"><?php echo $card_title ?></h3>
			<p class="card-description"><?php echo $card_description ?></p>
			<div class="card-wysiwyg"><?php echo $card_wysiwyg ?></div>
		</div>

		<!-- finish rendering -->
<?php
	}
}

?>