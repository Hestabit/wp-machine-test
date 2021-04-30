<?php
/**
 * Theme define
 */
define( 'REBECCALITE_LIBS_URI', get_template_directory_uri() . '/libs/');
define( 'REBECCALITE_CORE_PATH', get_template_directory() . '/core/');

if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Theme setup
 */
function rebeccalite_setup() {
    if ( ! isset( $content_width ) ) { $content_width = 1270; }
    load_theme_textdomain( 'rebeccalite', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );
    add_theme_support( 'editor-styles' );
    add_editor_style();
    register_nav_menus(
        array(
            'primary'   => __( 'Nav Primary', 'rebeccalite' )
        )
    );

    add_image_size( 'rebeccalite-post-full', 1270, 1180 );
    add_image_size( 'rebeccalite-post-small', 620, 520, true );
    add_image_size( 'rebeccalite-post-small-w-sidebar', 457, 343, true );

    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true
    );
    add_theme_support( 'custom-logo', $defaults );

}

add_action('after_setup_theme', 'rebeccalite_setup');

/**
 * Register & Enqueue Styles / Scripts
 */
function rebeccalite_load_scripts() {
    // CSS
    $fonts_url = '';
    $font_families = array();
    
    $Jost = _x( 'on', 'Jost: on or off', 'rebeccalite' );
    $Lora = _x( 'on', 'Lora: on or off', 'rebeccalite' );
    if ( $Jost !== 'off' || $Lora !== 'off' ) {
        if ( 'off' !== $Jost ) $font_families[] = 'Jost:300,400,700';
        if ( 'off' !== $Lora ) $font_families[] = 'Lora:400,400i';
    }
    
    if ( !empty( $font_families ) ) {
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' )
        );
    
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
        wp_enqueue_style( 'google-fonts', $fonts_url );
    }

    wp_enqueue_style('bootstrap', REBECCALITE_LIBS_URI . 'bootstrap/bootstrap.min.css');
    wp_enqueue_style('fontawesome', REBECCALITE_LIBS_URI . 'fontawesome/css/all.min.css');
    wp_enqueue_style('rebeccalite-style', get_template_directory_uri() . '/style.css', array(), rand(1, 999) );

    // JS
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'rebeccalite-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), false, true );

    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}

add_action( 'wp_enqueue_scripts', 'rebeccalite_load_scripts' );


/**
 * Register Sidebar
 */
function rebeccalite_widgets_init() {
    if ( function_exists('register_sidebar') ) {
    	register_sidebar(array(
    		'name'            => __( 'Sidebar', 'rebeccalite' ),
    		'id'              => 'sidebar',
    		'before_widget'   => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'    => '</div>',
    		'before_title'    => '<h3 class="widget-title">',
    		'after_title'     => '</h3>'
    	));
        register_sidebar(array(
    		'name'            => __( 'Instagram Footer', 'rebeccalite' ),
    		'id'              => 'footer-sidebar',
    		'before_widget'   => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'    => '</div>',
    		'before_title'    => '<h3 class="widget-title"><span>',
    		'after_title'     => '</span></h3>',
            'description'     => __( 'Use the "Instagram" widget here. IMPORTANT: For best result set number of photos to 6.', 'rebeccalite' )
    	));
    }
}

add_action( 'widgets_init', 'rebeccalite_widgets_init' );

/**
 * Check file exists and require
 */
function rebeccalite_require_file( $path ) {
    if ( file_exists($path) ) {
        require $path;
    }
}

/**
 * Core Files
 */
rebeccalite_require_file( REBECCALITE_CORE_PATH . 'classes/class-tgm-plugin-activation.php' );
rebeccalite_require_file( REBECCALITE_CORE_PATH . 'customizer.php' );

/**
 * Get Social
 */
function rebeccalite_social_media( $class = 'social-media') {
    $show = true;

    $facebook   = get_theme_mod('rebeccalite_facebook');
    $twitter    = get_theme_mod('rebeccalite_twitter');
    $instagram  = get_theme_mod('rebeccalite_instagram');
    $pinterest  = get_theme_mod('rebeccalite_pinterest');
    $bloglovin  = get_theme_mod('rebeccalite_bloglovin');
    $tumblr     = get_theme_mod('rebeccalite_tumblr');
    $youtube    = get_theme_mod('rebeccalite_youtube');
    $dribbble   = get_theme_mod('rebeccalite_dribbble');
    $soundcloud = get_theme_mod('rebeccalite_soundcloud');
    $vimeo      = get_theme_mod('rebeccalite_vimeo');
    $linkedin   = get_theme_mod('rebeccalite_linkedin');

    if ( !$facebook && !$twitter && !$instagram && !$pinterest && !$bloglovin && !$tumblr && !$youtube && !$dribbble && !$soundcloud && !$vimeo && !$linkedin ) {
        $show = false;
    }

    if ( $show ) { ?>
    <div class="<?php echo $class; ?>">
        <?php if($facebook) : ?><a class="social-icon" href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fab fa-facebook-f"></i><span class="text"><?php _e( 'Facebook', 'rebeccalite' ); ?></span></a><?php endif; ?>
        <?php if($twitter) : ?><a class="social-icon" href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fab fa-twitter"></i><span class="text"><?php _e( 'Twitter', 'rebeccalite' ); ?></span></a><?php endif; ?>
    	<?php if($instagram) : ?><a class="social-icon" href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fab fa-instagram"></i><span class="text"><?php _e( 'Instagram', 'rebeccalite' ); ?></span></a><?php endif; ?>
    	<?php if($pinterest) : ?><a class="social-icon" href="<?php echo esc_url($pinterest); ?>" target="_blank"><i class="fab fa-pinterest-p"></i><span class="text"><?php _e( 'Pinterest', 'rebeccalite' ); ?></span></a><?php endif; ?>
    	<?php if($bloglovin) : ?><a class="social-icon" href="<?php echo esc_url($bloglovin); ?>" target="_blank"><i class="fa fa-heart"></i><span class="text"><?php _e( 'Bloglovin', 'rebeccalite' ); ?></span></a><?php endif; ?>
    	<?php if($tumblr) : ?><a class="social-icon" href="<?php echo esc_url($tumblr); ?>" target="_blank"><i class="fab fa-tumblr"></i><span class="text"><?php _e( 'Tumblr', 'rebeccalite' ); ?></span></a><?php endif; ?>
    	<?php if($youtube) : ?><a class="social-icon" href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="fab fa-youtube"></i><span class="text"><?php _e( 'Youtube', 'rebeccalite' ); ?></span></a><?php endif; ?>
    	<?php if($dribbble) : ?><a class="social-icon" href="<?php echo esc_url($dribbble); ?>" target="_blank"><i class="fab fa-dribbble"></i><span class="text"><?php _e( 'Dribbble', 'rebeccalite' ); ?></span></a><?php endif; ?>
    	<?php if($soundcloud) : ?><a class="social-icon" href="<?php echo esc_url($soundcloud); ?>" target="_blank"><i class="fab fa-soundcloud"></i><span class="text"><?php _e( 'Soundcloud', 'rebeccalite' ); ?></span></a><?php endif; ?>
    	<?php if($vimeo) : ?><a class="social-icon" href="<?php echo esc_url($vimeo); ?>" target="_blank"><i class="fab fa-vimeo-square"></i><span class="text"><?php _e( 'Vimeo', 'rebeccalite' ); ?></span></a><?php endif; ?>
        <?php if($linkedin) : ?><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fab fa-linkedin"></i><span class="text"><?php _e( 'LinkedIn', 'rebeccalite' ); ?></span></a><?php endif; ?>
    </div>
    <?php
    }
}

/**
 * Comment Layout
 */
function rebeccalite_custom_comment($comment, $args, $depth) {
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	} ?>
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
		<div class="comment-author">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="comment-content">
			<div class="author-wrap">
                <div class="author-left">
                    <?php printf( __( '<h4 class="author-name">%s</h4>', 'rebeccalite' ), get_comment_author_link() ); ?>
        			<a class="date-comment" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        			    <?php printf( __('%1$s at %2$s', 'rebeccalite'), get_comment_date(),  get_comment_time() ); ?>
                    </a>
                </div>
    			<div class="reply">
    				<?php edit_comment_link( esc_html__( '(Edit)', 'rebeccalite' ), '  ', '' );?>
    				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    			</div>
            </div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'rebeccalite' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-text"><?php comment_text(); ?></div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

if ( ! is_admin() ) {
    /**
     * Custom excerpt length
     */
    function rebeccalite_custom_excerpt_length() {
        return 100;
    }
    
    add_filter( 'excerpt_length', 'rebeccalite_custom_excerpt_length' );
}

/** Pagination */
function rebeccalite_pagination() {
    if ( get_the_posts_pagination() ) { ?>
    <div class="rebeccalite-pagination"><?php
        $args = array(
            'prev_text' => '<span class="fa fa-angle-left"></span>',
            'next_text' => '<span class="fa fa-angle-right"></span>'
        );
        the_posts_pagination($args);
    ?>
    </div>
    <?php
    }
}

/**
 * TGMPA Register
 */
function rebeccalite_register_required_plugins() {
    $plugins = array(
        array(
            'name' => __( 'Categories Images', 'rebeccalite' ),
            'slug' => 'categories-images',
        ),
        array(
            'name' => __( 'Contact Form 7', 'rebeccalite' ),
            'slug' => 'contact-form-7'
        ),
        array(
			'name' => __( 'Smash Balloon Social Photo Feed', 'rebeccalite' ),
			'slug' => 'instagram-feed'
		)
    );
    
    $config = array(
        'id'           => 'tgmpa',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'is_automatic' => true
    );
    
    tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'rebeccalite_register_required_plugins' );

/**
 * Custom walker class.
 */
class Rebeccalite_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
 
        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
 
        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param WP_Post  $item  Menu item data object.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
 
        /**
         * Filters the CSS classes applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
 
        $output .= $indent . '<li' . $id . $class_names . '>';
        
        $atts           = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        if ( '_blank' === $item->target && empty( $item->xfn ) ) {
            $atts['rel'] = 'noopener';
        } else {
            $atts['rel'] = $item->xfn;
        }
        $atts['href']         = ! empty( $item->url ) ? $item->url : '';
        $atts['aria-current'] = $item->current ? 'page' : '';
 
        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title        Title attribute.
         *     @type string $target       Target attribute.
         *     @type string $rel          The rel attribute.
         *     @type string $href         The href attribute.
         *     @type string $aria_current The aria-current attribute.
         * }
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
 
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
 
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );
 
        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
        
        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        
        if ( $depth < 2 && in_array( 'menu-item-has-children', $item->classes ) ) {
            $item_output .= '</a><span class="toggle"><i class="caret fa fa-angle-down"></i></span>';
        } else {
            $item_output .= '</a>';
        }
        $item_output .= $args->after;
 
        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string   $item_output The menu item's starting HTML output.
         * @param WP_Post  $item        Menu item data object.
         * @param int      $depth       Depth of menu item. Used for padding.
         * @param stdClass $args        An object of wp_nav_menu() arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
