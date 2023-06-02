<?php

class Everyday_Elementor_Grid_Container_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'custom-container-widget';
    }

    public function get_title()
    {
        return 'Custom Container';
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

    protected function render()
    {
        echo '<div class="custom-container">';

        // Render the Image widget
        $card_widget = new Everyday_Elementor_Card_Widget();
        $card_widget->render();

        // Render the Headline widget
        // $headline_widget = new Custom_Headline_Widget();
        // $headline_widget->render();

        // Render other widgets
        // For example:
        // $other_widget = new Custom_Other_Widget();
        // $other_widget->render();

        echo '</div>';
    }
}
