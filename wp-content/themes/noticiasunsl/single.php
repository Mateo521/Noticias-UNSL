<?php get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post();
?>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/css/lightbox.min.css">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


            <div class="w-full py-12">
                <div class="flex justify-center">
                    <div class="max-w-screen-md w-full  p-3" id="noticia">
                        <div class="flex items-center gap-3">
                            <button onclick="tipografia();">Dislexia</button>
                            <button onclick="blancoynegro();">Blanco y negro</button>
                            <button id="boton">Síntesis de voz</button>
                        </div>
                        <header class="entry-header">



                            <p class="font-bold text-blue-800"><?php echo get_the_date(); ?></p>
                            <h1 class="text-4xl"><?php the_title(); ?></h1>
                            <?php $categories = get_the_category();

                            foreach ($categories as $index => $category) {
                                if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
                                    $category_link = get_category_link($category->term_id); // Obtenemos el enlace de la categoría
                                    echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';

                                    if ($index !== count($categories) - 1) {
                                        echo ', '; // Agregar coma y espacio entre categorías
                                    }
                                }
                            }



                            if (has_post_thumbnail()) {
                                echo '<div class="post-thumbnail">';
                                the_post_thumbnail();
                                echo '</div>';
                            }
                            ?>

                        </header>
                        <?php
                        the_content();
                        ?>
                        <div class="bg-gray-200 p-2">
                            <?php
                            function get_related_posts_ids($post_id, $num_posts = 4)
                            {
                                $related_posts_ids = array();

                                // Obtén las categorías de la entrada actual
                                $categories = wp_get_post_categories($post_id);

                                // Configura los argumentos para la consulta de publicaciones relacionadas
                                $args = array(
                                    'category__in'   => $categories,
                                    'post__not_in'   => array($post_id),
                                    'posts_per_page' => $num_posts,
                                    'orderby'        => 'rand', // Cambia a 'date' si prefieres ordenar por fecha
                                );

                                // Realiza la consulta de publicaciones relacionadas
                                $related_posts_query = new WP_Query($args);

                                // Recorre los resultados y obtén los IDs de las publicaciones
                                while ($related_posts_query->have_posts()) {
                                    $related_posts_query->the_post();
                                    $related_posts_ids[] = get_the_ID();
                                }

                                // Restaura los datos originales de la publicación
                                wp_reset_postdata();

                                return $related_posts_ids;
                            }

                            // Uso en single.php
                            $current_post_id = get_the_ID();
                            $related_posts_ids = get_related_posts_ids($current_post_id);

                            // Muestra los títulos de las publicaciones relacionadas
                            if (!empty($related_posts_ids)) {
                            ?>
                                <div class="flex gap-3">
                                    <p> Seguir leyendo:</p>
                                </div>


                                <?php
                                foreach ($related_posts_ids as $related_post_id) {
                                    echo '<p class="my-1" style="border-left:solid #163387 3px;"><a class="p-1" href="' . get_permalink($related_post_id) . '">-' . get_the_title($related_post_id) . '</a></p>';
                                }
                            } else {
                                ?>
                                <p>No hay noticias relacionadas.</p>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
<?php
    endwhile;
endif;

?>




<!-- PRUEBAS PARA NOTICIAS.UNSL.EDU.AR -->
<script>
    function tipografia() {
        document.body.classList.toggle("tipog");
    }

    function blancoynegro() {
        document.documentElement.classList.toggle("grayscale");
    }

    var button = true;

    function synthesisVoice() {
        var synth = window.speechSynthesis;
        var textContent = document.getElementById('noticia').innerText;
        var voices = synth.getVoices();
        var utterance = new SpeechSynthesisUtterance(textContent);

        console.log('Texto a sintetizar:', textContent);

        if (button) {
            utterance.voice = voices.find(function(voice) {
                return voice.name === 'Monica';
            }) || voices[0];

            console.log('Voz seleccionada:', utterance.voice);

            synth.speak(utterance);
            button = false;
            console.log('Iniciando síntesis de voz...');
        } else {
            button = !button;
            synth.cancel();
            console.log('Deteniendo síntesis de voz.');
        }
    }

    document.getElementById('boton').addEventListener('click', synthesisVoice);


    /*
        jQuery(document).ready(function($) {
        $('#noticia img').each(function() {
            var imgSrc = $(this).attr('src');
            var imgLink = $('<a href="' + imgSrc + '"></a>'); // Corrección: cerrar la comilla en 'href'
            $(this).wrap(imgLink);
        });
    });



    */
</script>







<style>
    /*
    a, a:hover, a:focus, a:visited{
        color: inherit;
        text-decoration: none;
    }
    */
    @font-face {
        font-family: 'OpenDyslexic-Regular';
        src: url(<?php echo get_template_directory_uri() . '/assets/fonts/OpenDyslexic-Regular.otf'; ?>) format('opentype');
    }



    html {
        transition: filter 1s;
        /* Change "1s" to any time you'd like */
    }

    html.grayscale {
        /* grayscale(1) makes the website grayscale */
        -webkit-filter: grayscale(1);
        filter: grayscale(1);
    }

    .tipog {
        font-family: 'OpenDyslexic-Regular', sans-serif;
    }




    header h1 {
        padding: 15px 0;
    }

    #noticia p {
        padding: 10px 0 !important;
    }

    /*
    #noticia a {
        color: blue;
    }
*/
    figure img {
        width: 100% !important;
        height: 100% !important;
    }
</style>

<!-- 
CATEGORIAS: 

INSTITUCIONAL
CIENCIA
SOCIEDAD
ENTREVISTAS
CULTURA
AGENDA UNIVERSITARIA
LABORATORIOS
UNSL

 -->

<!--FIN PRUEBAS PARA NOTICIAS.UNSL.EDU.AR -->


<script>
    jQuery(document).ready(function($) {
        $('#noticia img').each(function(index) {
            var imgSrc = $(this).attr('src');

            // Verificar si la imagen tiene un componente padre <figure class="wp-block-gallery">
            var hasGalleryParent = $(this).parents('figure.wp-block-gallery').length > 0;

            // Crear el elemento <a> con el formato deseado
            var imgLink = $('<a>', {
                href: imgSrc, // Utilizar la URL de la imagen como href
                'data-lightbox': hasGalleryParent ? 'img-gallery' : 'img-' + (index + 1) // Utilizar un valor diferente si hay un componente padre de galería
            });

            // Crear el elemento <img> y establecer su atributo src
            var imgElement = $('<img>', {
                src: imgSrc
            });

            // Envolver la imagen con el enlace y reemplazarla en el DOM
            $(this).wrap(imgLink).after(imgElement).remove();
        });
    });
</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/js/lightbox-plus-jquery.js"></script>

<?php get_footer(); ?>