<?php
 
class Element_Toolkits_Elementor_Bannar extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_bannar';
    }
 
    public function get_title() {
        return __( 'Bannar', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-file-image-o';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Bannar Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'title',
            [
                'label'   => __( 'Bannar Title', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Minimal Protfolio Theme', 'e-toolkits' ),
            ]
        );
 
        $this->add_control(
            'content',
            [
                'label'   => __( 'Bannar Content', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate.', 'e-toolkits' ),
            ]
        );

        $this->add_control(
            'bannar_bg', [
                'label' => __( 'Bannar Background', 'e-toolkits' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        
        $this->end_controls_section();
 
    }
 
    protected function render() {
 
        $settings = $this->get_settings_for_display();

        $elementor_bannar_content = array(
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
        ); ?>
            <div class="bannar-slide-wrapper">
                <div class="bannar-slides">
                    <div style="background-image:url(<?php echo esc_url(wp_get_attachment_image_url($settings['bannar_bg']['id'], 'large'));?>)"class="bannar-single-slide">
                        <div class="bannar-slide-overlay"></div>
                        <div class="bannar-single-slide-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2 text-center">
                                        <h2 class="static-heading">
                                            <?php echo esc_html( $settings['title'] ); ?>
                                        </h2>
                                        <div class="static-des">
                                            <?php echo wp_kses(wpautop($settings['content']), $elementor_bannar_content); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}