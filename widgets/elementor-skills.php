<?php
 
class Element_Toolkits_Elementor_Skills extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_skills';
    }
 
    public function get_title() {
        return __( 'Progress Bar', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-tasks';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Skill Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'title',
            [
                'label'   => __( 'Skill Title', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'HTML', 'e-toolkits' ),
            ]
        );

        $this->add_control(
            'number',
            [
                'label'   => __( 'Skill Persentage', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => __( '95', 'e-toolkits' ),
            ]
        );

        $this->end_controls_section();
 
    }
 
    protected function render() {
 
    $settings = $this->get_settings_for_display();?>
    <div class="skill">
        <div class="progress"> <!-- progress start -->
            <div class="lead-bd"><?php echo esc_html( $settings['title'] ); ?></div>
            <div class="progress-bar wow fadeInLeft" data-progress="<?php echo esc_html( $settings['number'] ); ?>%" style="width: <?php echo esc_html( $settings['number'] ); ?>%;" data-wow-duration="1s" data-wow-delay=".5s"> <span><?php echo esc_html( $settings['number'] ); ?>%</span></div>
        </div> <!-- progress end -->
    </div>  
    <?php
    }
}