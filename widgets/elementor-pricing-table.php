<?php
 
class Element_Toolkits_Elementor_Pricing_Table extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_pricing_table';
    }
 
    public function get_title() {
        return __( 'Pricing Table', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-table';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Pricng Table Content', 'e-toolkits' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'style',
            [
                'label'   => __( 'Pricng Table Style', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'   => __( 'Style 1', 'e-toolkits' ),
                    '2'   => __( 'Style 2', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'theme',
            [
                'label'             => __( 'Pricng Table Theme', 'e-toolkits' ),
                'type'              => \Elementor\Controls_Manager::SELECT,
                'default'           => 'default1',
                'options'           => [
                    'default1'      => __( 'Theme 1', 'e-toolkits' ),
                    'turquoise'     => __( 'Theme 2', 'e-toolkits' ),
                    'peter-river'   => __( 'Theme 3', 'e-toolkits' ),
                    'wet-asphalt'   => __( 'Theme 4', 'e-toolkits' ),
                    'carrot'        => __( 'Theme 5', 'e-toolkits' ),
                    'amethyst'      => __( 'Theme 6', 'e-toolkits' ),
                ],
                'condition'         => [
                    'style!'         => '1',
                ],
            ]
        );
 
        
        $this->add_control(
            'title',
            [
                'label'   => __( 'Pricing Title', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Basic Plan', 'e-toolkits' ),
            ]
        );
        
        $this->add_control(
            'icon',
            [
                'label'   => __( 'Price Icon', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-usd'
            ]
        );
        
        $this->add_control(
            'number',
            [
                'label'   => __( 'Price Amount', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => __( '100', 'e-toolkits' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'     => __( 'Pricing Sub Title', 'e-toolkits' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'per project', 'e-toolkits' ),
                'condition' => [
                    'style' => '1',
                ],
            ]
        );
        
        $this->add_control(
            'time',
            [
                'label'      => __( 'Pricing Time', 'e-toolkits' ),
                'type'       => \Elementor\Controls_Manager::TEXT,
                'default'    => 'm',
                'condition'  => [
                    'style!' => '1',
                ],
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => __( 'Highlighted Pricing Table', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'pricing-recom' => [
                        'title' => __( 'Yes', 'e-toolkits' ),
                        'icon' => 'fa fa-check',
                    ],
                    'center' => [
                        'title' => __( 'No', 'e-toolkits' ),
                        'icon' => 'fa fa-times',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        
        $this->add_control(
            'content',
            [
                'label'   => __( 'Content', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 
                '
                <ul>
                    <li>Disk usage <strong>11 GB</strong></li>
                    <li>Subdomains Limit <strong>10</strong></li>
                    <li>Bandwidth Usage <strong>1TB</strong></li>
                    <li>Email Account <strong>Unlimited</strong></li>
                    <li>Tech Support <strong>24/7</strong></li>
                </ul>
                ',
            ]
        );
        
        $this->add_control(
            'link',
            [
                'label' => __( 'Add Pricing Link', 'e-toolkits' ),
                'type'  => \Elementor\Controls_Manager::URL
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'   => __( 'Button Text', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Sign Up', 'e-toolkits'),
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

        $element_toolkits_pricing_table_content = array(
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
        );?>

        <?php if($settings['style'] =='1'):  ?>
        <div class="pricing-card <?php echo esc_attr( $settings['text_align'] );?>">
            <div class="pricing-money">
                <h3><?php echo esc_html( $settings['title'] );?></h3>
                <h4><i class="<?php echo esc_attr( $settings['icon'] );?>"></i><?php echo esc_html( $settings['number'] );?></h4>
                <p><?php echo esc_html( $settings['sub_title'] ); ?></p>
            </div>
            <div class="pricing-list">
                <?php echo wp_kses($settings['content'], $element_toolkits_pricing_table_content); ?>
            </div>
            <div class="pricing-btn">
                <a class="btn btn-inline" href="<?php echo esc_url( $settings['link']['url'] );?>">
                    <i class="fa fa-paper-plane"></i>
                    <span><?php echo esc_html( $settings['button_text'] );?></span>
                </a>
            </div>
        </div>     
        <?php elseif($settings['style'] =='2'): ?>
        
        <div class="single-pricing style<?php echo esc_attr( $settings['style'] ); ?> <?php echo esc_attr( $settings['theme'] ); ?>">
            <header class="header">
                <h3 class="plan"><?php echo esc_html( $settings['title'] ); ?></h3>
                <div class="plan-cost">
                    <span class="currency"><i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i></span>
                    <span class="amount"><?php echo esc_html( $settings['number'] ); ?></span>
                    <span class="time">/<?php echo esc_html( $settings['time'] ); ?></span>
                </div>
            </header><!--end header-->
            
            <div class="details">
                <?php echo wp_kses($settings['content'], $element_toolkits_pricing_table_content); ?>
            </div><!--end details-->
            
            <footer class="footer">
                <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" target="<?php echo esc_html( $target ); ?>" class="btn btn-primary"><?php echo esc_html( $settings['button_text'] ); ?></a>
            </footer><!--end footer-->
        </div>
        <?php endif; 
    }
}