<?php
 
class Element_Toolkits_Elementor_Carousel extends \Elementor\Widget_Base {

    public function get_name() {
        return 'elementor_carousel';
    }
 
    public function get_title() {
        return __( 'Carousel', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-camera-retro';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Carousel Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'count',
            [
                'label'   => __( 'Carousel Count', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 3,
            ]
        );

        $this->add_control(
            'slidetoscroll',
            [
                'label'   => __( 'Select SlideToScroll', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 1,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label'   => __( 'Enable Carousel Loop?', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'       => __( 'Yes', 'e-toolkits' ),
                    'false'      => __( 'No', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'   => __( 'Enable Carousel Autoplay?', 'e-toolkits' ),
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
                'default' => '1000',
                'options' => [
                    '1000'       => __( '1 Second', 'e-toolkits' ),
                    '2000'       => __( '2 Seconds', 'e-toolkits' ),
                    '3000'       => __( '3 Seconds', 'e-toolkits' ),
                    '4000'       => __( '4 Seconds', 'e-toolkits' ),
                    '5000'       => __( '5 Seconds', 'e-toolkits' ),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img',
            [
                'label'   => __( 'Carousel Image', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __( 'Carousel', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Single Carousel', 'e-toolkits' ),
                    ]
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }
 
    protected function render() {
    $settings = $this->get_settings_for_display(); 
    $random_num = rand(8977,897987);
    if(count($settings['slides']) > 1) { ?>
        <script>
            jQuery(document).ready(function($) {
                $("#instagram-line-<?php echo $random_num ; ?>").slick({
                    dots: false,
                    infinite: <?php echo esc_attr( $settings['loop'] ); ?>,
                    autoplay: <?php echo esc_attr( $settings['autoplay'] ); ?>,
                    autoplaySpeed: <?php echo esc_attr( $settings['autoplayTimeout'] ); ?>,
                    arrows: false,
                    slidesToShow: <?php echo esc_attr( $settings['count'] ); ?>,
                    slidesToScroll: <?php echo esc_attr( $settings['slidetoscroll'] ); ?>,
                    responsive: [ 
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 8,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        </script>
        <?php
    }

    ?>
        <div class="instagram-line">
            <div class="container">
                <ul id="instagram-line-<?php echo esc_attr($random_num) ; ?>" class="insta-list">
                    <?php foreach($settings['slides'] as $slide) { ?>
                        <li><img src="<?php echo esc_url(wp_get_attachment_image_url($slide['img']['id'], 'large')); ?>" alt="Carousel"></li>
                    <?php } ; ?>
                </ul>
            </div>
        </div>
    <?php 
    }
}