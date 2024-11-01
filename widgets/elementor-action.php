<?php
 
class Element_Toolkits_Elementor_Action extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_action';
    }
 
    public function get_title() {
        return __( 'Action', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-text-width';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Action Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'title',
            [
                'label'   => __( 'Action Title', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Uncategories', 'e-toolkits' ),
            ]
        );
 
        $this->add_control(
            'link',
            [
                'label'   => __( 'Action Link', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::URL,
            ]
        );
 
        $this->add_control(
            'img',
            [
                'label'   => __( 'Action Image', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'opacity',
            [
                'label'   => __( 'Select Action Opacity', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '7',
                'options' => [
                    '1'       => __( '1', 'e-toolkits' ),
                    '2'       => __( '2', 'e-toolkits' ),
                    '3'       => __( '3', 'e-toolkits' ),
                    '4'       => __( '4', 'e-toolkits' ),
                    '5'       => __( '5', 'e-toolkits' ),
                    '6'       => __( '6', 'e-toolkits' ),
                    '7'       => __( '7', 'e-toolkits' ),
                    '8'       => __( '8', 'e-toolkits' ),
                    '9'       => __( '9', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'opacity_color',
            [
                'label' => __( 'Select Action Opacity Color', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
            ]
        );

        $this->end_controls_section();
    }
 
    protected function render() {
    $settings = $this->get_settings_for_display(); 

    if($settings['link']['is_external'] == true) {
        $target= '_blank';
    } else {
        $target= '_self';
    }


    ?>
        <div class="industry-slide-wrapper">
            <div class="industry-slides">
                <div style="background-image:url(<?php echo esc_url(wp_get_attachment_image_url($settings['img']['id'], 'large'));?>)"class="industry-single-slide action">
                    <div style="opacity:0.<?php echo esc_attr( $settings['opacity'] ); ?>;background-color:<?php echo esc_attr($settings['opacity_color'] ); ?>"  class="industry-slide-overlay"></div>
                    <div class="industry-single-slide-inner action">
                        <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" class="read-more"><h2><?php echo esc_html( $settings['title'] ); ?></h2></a>
                    </div>
                </div>
            </div>
        </div>
<?php 
    }
}