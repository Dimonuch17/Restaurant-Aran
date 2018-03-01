<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title itemprop="name">Ресторан АРАН"</title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-96495809-1', 'auto');
    ga('send', 'pageview');
  </script>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <header itemscope itemtype="http://schema.org/WPHeader">    
    <nav id="site-navigation" role="navigation" class="main-navigation navbar navbar-default navbar-fixed-top" itemscope itemtype="http://schema.org/SiteNavigationElement" >
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="menu-toggle navbar-toggle" aria-controls="menu" aria-expanded="false">
            <span class="sr-only"><?php _e( 'Toggle Navigation', 'rokophotolite' ); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>              
          </button>
          <?php
          $logourl = get_theme_mod('rokophotolite_logo_image', get_template_directory_uri().'/img/logo.png');
          if(!empty($logourl)) {
            echo '<a class="navbar-brand" href="'.esc_url( home_url( '/' ) ).'"><img src="'. esc_url( $logourl ) .'" alt="logo"></a>';
          } else {
            echo '<a class="navbar-brand" href="'.esc_url( home_url( '/' ) ).'"><h4>'. wp_kses_post( get_bloginfo( 'name' ) ) .'</h4></a>';
          }
          ?>
        </div>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu' => 'Primary Menu',
          'container' => false,
          'fallback_cb' => 'rokophotolite_new_setup',
          'items_wrap' => '<ul class="nav navbar-nav navbar-right">%3$s</ul>'
          ));
          ?> 
        </div><!-- End container -->
      </nav>
      <?php if ((is_front_page()) and (!is_paged())) { ?>
      <section id="blog" >
        <div class="dark-overlay vision">
          <div class="centered vision-border wow bounceIn">
            <?php
            $subheadtitle = get_theme_mod('rokophotolite_subhead_title',__( 'Welcome to', 'rokophotolite' ));
            if(!empty($subheadtitle)) {
              echo '<h4>'. wp_kses_post( $subheadtitle ) .'</h4>';
            }
            ?>
            <h2 itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
            <?php get_template_part( 'loop-meta' ); //Loads the loop-meta.php template. ?>
          </div>
        </div>
      </section>
      <?php } else { ?>
      <div class="space"></div>
      <?php } ?>
    </header> 