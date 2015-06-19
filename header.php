<!DOCTYPE html>
<html>
<head>
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href = "<?php bloginfo('stylesheet_url') ?>" rel = "stylesheet">
<?php wp_head(); ?>
</head>
<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>
<!-- Navigation -->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <?php if ( get_theme_mod( 'potw_logo' ) ) : ?>
      <a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><img src='<?php echo esc_url( get_theme_mod( 'potw_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
      <?php else : ?>
      <a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
      <?php bloginfo( 'name' ); ?>
      </a>
      <?php endif; ?>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php
	            			wp_nav_menu( array(
	                		'menu'              => 'primary',
	                		'theme_location'    => 'primary',
	                		'depth'             => 2,
	                		'menu_class'        => 'nav navbar-nav navbar-right',
	                		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                		'walker'            => new wp_bootstrap_navwalker())
	            			);
	        			?>
    </div>
    <!-- .navbar -->
  </div>
  <!-- .container -->
</nav>
<div class = "container">
