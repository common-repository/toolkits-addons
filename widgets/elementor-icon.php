<?php
 
class Element_Toolkits_Elementor_Icon extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_icon';
    }
 
    public function get_title() {
        return __( 'Icon', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-envelope-o';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Icon Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'icon',
            [
                'label'   => __( 'Icon', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-map-marker'
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __( 'Title', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Your title here', 'e-toolkits' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'   => __( 'Sub Title', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Your sub title here', 'e-toolkits' ),
            ]
        );

        $this->end_controls_section();
 
    }
 
    protected function render() {
 
        $settings = $this->get_settings_for_display();?>
            <div class="contact-icon">
                <div class="icon">
                    <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                </div>
                <p><?php echo esc_html( $settings['title'] ); ?></p>
                <p><?php echo esc_html( $settings['sub_title'] ); ?></p>
            </div>
        <?php
    }
}