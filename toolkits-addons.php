<?php
/**
* plugin name: Toolkits Addons
* Plugin URI: https://ashathemes.com/
* Description: This plugin will enable elementor addons on your wordpress theme. You can use this plugin any wordpress theme. If you want to get best performance please active our theme.
* Author: Ashathemes
* Author URI: https://profiles.wordpress.org/ashathemes
* Version: 1.0.2
* License: GPL2
* Text Domain: e-toolkits
* Domain Path: /languages
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
 
define( 'TOOLKITS_ADDONS_PATH', plugin_dir_path( __FILE__ ) );

final class Toolkits_Addons_Extension {
 
    const VERSION = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '5.6';
    private static $_instance = null;
    public static function instance() {
 
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
 
    }
 
    public function __construct() {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }
 
    public function i18n() {
        load_plugin_textdomain( 'e-toolkits' );
    }
 
    public function init() {
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }
 
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }
 
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
        add_action( 'elementor/elements/categories_registered', [ $this, 'register_new_category' ] );
        add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'editor_widget_styles' ] );
    }

    public function register_new_category($manager){
        $manager->add_category('elementor_addons',[
            'title' => esc_html__('Elementor Toolkits Addons','e-toolkits'),
            'icon' => 'fa fa-facebook',
        ]);
    }

    function editor_widget_styles(){
        wp_enqueue_style( 'elementor-editor-style',  plugins_url( '/assets/css/elementor-editor-style.css', __FILE__ ), array(), '1.0.0', 'all');
        wp_enqueue_style( 'font-awesome',  plugins_url( '/assets/css/font-awesome.min.css', __FILE__ ), array(), '4.7.0', 'all');
    }


    public function admin_notice_missing_main_plugin() {
 
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'e-toolkits' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'e-toolkits' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'e-toolkits' ) . '</strong>'
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
 
    }
 
    public function admin_notice_minimum_elementor_version() {
 
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'e-toolkits' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'e-toolkits' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'e-toolkits' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
 
    }
 
    public function admin_notice_minimum_php_version() {
 
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
 
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'e-toolkits' ),
            '<strong>' . esc_html__( 'Elementor Test Extension', 'e-toolkits' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'e-toolkits' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
 
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
 
    }

    public function init_widgets() {
        // Elementor Toolkits
        require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-slider.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Slider() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-bannar.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Bannar() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-service.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Service() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-skills.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Skills() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-icon.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Icon() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-carousel.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Carousel() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-parallax.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Parallax() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-popular.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Popular_Post() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-action.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Action() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-testimonial.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Testimonial() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-pricing-table.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Pricing_Table() );

       require_once( TOOLKITS_ADDONS_PATH . '/widgets/elementor-count-box.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Element_Toolkits_Elementor_Count_Box() );
    }
 
    public function widget_styles() {
        wp_enqueue_style( 'slick', plugins_url( 'widgets/css/slick.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-slider', plugins_url( 'widgets/css/elementor-slider.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-bannar', plugins_url( 'widgets/css/elementor-bannar.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-service', plugins_url( 'widgets/css/elementor-service.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-skills', plugins_url( 'widgets/css/elementor-skills.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-icon', plugins_url( 'widgets/css/elementor-icon.css', __FILE__ ) );
        wp_enqueue_style( 'animate-css', plugins_url( 'widgets/css/animate.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-carousel', plugins_url( 'widgets/css/carousel.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-parallax', plugins_url( 'widgets/css/elementor-parallax.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-popular', plugins_url( 'widgets/css/elementor-popular.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-action', plugins_url( 'widgets/css/elementor-action.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-testimonial', plugins_url( 'widgets/css/elementor-testimonial.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-pricing-table', plugins_url( 'widgets/css/elementor-pricing-table.css', __FILE__ ) );
        wp_enqueue_style( 'elementor-count-box', plugins_url( 'widgets/css/elementor-count-box.css', __FILE__ ) );

        wp_enqueue_script('slick',plugins_url('widgets/js/slick.min.js',__FILE__), array('jquery'), '2.2.1',false);
        wp_enqueue_script('wow',plugins_url('widgets/js/wow.js',__FILE__), array('jquery'), '1.0.2',false);
        wp_enqueue_script('wow-main',plugins_url('widgets/js/wow-main.js',__FILE__), array('jquery'), '1.0.0',false);
        wp_enqueue_script('parallax',plugins_url('widgets/js/jquery.parallax-1.1.3.js',__FILE__), array('jquery'), '1.1.3',false);
    }
}
 
Toolkits_Addons_Extension::instance();

// Elementor Slider catergory
if ( ! function_exists( 'toolkits_addons_slider_post_cat' )) :
    function toolkits_addons_slider_post_cat($id = '') {
        $elementor_categories = get_the_category($id);
        if($elementor_categories && 'post' === get_post_type()):
            $elementor_category = $elementor_categories[mt_rand(0,count( $elementor_categories)-1)];
        ?>
        <a href="<?php echo esc_url(get_category_link($elementor_category)); ?>"><?php echo esc_html($elementor_category->name); ?></a>
        <?php
        endif;
    }
endif;

// Elementor Post date 
if ( ! function_exists( 'toolkits_addons_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function toolkits_addons_posted_on() { ;?>
        <span class="posted-on">
            <?php $post_date = get_the_date( 'F j, Y' ); 
            echo esc_html($post_date); ?>
        </span>
<?php }
endif;

// Elementor excerpt
function toolkits_addons_excerpt_more( $more ) {
    return '.';
}
add_filter( 'excerpt_more', 'toolkits_addons_excerpt_more' );

// 
function toolkits_addons_count_post_visits() {
 if( is_single() ) {
 global $post;
 $views = get_post_meta( $post->ID, 'elementor_post_viewed', true );
 if( $views == '' ) {
 update_post_meta( $post->ID, 'elementor_post_viewed', '1' ); 
 } else {
 $views_no = intval( $views );
 update_post_meta( $post->ID, 'elementor_post_viewed', ++$views_no );
 }
 }
}
add_action( 'wp_head', 'toolkits_addons_count_post_visits' );


if ( ! function_exists( 'toolkits_addons_single_post_cat' )) :
    function toolkits_addons_single_post_cat($id = '') {
        $elementor_categories = get_the_category($id);
        if($elementor_categories && 'post' === get_post_type()):
            $elementor_category = $elementor_categories[mt_rand(0,count( $elementor_categories)-1)];
        ?>
        <a href="<?php echo esc_url(get_category_link($elementor_category)); ?>"><?php echo esc_html($elementor_category->name); ?></a>

        <?php
        endif;
    }
endif;