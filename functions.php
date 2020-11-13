<?php /** @package tavi-today-theme */

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('Bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css');
    // Scripts required for bootstrap to function properly
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js');
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    wp_enqueue_script('BootstrapJS', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    wp_enqueue_script('font-awesome-JS', 'https://kit.fontawesome.com/6a46a5ec76.js');

  
  wp_enqueue_script('flickity-js', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js');
  wp_enqueue_style('flickity-css', 'https://unpkg.com/flickity@2/dist/flickity.min.css');
  
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function tavi_today_register_elementor_core_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_all_core_location();

}
add_action( 'elementor/theme/register_locations', 'tavi_today_register_elementor_core_locations' );

function tavi_today_register_elementor_custom_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_location(
        'ribbon',
        [
            // The location label in Elementor.
            'label' => __( 'Ribbon', 'tavi-today' ),
            // Whether to display all the template belong to this location (true) or only the best match (false).
            // Default is false, to display the best match template in the location.
            'multiple' => false,
            // Whether to this template is edited in the content area or the theme uses this location in the layout.
            // Default is true, edit in the content area.
            'edit_in_content' => false,
        ]
    );
}
add_action( 'elementor/theme/register_locations', 'tavi_today_register_elementor_custom_locations' );

