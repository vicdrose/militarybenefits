<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title><?php wp_title(''); ?></title>

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="apple-touch-icon" href="<?php echo bones_theme_uri(); ?>/library/img/apple-touch-icon.png">
		<link rel="icon" href="<?php echo bones_theme_uri(); ?>/favicon.png">
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo bones_theme_uri(); ?>/library/img/win8-tile-icon.png">
		<meta name="theme-color" content="#121212">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel='stylesheet' id='googleFonts-css'  href='https://fonts.googleapis.com/css?family=Libre+Baskerville%3A400%2C400i%2C700%7COpen+Sans%3A300%2C400%2C800' type='text/css' media='all' />

		<?php wp_head(); ?>

	</head>
	<style>
		a{
			color:#355177;
		}
	</style>
	<body <?php body_class(); ?>>

		<nav class="navbar navbar-expand-lg fixed-top" style="background-color: white; color: #355177;border-bottom:1px darkgrey solid;">
			<div class="container">
			<a class="navbar-brand" href="<?php echo home_url(); ?>" rel="nofollow"><img class="logo" style="width:330px" src="<?php echo bones_theme_uri(); ?>/library/img/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
			<button class="custom-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="custom-toggler navbar-toggler-icon" style="background-image:url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.7)"></span>
			</button>

			<div class="collapse navbar-collapse customnav" id="navbarsExampleDefault">
<?php wp_nav_menu(array(
	'container'       => false,                                 // remove nav container
	'container_class' => '',                                    // class of container (should you choose to use it)
	'menu'            => 'Primary Menu',                        // nav name
	'menu_class'      => 'navbar-nav mr-auto',                  // adding custom nav class
	'theme_location'  => 'main-nav',                            // where it's located in the theme
	'before'          => '',                                    // before the menu
	'after'           => '',                                    // after the menu
	'link_before'     => '<span style="padding: 10px; color: #254479;">',                              // before each link
	'link_after'      => '</span>',                             // after each link
	'depth'           => 0,                                     // limit the depth of the nav
	'fallback_cb'     => '',                                    // fallback function (if there is one)
	'items_wrap'      => '<ul id="%1$s" class="%2$s " style="font-weight: 700;text-transform:uppercase;">%3$s</ul>',
	'walker'          => new Walker_Bootstrap_Menu(),
)); ?>
				<!-- <form class="form-inline my-2 my-lg-0" action="/" method="get">
					<input class="form-control mr-sm-2" name="s" type="text" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form> -->
			</div>
			</div>
		</nav>
		<div class="text-center" style="background-color:#ad2a2a;color:white;margin-top:111px;margin-left:10%;margin-right:10%;height:90px;" >AD</div>
