<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary-content">Hoppa till innehållet</a>
<header role="banner">
  <div class="title">
    <?php if ( is_front_page() || is_home() ) : ?>
        <h1>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
          </a> 
        </h1>
    <?php else : ?>
        <p class="site-title">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
          </a> 
        </p>
    <?php endif; ?>
    
    <h2><?php echo esc_html( get_theme_mod( 'kroppsam_issue_text', 'Nummer 1, 2026: Privatiseringar' ) ); ?></h2>
  </div>

  <nav id="site-navigation" class="main-navigation">
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="screen-reader-text">Meny</span>
      </button>

      <?php
      wp_nav_menu( array(
          'theme_location' => 'menu-1', // Se till att du registrerat denna i functions.php
          'menu_id'        => 'primary-menu',
          'container'      => 'div',
          'container_class' => 'menu-container',
      ) );
      ?>
    </nav>

  </header>