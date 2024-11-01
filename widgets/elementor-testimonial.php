<?php 
class Element_Toolkits_Elementor_Testimonial extends \Elementor\Widget_Base {

	public function get_name() {
		return 'elementor_testimonial';
    }
    
	public function get_title() {
		return __( 'Testimonial', 'e-toolkits' );
	}

	public function get_icon() {
		return 'fa fa-user';
	}

	public function get_categories() {
		return [ 'elementor_addons' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Testimonial Content', 'e-toolkits' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'loop',
            [
                'label'   => __( 'Enable Testimonial Loop?', 'e-toolkits' ),
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
                'label'   => __( 'Enable Testimonial Dots?', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'       => __( 'Yes', 'e-toolkits' ),
                    'false'      => __( 'No', 'e-toolkits' ),
                ],
            ]
        );

        $this->add_control(
            'speed',
            [
                'label'   => __( 'Select Testimonial Speed', 'e-toolkits' ),
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

         $this->add_control(
            'count',
            [
                'label'   => __( 'Testimonial Count', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 1,
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
        
        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => __( 'Author Post', 'e-toolkits' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Their Leadership, Listing Skills & Dedication Translate Into Extraordinary Work.' , 'e-toolkits' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'name', [
				'label' => __( 'Author Name', 'e-toolkits' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Stokes Daniel Li.' , 'e-toolkits' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
            'post', [
                'label' => __( 'Author Job Name', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Director Of Marketing' , 'e-toolkits' ),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
			'img', [
				'label' => __( 'Author Image', 'e-toolkits' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

        $repeater->add_control(
            'icon', [
                'label' => __( 'Icon Image', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

		$this->add_control(
			'slides',
			[
				'label' => __( 'Testimonial', 'e-toolkits' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Single Testimonial', 'e-toolkits' ),
					]
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        if(!empty($settings['slides'])) {

            $random = rand(8977,897987);
            if(count($settings['slides']) > 1) { ;?>
                <script>
                    jQuery(document).ready(function($) {
                        $("#testimonial-active-<?php echo esc_html($random); ?>").slick({
                            dots: <?php echo esc_attr( $settings['dots'] ); ?>,
                            infinite: <?php echo esc_attr( $settings['loop'] ); ?>,
                            arrows: false,
                            speed: <?php echo esc_attr( $settings['speed'] ); ?>, 
                            slidesToShow: <?php echo esc_attr( $settings['count'] ); ?>,
                            slidesToScroll:<?php echo esc_attr( $settings['slidetoscroll'] ); ?>,
                            prevArrow:"<i class=\' fa fa-angle-left \'></i>",
                            nextArrow:"<i class=\'  fa fa-angle-right \'></i>",
                            responsive: [
                                {
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        infinite: true,
                                        dots: true
                                    }
                                },
                                {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                },
                                {
                                    breakpoint: 767,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                }
                            ]
                        });
                    });
                </script> <?php
            } ; ?>
            <div id="testimonial-active-<?php echo esc_attr($random); ?>" class="row testimonial-active"> <?php 
            foreach($settings['slides'] as $slide) { ;?>
                <div class="col-lg-12">
                    <div class="single-testimonial">
                        <div class="autor-img">
                             <img src="<?php echo esc_url(wp_get_attachment_image_url($slide['img']['id'], 'large'));?>" alt="img">
                        </div>     
                        <div class="text">
                            <div class="qt-img">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url($slide['icon']['id'], 'large'));?>" alt="img">
                            </div>   
                            <h3><?php echo esc_html($slide['title']);?></h3>
                            <div class="testi-author">
                                <div class="ta-info">
                                    <h6><?php echo esc_html($slide['name']);?></h6>
                                    <span><?php echo esc_html($slide['post']);?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ;?>
            </div>
            <?php
        } 
	}
}