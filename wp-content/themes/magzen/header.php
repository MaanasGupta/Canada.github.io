<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package magzen 
 */
  
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	  <?php wp_body_open(); ?> 
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'magzen' ); ?></a>
    <?php do_action('magzen_before_header'); ?>
	<header id="masthead" class="site-header" role="banner">
        <?php if( is_active_sidebar( 'top-left' )  || get_theme_mod('header_show_date',true) || is_active_sidebar( 'top-right' ) ): ?>
			<div class="top-nav">   
				<div class="container">	  	
					<div class="eight columns alpha">
						<div class="cart-left"> 
							<?php dynamic_sidebar('top-left' ); ?>
						</div>
					</div>                  

					<div class="eight columns omega">
						<div class="cart-right clearfix"><?php
							 dynamic_sidebar('top-right' );  
							 if( get_theme_mod('header_show_date',true) ):			                   
			                    echo '<span class="header-date">'. date('l, M j, Y').'</span>'; 
	                        endif; ?>
						</div>
					</div>
				</div>
			</div> <!-- .top-nav -->
		<?php endif;?>

        <div class="container">
		   <div class="branding header-image clearfix">
				<div class="five columns alpha">
					<div class="site-branding">
						<?php 
							$logo_title = get_theme_mod( 'logo_title' );   
							$tagline = get_theme_mod( 'tagline',true);
							if( $logo_title && function_exists( 'the_custom_logo' ) ) :
                                the_custom_logo();     
                            else : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
						<?php if( $tagline ) : ?>
								<p class="site-description"><?php bloginfo( 'description' ); ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div>
				<div class="eleven columns omega">
					<div class="header-right">
	                     <?php if ( is_active_sidebar('header-right') ) {
	                          dynamic_sidebar('header-right');
	                     } ?>
					</div>
				</div>
			</div>
		</div>
				
		<div class="container">
			<div class="nav-wrap clearfix"><?php
			if ( get_theme_mod ('header_search',true) ){ ?>
				<div class="thirteen columns">
					<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
						<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-align-justify fa-2x" aria-hidden="true"></i></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_id' => 'primary-menu'  ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
				<div class="three columns">
					<div class="header-search-box">
					   <?php get_search_form(); ?>
					</div>
				</div><?php 
			}else{ ?>
			    <div class="sixteen columns">
					<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
						<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-align-justify fa-2x" aria-hidden="true"></i></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			<?php } ?>
			</div>
		</div>     
		<?php if( get_theme_mod('header_breaking_news',true) && is_front_page() ): 
		    do_action('magzen_header_breaking_news');
		endif; ?>

	</header><!-- #masthead --> 

	<?php if ( ! is_home() && ! is_front_page() && ! is_search() && !is_archive() && !is_404() )  { 
	    get_template_part( 'template-parts/breadcrumb' ); 
	} ?>
	
<div id="content" class="site-content">

	<?php if ( function_exists( 'is_woocommerce' ) || function_exists( 'is_cart' ) || function_exists( 'is_chechout' ) ) :
	if ( is_woocommerce() || is_cart() || is_checkout() ) { 
		if ( ! is_home() && ! is_front_page() && ! is_search() && !is_archive() && !is_404() )  { 
	        $breadcrumb = get_theme_mod( 'breadcrumb',true ); ?>    
		   <div class="breadcrumb">
				<div class="container">
					<div class="breadcrumb-left eight columns">
						<h4><?php woocommerce_page_title(); ?></h4>   			
					</div>
					<?php if( $breadcrumb ) : ?>
						<div class="breadcrumb-right eight columns">
							<?php woocommerce_breadcrumb(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
	<?php } 
}
	endif; ?>
