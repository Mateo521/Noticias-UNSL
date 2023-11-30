
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

function obtener_videos_de_youtube() {
    $cached_results = get_transient('youtube_api_cache');
    
    if ($cached_results) {
        return $cached_results;
    } else {
        $max = '5';
        $playlistid = 'PLPHjzCOfwhCU8wJYO-SazoXjbzYV780UE'; //institucional
        $key = 'AIzaSyAvh2BevU2XW1faitCTmmBKzJAaRLMBRY0';
        $api_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=$playlistid&maxResults=$max&key=$key&order=date";
       $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            // Manejar errores de solicitud
            error_log('Error al obtener videos de YouTube: ' . $response->get_error_message());
            return array();
        }
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        if (isset($data['error'])) {
            // Manejar errores de la API de YouTube
            error_log('Error en la API de YouTube: ' . json_encode($data['error']));
            return array();
        }
        set_transient('youtube_api_cache', $data, 60 * 60);
        return $data;
    }
}






function my_pagination($args = array())
{
    global $wp_query;
    $output = '';

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $pagination_args = array(
        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'total'        => $wp_query->max_num_pages,
        'current'      => max(1, get_query_var('paged')),
        'format'       => '?paged=%#%',
        'show_all'     => false,
        'type'         => 'plain',
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        //'prev_text'    => __( '&laquo; Prev', 'text-domain' ),
        //'next_text'    => __( 'Next &raquo;', 'text-domain' ),
        //'prev_text'    => __( '&lsaquo; Prev', 'text-domain' ),
        //'next_text'    => __( 'Next &rsaquo;', 'text-domain' ),
        'prev_text'    => sprintf(
            '<i></i> %1$s',
            apply_filters(
                'my_pagination_page_numbers_previous_text',
                __('Newer Posts', 'text-domain')
            )
        ),
        'next_text'    => sprintf(
            '%1$s <i></i>',
            apply_filters(
                'my_pagination_page_numbers_next_text',
                __('Older Posts', 'text-domain')
            )
        ),
        'add_args'     => false,
        'add_fragment' => '',

        // Custom arguments not part of WP core:
        'show_page_position' => false, // Optionally allows the "Page X of XX" HTML to be displayed.
    );

    $pagination_args = apply_filters('my_pagination_args', array_merge($pagination_args, $args), $pagination_args);

    $output .= paginate_links($pagination_args);

    // Optionally, show Page X of XX.
    if (true == $pagination_args['show_page_position'] && $wp_query->max_num_pages > 0) {
        $output .= '<span class="page-of-pages">' .
            sprintf(__('Page %1s of %2s', 'text-domain'), $pagination_args['current'], $wp_query->max_num_pages) .
            '</span>';
    }

    return $output;
}

function cargar_scripts_eventon() {
    wp_deregister_script('eventon');
    wp_register_script('eventon', 'http://localhost/Noticias-UNSL/wp-content/plugins/eventon/assets/js/eventon_functions.js', array('jquery'), '1.0', true);
    wp_enqueue_script('eventon');
}
add_action('wp_enqueue_scripts', 'cargar_scripts_eventon');


add_image_size('size_thumbnail',400, 400, true);

?>
