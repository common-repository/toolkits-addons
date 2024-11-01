<?php
 
class Element_Toolkits_Elementor_Popular_Post extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'elementor_posts';
    }
 
    public function get_title() {
        return __( 'Popular Posts', 'e-toolkits' );
    }
 
    public function get_icon() {
        return 'fa fa-address-book-o';
    }
 
    public function get_categories() {
        return [ 'elementor_addons' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Popular Posts Content', 'e-toolkits' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'count',
            [
                'label'   => __( 'Popular Posts Count', 'e-toolkits' ),
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
            'popular_cats',
            [
                'label' => __( 'Popular Posts category', 'e-toolkits' ),
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
            'popular_width',
            [
                'label' => __( 'Popular Posts Width', 'e-toolkits' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '3'       => __( '3 Columns', 'e-toolkits' ),
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

        $this->end_controls_section();
    }
 
    protected function render() {
    $settings = $this->get_settings_for_display();  
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => ''.esc_attr( $settings['count'] ).'',
        'order'          => ''.esc_attr( $settings['post_order'] ).'',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'name',
                'terms'    => ''.esc_attr( $settings['popular_cats'] ).'',
                'meta_key' => 'elementor_post_viewed',
            ),
        ),
    );
    $loop = new WP_Query( $args ); 

    ?>

    <div class="row">

    <?php 

    while ( $loop->have_posts() ) : $loop->the_post(); 
    global $post; 
    $post_id = get_the_ID(); ?>
    <div class="col-md-<?php echo esc_attr( $settings['popular_width'] ); ?> popular-post">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if(has_post_thumbnail() ): 
                the_post_thumbnail( );
            endif; ?>
            <header class="entry-header">
                <?php
                if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php  
                            toolkits_addons_single_post_cat(); 
                            toolkits_addons_posted_on();
                        ?>
                    </div><!-- .entry-meta -->
                    <?php 
                    endif;
                the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                the_excerpt('20'); 


                ?>
                <a href="<?php esc_url(get_the_permalink( $post->ID )); ?>" class="read-more"><?php echo esc_html__('Read More','e-toolkits'); ?></a>
            </header><!-- .entry-header -->
        </div><!-- #post-<?php the_ID(); ?> -->
    </div>
    <?php endwhile; 
    wp_reset_query(); ?>
</div>
<?php 
    }
}