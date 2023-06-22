<?php

// branchement du fichier CSS
function portfolio_enqueue_styles()
{
    wp_enqueue_style("style.css", get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'portfolio_enqueue_styles');

// branchement du fichier JS
function portfolio_enqueue_scripts()
{
    wp_enqueue_script('script.js', get_template_directory_uri() . '/assets/script.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'portfolio_enqueue_scripts');

// Jquery

function portfolio_scripts()
{
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'portfolio_scripts');


function portfolio_supports()
{
    // Ajouter la prise en charge des images mises en avant
    add_theme_support('post-thumbnails');
    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');
    // ajout de la gestion du menu
    add_theme_support('menus');
    // ajout du logo dans le customizer
    add_theme_support('custom-logo');
    add_theme_support('html5');
    // register_nav_menu('main', 'menu principal');
    // format des images ;
    // add_image_size('thumbnail-medium', 500, 500, true);

    // Ajouter le support des blocs Gutenberg
    add_theme_support('gutenberg', array('wide-images' => true));
}
add_action('after_setup_theme', 'portfolio_supports');



function register_my_menus()
{
    register_nav_menus(
        array(
            'main' => __('menu header'),
            'footer' => __('menu footer'),
        )
    );
}
add_action('after_setup_theme', 'register_my_menus');
