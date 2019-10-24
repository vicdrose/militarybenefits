<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

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
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129284873-1"></script>
		
		<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());

  		gtag('config', 'UA-129284873-1');
		</script>

		<?php wp_head(); ?>


<!-- dynamically set ad sizes based on screen width: -->
<script>
var screenSize='';
var adSlotSizes={'small':[300,250],'medium':[728,90],'large':[728,90]};
if (window.innerWidth<=600) {
	screenSize='small';
} else if (window.innerWidth>600 && window.innerWidth<1024) {
	screenSize='medium';
} else if (window.innerWidth>=1024) {
	screenSize='large';
}
console.log('screenSize='+screenSize);
console.dir(adSlotSizes[screenSize]);
</script>
<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
<script>
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
</script>
<script>
	googletag.cmd.push(function() {
		/* header: responsive */
		googletag.defineSlot('/76676382/mmb_infeed_728x90-1', adSlotSizes[screenSize], 'div-gpt-ad-1544217599432-0').addService(googletag.pubads());

		/* sidebar */
		googletag.defineSlot('/76676382/MMB-300x250-sidebar', [300,250], 'div-gpt-ad-1544053121945-0').addService(googletag.pubads());
		googletag.enableServices();
	});
</script>
<style type="text/css">
.ad-ctnr, .ad-ctnr--resp {
	border:1px solid #eee;
	background-color:#fff;
	margin:0 auto;
}
.ad-ctnr--300x250, .ad-ctnr--resp.ad-ctnr--resp--300x250 {
	width:300px;
	height:250px;
}
.ad-ctnr--728x90, .ad-ctnr--resp.ad-ctnr--resp--728x90{
	width:728px;
	height:90px;
}
</style>
<!-- end dynamic ad sizes -->


	</head>
	<style>
		em{
			word-break: break-all;
		 }

		a{
			color:#355177;
		}
		/*.customnav {
			margin-top: 15px;
			margin-left:50px;
		}*/
		.dropdown-toggle::after{
			display: none;
		}

		@media only screen and (min-width: 1200px) { /* Extra Large */
			.customnav {
				margin-top: 15px !important;
				margin-left: 100px !important;
			}
			.menubtns {
				padding: 10px 16px 10px 16px; 

			}
		}

		@media only screen and (max-width: 1199px) { /* Large */
			.customnav {
				margin-top: 15px !important;
				margin-left: 0px !important ;
			}
			.menubtns {
				padding: 10px 10px 10px 10px; 

			}
			#dropdownsearch {
				width: 310px;
				transform: translate(70px, 68px);
			}
		}

		
		@media only screen and (max-width: 992px) { /* Medium */
			.customnav {
				margin-top: 0px !important;
				margin-left: 0px !important ;
			}
			#dropdownsearch {
				width: 310px;
				transform: translate(0px, 0px)!important;
			}
		}
		
		@media only screen and (max-width: 768px) { /* Small */
			.customnav {
				margin-top: 0px !important;
				margin-left: 0px !important ;
			}
			#dropdownsearch {
				width: 310px;
				transform: translate(0px, 0px)!important;
			}
		}

		@media only screen and (max-width: 768px) { /* Small */
			.customnav {
				margin-top: 0px !important;
				margin-left: 0px !important ;
			}
			#dropdownsearch {
				width: 310px;
				transform: translate(0px, 0px);
			}
		
		}
	</style>
	<body <?php body_class(); ?>>

		<nav class="navbar navbar-expand-lg fixed-top" style="background-color: white; color: #355177;border-bottom:1px darkgrey solid;">
			<div class="container">

			<a class="navbar-brand" style="max-width: 70%;" href="<?php echo home_url(); ?>" rel="nofollow"><img class="logo img-fluid" src="<?php echo bones_theme_uri(); ?>/library/img/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" style="width:330px;"></a>
			<button class="custom-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="custom-toggler navbar-toggler-icon"></span>
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
	'link_before'     => '<span class="menubtns" style="color:#254479;">',                              // before each link
	'link_after'      => '</span>',                             // after each link
	'depth'           => 0,                                     // limit the depth of the nav
	'fallback_cb'     => '',                                    // fallback function (if there is one)
	'items_wrap'      => '<ul id="%1$s" class="%2$s " style="font-weight: 700;text-transform:uppercase;">%3$s<i class="fa fa-search" id="searchglass" style="font-size:18px;color: #254479;padding: 10px;"></i></ul>',
	'walker'          => new Walker_Bootstrap_Menu(),
)); ?>
				
<div id="dropdownsearch" style="display:none; background-color: white; border: 1px darkgrey solid; transform:translate(0px,68px);"><form class="form-inline my-2 my-lg-0" action="/" style="padding: 10px;" method="get">
					<input class="form-control mr-sm-2" name="s" type="text" placeholder="Search" aria-label="Search" style="border: 1px darkgrey solid;">
					<button class="btn my-2 my-sm-0" type="submit" style="color:white;background-color:#254479;border: 1px darkgrey solid;">Search</button>
				</form></div>

			</div>
			<!-- <button onclick="nightmode()">night mode</button> -->
			</div><br>
			
		</nav>
		
		<!-- ad placeholder replaced with div and margin -->
		<!--<div class="text-center" style="background-color:#ad2a2a;color:white;margin-top: 80px;margin-left:10%;margin-right:10%;border: 1px #f5f5f5 solid;" ></div>-->
		<!-- <div class="text-center" style="background-color:#ad2a2a;color:white;margin-top: 99px;margin-left:10%;margin-right:10%;height:90px;border: 1px #f5f5f5 solid;" >AD</div> -->

<br><br><br><br><br>
<div class="ad-ctnr--resp">
<!-- /76676382/mmb_infeed_728x90-1 -->
<div id="div-gpt-ad-1544217599432-0">
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1544217599432-0'); });
</script>
</div>
</div><!-- /.ad-ctnr--resp -->
