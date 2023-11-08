
<?php


function radio_sop()

{
    add_theme_support('title-tag');
}

add_action('setup', 'add_theme_support');

function linksnoticias_unsl_estilos()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('unsl_estilo-tailwindoutput', get_template_directory_uri() . "/assets/css/styles.css", array('unsl_estilo-tailwind'), $version, 'all');
    wp_enqueue_style('unsl_estilo-styles', get_template_directory_uri() . "/style.css", array(), $version, 'all');

    wp_enqueue_style('unsl_estilo-tailwind', get_template_directory_uri() . "/output.css", array(), '1.8.0', 'all');

    wp_enqueue_style('unsl_estilo-swiper', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", array(), '1.8.1', 'all');
}

add_action('wp_enqueue_scripts', 'linksnoticias_unsl_estilos');


function linksnoticias_unsl_scripts()
{

    // wp_enqueue_script('unsl_estilo-flowbite', "https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js", array(), '1.8.0', false);
    // wp_enqueue_script('unsl_estilo-tailwind', "https://cdn.tailwindcss.com", array(), '1.8.0', false);

    wp_enqueue_script('unsl_estilo-fontawesome', "https://kit.fontawesome.com/19e7896a5a.js", array(), '1.0', false);

    wp_enqueue_script('unsl_estilo-jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js", array(), '3.6.4', false);
    wp_enqueue_script('unsl_estilo-flowbite', "https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js", array(), '2.0.0', false);
    wp_enqueue_script('unsl_estilo-tailwind', "https://cdn.tailwindcss.com", array(), '3.6.4', false);


    wp_enqueue_script('unsl_estilo-swiper', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), '3.3.4', false);
}

add_action('wp_enqueue_scripts', 'linksnoticias_unsl_scripts');

function my_function_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');




//$videos = json_decode(file_get_contents());

function obtener_videos_de_youtube()
{
    $cached_results = get_transient('youtube_api_cache');
    if ($cached_results) {
        return $cached_results;
    } else {

        $canal = "UCZZWwoQL1ZpRU-8hdsrUpew";
        $max = '5';
        $playlistid = 'PLPHjzCOfwhCU8wJYO-SazoXjbzYV780UE';

        $api_url = 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=' . $canal . '&maxResults=' . $max . '&key=' . $key . '&playlistId=' . $playlistid . '';
        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            return array(); // Manejar errores de solicitud
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        set_transient('youtube_api_cache', $data, 60 * 60);

        return $data;
    }
}







?>
