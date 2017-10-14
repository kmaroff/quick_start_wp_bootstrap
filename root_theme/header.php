<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->

<head>
	
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <link rel="profile" href="http://gmpg.org/xfn/11"> 
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/favicon-16x16.png" sizes="16x16" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="loader">
		<div class="loader_inner"></div>
	</div>
	<div id="page" class="site">

		<header id="masthead" class="site-header" role="banner">
			

			<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png"></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php wp_nav_menu(array(
            'container_class' => 'menu-header',
            'menu' => 'menu',
            'theme_location' => 'primary',
            'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav navbar-right">%3$s</ul>',
            'walker' => new Bootstrap_Walker_Nav_Menu,
            )); ?>
          </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
      </nav>
			</header><!-- #masthead -->

		<div class="container">
			<div class="row">
				<div class="col-md-12">
