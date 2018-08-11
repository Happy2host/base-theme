<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta name="author" content="https://happy2host.com">
	<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url');?>/fav.png">
	<meta property="og:title" content="">
	<meta property="og:type" content="website">
	<meta property="og:description" content=".">
	<meta property="og:site_name" content="">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<!--<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />-->

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/styles.min.css" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,900' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>	
		<section>
			<div class="flex-row flex-wrap padded">
				<div class="flex flex-1">
					<a class="logo" accesskey="h" href="<?php bloginfo('siteurl');?>">
						<img src="<?php bloginfo('template_url');?>/images/logo.png" alt="<?php bloginfo('sitename');?>">
					</a>
					<div class="menu-btn">
						<!-- https://jonsuh.com/hamburgers/ -->
						<button class="hamburger hamburger--here" type="button">
						  <span class="hamburger-box">
						    <span class="hamburger-inner"></span>
						  </span>
						</button>
					</div>	
					<nav>
						<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					</nav>	
				</div>
			</div>
		</section>
	</header>
	<?php if (is_home()){ ?>
	<?php } else { ?>
	<?php } ?>
	<main role="main">