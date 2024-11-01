<?php
 
class Element_Toolkits_Elementor_Service extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_service';
    }
 
    public function get_title() {
        return __( 'Service', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-cog';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Service Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'style',
            [
                'label'   => __( 'Service Style', 'element-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( 'Style 1', 'element-toolkits' ),
                    '2'  => __( 'Style 2', 'element-toolkits' ),
                    '3'  => __( 'Style 3', 'element-toolkits' ),
                    '4'  => __( 'Style 4', 'element-toolkits' ),
                    '5'  => __( 'Style 5', 'element-toolkits' ),
                    '6'  => __( 'Style 6', 'element-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => __( 'Service Alignment', 'element-toolkits' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => __( 'Text Left', 'element-toolkits' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text-center' => [
                        'title' => __( 'Text Center', 'element-toolkits' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text-right' => [
                        'title' => __( 'Text Right', 'element-toolkits' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'text-center',
                'toggle' => true,
            ]
        );
 
        $this->add_control(
            'title',
            [
                'label'   => __( 'Service Title', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Web Design', 'e-toolkits' ),
            ]
        );

        $this->add_control(
            'number',
            [
                'label'     => __( 'Service Number', 'element-toolkits' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'default'   => __( '1', 'element-toolkits' ),
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label'   => __( 'Service Icon', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-code'
            ]
        );
 
        $this->add_control(
            'content',
            [
                'label'   => __( 'Service Content', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'e-toolkits' ),
            ]
        );
        
        $this->end_controls_section();
 
    }
 
    protected function render() {
 
        $settings = $this->get_settings_for_display();

        $elementor_service_content = array(
            'a' => array(
                'href' => array(),
                'title' => array(),
                'class' => array()
            ),
            'img' => array(
                'alt' => array(),
                'src' => array()
            ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'p' => array(),
            'ul' => array(
                'li' => array(),
                'ol' => array(),
                'strong' => array(),
            ),
            'li' => array(),
            'ol' => array(),
        );

        if($settings['style'] =='1'): ?>
            <div class="service-card <?php echo esc_attr( $settings['text_align'] ); ?>">
                <h3><?php echo esc_html( $settings['number'] ); ?></h3>
                <span class="<?php echo esc_attr( $settings['icon'] ); ?>"></span>
                <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                <h4><?php echo esc_html( $settings['title'] ); ?></h4>
                <?php echo wp_kses($settings['content'], $elementor_service_content); ?>
            </div>
        <?php elseif ($settings['style'] =='2'): ?>
        <div class="service-box <?php echo esc_attr( $settings['text_align'] ); ?>">
            <div class="icon">
                <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
            </div>
            <h2><?php echo esc_html( $settings['title'] ); ?></h2>
            <?php echo wp_kses($settings['content'], $elementor_service_content); ?>
        </div>
        <?php elseif ($settings['style'] =='3'): ?>
        <div class="hi-icon-effect-8 <?php echo esc_attr( $settings['text_align'] ); ?>">
            <div class="single-service">
                <div class="ico hi-icon">
                    <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                </div>
            </div>
            <h4><?php echo esc_html( $settings['title'] );?></h4>
            <?php echo wp_kses($settings['content'], $elementor_service_content); ?>
        </div>
        <?php elseif ($settings['style'] =='4'): ?>
            <div class="service-thumb <?php echo esc_attr( $settings['text_align'] ); ?>">
                <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                <h4><?php echo esc_html( $settings['title'] ); ?></h4>
                <?php echo wp_kses($settings['content'], $elementor_service_content); ?>
            </div>
        <?php elseif ($settings['style'] =='5'): ?>
            <div class="service <?php echo esc_attr( $settings['text_align'] ); ?>">
                <div class="icon">
                    <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                </div>
                <div class="description">
                    <h3><?php echo esc_html( $settings['title'] ); ?></h3>
                    <?php echo wp_kses($settings['content'], $elementor_service_content); ?>
                </div>
            </div>
        <?php elseif ($settings['style'] =='6'): ?>
            <div class="single-service <?php echo esc_attr( $settings['text_align'] ); ?>">
                <div class="icon">
                    <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                </div>
                <h3><?php echo esc_html( $settings['title'] ); ?></h3>
                <?php echo wp_kses(wpautop( $settings['content'] ), $elementor_service_content); ?>
            </div>
        <?php endif; 
    }
}