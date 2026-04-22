<?php
/**
 * Kroppsam functions and definitions
 */

if ( ! function_exists( 'kroppsam_setup' ) ) :
function kroppsam_setup() {
    // Grundläggande stöd
    load_theme_textdomain( 'samkropp' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

    // Registrera alla menyer på ett ställe
    register_nav_menus( array(
        'menu-1'      => esc_html__( 'Huvudmeny (Desktop/Mobil)', 'samkropp' ),
        'footer-menu' => esc_html__( 'Footer-meny', 'samkropp' ),
    ) );
}
endif;
add_action( 'after_setup_theme', 'kroppsam_setup' );

/**
 * Enqueue scripts and styles.
 */
function kroppsam_scripts_and_styles() {
    // CSS med versionering baserat på filändring (motverkar cache-problem)
    wp_enqueue_style( 
        'kroppsam-style', 
        get_stylesheet_uri(), 
        array(), 
        file_exists( get_stylesheet_directory() . '/style.css' ) ? filemtime( get_stylesheet_directory() . '/style.css' ) : '1.0' 
    );

    // JS för hamburgermeny
    wp_enqueue_script( 
        'kroppsam-menu', 
        get_template_directory_uri() . '/js/menu.js', 
        array(), 
        '1.0', 
        true 
    );
}
add_action( 'wp_enqueue_scripts', 'kroppsam_scripts_and_styles' );

/**
 * Funktion för att visa kategorier (filtrerar bort Okategoriserat)
 * Används i index.php och page-all.php för att undvika duplicerad kod.
 */
function kroppsam_post_categories() {
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        $cat_output = array();
        foreach ( $categories as $category ) {
            if ( $category->slug !== 'uncategorized' && $category->name !== 'Okategoriserat' ) {
                $cat_output[] = esc_html( $category->name );
            }
        }
        if ( ! empty( $cat_output ) ) {
            echo '<div class="category-wrapper">' . implode( ', ', $cat_output ) . '</div>';
        }
    }
}

/**
 * Shortcode: [visa_forfattare]
 */
add_shortcode('visa_forfattare', function() {
    $author_data = '';
    if ( function_exists( 'coauthors' ) ) {
        $author_data = coauthors(null, null, null, null, false);
    } else {
        $author_data = get_the_author();
    }
    // Säkerställ utmatning med esc_html
    return '<div class="author-wrap"><span class="label">' . esc_html__('Text:', 'samkropp') . '&nbsp;</span> ' . wp_kses_post($author_data) . '</div>';
});

/**
 * Customizer-inställningar för aktuell utgåva
 */
function kroppsam_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'kroppsam_issue_section' , array(
        'title'      => esc_html__( 'Aktuell utgåva', 'samkropp' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'kroppsam_issue_text' , array(
        'default'           => 'Nummer 1, 2026: Privatiseringar',
        'sanitize_callback' => 'sanitize_text_field', // Säkerhet: tvättar input
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'kroppsam_issue_control', array(
        'label'    => esc_html__( 'Utgåvans namn/nummer', 'samkropp' ),
        'section'  => 'kroppsam_issue_section',
        'settings' => 'kroppsam_issue_text',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'kroppsam_customize_register' );

/**
 * Ta bort onödigt "skräp" från wp_head för snabbare och säkrare sida
 */
function kroppsam_cleanup_head() {
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
}
add_action( 'init', 'kroppsam_cleanup_head' );

/**
 * Ta bort länkar från taggar globalt
 */
add_filter( 'term_links-post_tag', function( $links ) {
    return array_map( 'strip_tags', $links );
} );