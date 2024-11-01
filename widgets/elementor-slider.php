<?php
 
class Element_Toolkits_Elementor_Slider extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_slider';
    }
 
    public function get_title() {
        return __( 'Slider', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-picture-o';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Slider Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'count',
            [
                'label'   => __( 'Slider Count', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 3,
            ]
        );

        $categories = get_categories();
        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }

        $this->add_control(
            'slider_cats',
            [
                'label' => __( 'Slider Posts category', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => $default,
                'options' => $cats
            ]
        );

        $this->add_control(
            'post_order',
            [
                'label'   => __( 'Select Post Order', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'ASC'       => __( 'Ascending Post', 'e-toolkits' ),
                    'DESC'      => __( 'Descending Post', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'loop',
            [
                'label'   => __( 'Enable Post Loop?', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'       => __( 'Yes', 'e-toolkits' ),
                    'false'      => __( 'No', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'   => __( 'Enable Post Dots?', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'       => __( 'Yes', 'e-toolkits' ),
                    'false'      => __( 'No', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'   => __( 'Enable Post Nav?', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'       => __( 'Yes', 'e-toolkits' ),
                    'false'      => __( 'No', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'left_icon',
            [
                'label'   => __( 'Left Nav Icon', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-angle-left',
            ]
        );

        $this->add_control(
            'right_icon',
            [
                'label'   => __( 'Right Nav Icon', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-angle-right',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'   => __( 'Enable Post Autoplay?', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'       => __( 'Yes', 'e-toolkits' ),
                    'false'      => __( 'No', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'autoplayTimeout',
            [
                'label'   => __( 'Select AutoplayTimeout', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '5000',
                'options' => [
                    '1000'       => __( '1 Second', 'e-toolkits' ),
                    '2000'       => __( '2 Seconds', 'e-toolkits' ),
                    '3000'       => __( '3 Seconds', 'e-toolkits' ),
                    '4000'       => __( '4 Seconds', 'e-toolkits' ),
                    '5000'       => __( '5 Seconds', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'draggable',
            [
                'label'   => __( 'Enable Draggable?', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'       => __( 'Yes', 'e-toolkits' ),
                    'false'      => __( 'No', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'fade',
            [
                'label'   => __( 'Enable  Fade?', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true'       => __( 'Yes', 'e-toolkits' ),
                    'false'      => __( 'No', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'opacity',
            [
                'label'   => __( 'Select Slider Opacity', 'e-toolkits' ),
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
                'label' => __( 'Select Slider Opacity Color', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
            ]
        );

        $this->add_control(
            'slider_width',
            [
                'label' => __( 'Slider Content Width', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '4'       => __( '4 Columns', 'e-toolkits' ),
                    '5'       => __( '5 Columns', 'e-toolkits' ),
                    '6'       => __( '6 Columns', 'e-toolkits' ),
                    '7'       => __( '7 Columns', 'e-toolkits' ),
                    '8'       => __( '8 Columns', 'e-toolkits' ),
                    '9'       => __( '9 Columns', 'e-toolkits' ),
                    '10'       => __( '10 Columns', 'e-toolkits' ),
                    '11'       => __( '11 Columns', 'e-toolkits' ),
                    '12'       => __( '12 Columns', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => __( 'Slider Content Alignment', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Text Left', 'e-toolkits' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Text Center', 'e-toolkits' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Text Right', 'e-toolkits' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Slider Content Color', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
            ]
        );

        $this->end_controls_section();
    }
 
    protected function render() {
    $settings = $this->get_settings_for_display();
    
    $elementor_args = new WP_Query(
        array(
            'posts_per_page' => ''.esc_attr( $settings['count'] ).'',
            'post_type' => 'post',
            'order' => ''.esc_attr( $settings['post_order'] ).'',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'name',
                    'terms'    => ''.esc_attr( $settings['slider_cats'] ).'',
                ),
            ),
        )
    ); 
    $elementor_dynamic_number = rand(3223424, 62123443); ?>
        <script>
            jQuery(document).ready(function($) {
                $("#industry-slide-<?php echo esc_attr($elementor_dynamic_number); ?>").slick({
                    dots: <?php echo esc_attr( $settings['dots'] ); ?>,
                    infinite: <?php echo esc_attr( $settings['loop'] ); ?>,
                    autoplay: <?php echo esc_attr( $settings['autoplay'] ); ?>,
                    autoplaySpeed: <?php echo esc_attr( $settings['autoplayTimeout'] ); ?>,
                    draggable: <?php echo esc_attr( $settings['draggable'] ); ?>,
                    fade: <?php echo esc_attr( $settings['fade'] ); ?>,
                    arrows: <?php echo esc_attr( $settings['nav'] ); ?>,
                    prevArrow:"<i class=\'<?php echo esc_attr( $settings['left_icon'] ); ?> \'></i>",
                    nextArrow:"<i class=\' <?php echo esc_attr( $settings['right_icon'] ); ?>  slick-next \'></i>"
                });
            });
        </script>
        <div class="industry-slide-wrapper">
            <div id="industry-slide-<?php echo esc_attr($elementor_dynamic_number); ?>" class="industry-slides">
        <?php 
        while($elementor_args->have_posts()) : $elementor_args->the_post();
        $elementor_post_id = get_the_ID(); ?>
            <div style="background-image:url(<?php echo esc_url(the_post_thumbnail_url(esc_html($elementor_post_id), 'large')); ?>)"class="industry-single-slide">
                <div style="opacity:0.<?php echo esc_attr( $settings['opacity'] ); ?>;background-color:<?php echo esc_attr($settings['opacity_color'] ); ?>"  class="industry-slide-overlay"></div>
                <div class="industry-single-slide-inner">
                    <div class="container">
                        <div class="row justify-content-center text-<?php echo esc_attr($settings['text_align'] ); ?>">
                            <div class="col-lg-<?php echo esc_attr($settings['slider_width'] ); ?> my-auto">
                                <div class="content-overlay">
                                    <span class="cat"><?php echo esc_html( toolkits_addons_slider_post_cat()); ?></span>
                                    <h2 style="color:<?php echo esc_attr($settings['content_color'] ); ?>"><a href="<?php echo esc_url(get_the_permalink( $elementor_post_id )); ?>"><?php echo esc_html(the_title( )); ?></a></h2>
                                    <p class="date"><?php echo esc_html( toolkits_addons_posted_on()); ?></p>
                                    <a href="<?php echo esc_url(get_the_permalink( $elementor_post_id )); ?>" class="read-more"><?php echo esc_html__('Read More','padma-pro'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        endwhile;
        wp_reset_query(); ?>
            </div>
        </div>
<?php 
    }
}