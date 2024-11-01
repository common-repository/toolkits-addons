<?php
 
class Element_Toolkits_Elementor_Count_Box extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_count_box';
    }
 
    public function get_title() {
        return __( 'Count Box', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-sort-numeric-asc';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Count Box Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'theme',
            [
                'label'   => __( 'Count Box Theme', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( 'Theme 1', 'e-toolkits' ),
                    '2'  => __( 'Theme 2', 'e-toolkits' ),
                    '3'  => __( 'Theme 3', 'e-toolkits' ),
                ],
            ]
        );
 
        $this->add_control(
            'title',
            [
                'label'   => __( 'Count Title', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Project completed', 'e-toolkits' ),
            ]
        );
 
        $this->add_control(
            'number',
            [
                'label'     => __( 'Count Number', 'e-toolkits' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'default'   => __( '100', 'e-toolkits' ),
            ]
        );
        
        $this->add_control(
            'icon',
            [
                'label'   => __( 'Count Icon', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-cog'
            ]
        );
        
        $this->end_controls_section();
 
    }
 
    protected function render() {
 
        $settings = $this->get_settings_for_display(); ?>
            <div class="counter-card count-<?php echo esc_attr( $settings['theme'] ); ?>">
                <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                <div class="counter-info">
                    <h3><span class="counter-number"><?php echo esc_html( $settings['number'] ); ?></span>+</h3>
                    <p><?php echo esc_html( $settings['title'] ); ?></p>
                </div>
            </div>
        <?php 
    }
}