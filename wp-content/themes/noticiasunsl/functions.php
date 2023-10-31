
<?php


function radio_sop()

{
    add_theme_support('title-tag');
}

add_action('setup', 'add_theme_support');

function linksnoticias_unsl_estilos()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('unsl_estilo-style', get_template_directory_uri() . "/style.css", array('unsl_estilo-flowbite'), $version, 'all');
    wp_enqueue_style('unsl_estilo-flowbite', "https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css", array(), '1.8.0', 'all');
    wp_enqueue_style('unsl_estilo-swiper', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", array(), '1.8.1', 'all');

    
}

add_action('wp_enqueue_scripts', 'linksnoticias_unsl_estilos');


function linksnoticias_unsl_scripts()
{

    wp_enqueue_script('unsl_estilo-flowbite', "https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js", array(), '1.8.0', false);

    wp_enqueue_script('unsl_estilo-fontawesome', "https://kit.fontawesome.com/19e7896a5a.js", array(), '1.0', false);

    wp_enqueue_script('unsl_estilo-jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js", array(), '3.6.4', false);

    wp_enqueue_script('unsl_estilo-swiper', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), '3.6.4', false);

 
}

add_action('wp_enqueue_scripts', 'linksnoticias_unsl_scripts');

function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');


?>
