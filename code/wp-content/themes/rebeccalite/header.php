<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
        wp_body_open();
    ?>
    <a class="screen-reader-text skip-link" href="#content"><?php echo esc_html__( 'Skip to content', 'rebeccalite' ); ?></a>
    <?php
        $wrapper_classes  = 'site-header';
        $wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
        $blog_info        = get_bloginfo( 'name' );
        $description      = get_bloginfo( 'description', 'display' );
    ?>
    <header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>">
        <div class="container">
            <div class="site-branding">
                <?php if ( has_custom_logo() ) { ?>
                    <div class="site-logo"><?php the_custom_logo(); ?></div>
                <?php } else { ?>
                    <?php if ( $blog_info ) { ?>
                        <?php if ( is_front_page() && ! is_paged() ) { ?>
                			<h1 class="site-title"><?php echo esc_html( $blog_info ); ?></h1>
                		<?php } elseif ( is_front_page() || is_home() ) { ?>
                			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
                		<?php } else { ?>
                			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p>
                		<?php } ?>
                        <?php if ( $description ) { ?>
                    		<p class="site-description">
                    			<?php echo wp_kses_post( $description ); ?>
                    		</p>
                    	<?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <nav class="nav-second">
            <div class="container">
                <div class="nav-wrap">
                    <div class="mobile-toggle">
                        <a href="javascript:void(0)" class="open-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <div class="nav-menu">
                    <?php
            			if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu(
                                array(
                                'container'         => false,
                                'theme_location'    => 'primary',
                                'menu_class'        => 'primary-menu',
                                'menu_id'           => 'primary-menu',
                                'depth'             => 3,
                                'walker'            => new Rebeccalite_Walker_Nav_Menu()
                            ));
                        } else {  ?>
                            <a class="add-menu" href="<?php echo esc_url(home_url('/') . 'wp-admin/nav-menus.php'); ?>"><?php echo esc_html__( 'Add a menu', 'rebeccalite' ); ?></a><?php
                        }
            	     ?>
                     </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="content" class="site-container">
        <div class="container">
