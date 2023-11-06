<?php get_header(); ?>



<?php


while (have_posts()) :
    the_post();

    // Obtiene la fecha de la entrada
    $year = get_the_date('Y');
    $month = get_the_date('m');
    $day = get_the_date('d');
    // Obtiene el título de la entrada
    $title = sanitize_title(get_the_title());
    $entry_title = get_the_title();
    $entry_tags = get_the_tags();
    $categories = get_the_category();
    // Construye la URL de la entrada
    $spotify_url = get_post_meta(get_the_ID(), 'spotify-podcast-url', true);

    $entry_url = home_url("$year/$month/$day/$title");
    $entry_date = get_the_date('d/m/Y');
    // Muestra el contenido de la entrada
    $content = get_the_content();
    // $content = preg_replace('/<p\s+id="subtitulo"[^>]*>.*?<\/p>/i', '', $content); elimina subtitulos
    $fragments = preg_split('/(<img[^>]+>)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);

    preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    //  $image_url = isset($matches[1]) ? $matches[1] : '';


    $imagenes = array();
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);

    if (!empty($matches[1])) :
        foreach ($matches[1] as $image_url) :
            $imagenes[] = $image_url;
        endforeach;
    endif;


    $is_podcast = false;

    foreach ($categories as $category) {
        if ($category->slug === 'podcast') {
            $is_podcast = true;
            break;
        }
    }
?>

<?php
endwhile; // Fin del loop.

?>
<?php
if ($is_podcast) :
?>
    <div class="flex w-full justify-center p-8 text-white" style="background: rgb(7,55,106); background: linear-gradient(180deg, rgba(7,55,106,1) 0%, rgba(0,0,0,1) 100%);">
        <div class="max-w-screen-xl w-full">
            <div class="flex w-full gap-8 justify-between" id="infos-podcasts">
                <div class="p-6 w-full">
                    <!-- CATEGORÍAS  -->
                    <!--
           <?php
            if (!empty($categories)) {
                echo '<h5 class=" text-md font-bold tracking-tight" style="text-transform:uppercase;">';

                foreach ($categories as $index => $category) {
                    if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
                        $category_link = get_category_link($category->term_id); // Obtenemos el enlace de la categoría
                        echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';

                        if ($index !== count($categories) - 1) {
                            echo ' '; // Agregar coma y espacio entre categorías
                        }
                    }
                }

                echo '</h5>';
            } ?>
-->
                    <?php
                    if ($entry_tags) : ?>
                        <?php foreach ($entry_tags as $tag) : ?>
                            <p class="rounded-lg text-white p-1  inline-flex" style="background-color: #1476B3; font-size:13px;"><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <p class="subtitulos font-bold pb-3"> </p>

                    <p class="subtextos"></p>

                    <div class="podcasts"></div>
                </div>
                <div style="max-width:205px;" class="w-full h-full">
                    <? if (count($imagenes) > 1) : ?>
                        <img class=" rounded-md" style="height:205px;" id="thumb" src="<?php echo esc_url($imagenes[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <? else : ?>
                        <img class=" rounded-md" style="height:205px;" id="thumb" src="<?php echo esc_url($imagenes[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <? endif; ?>
                </div>
            </div>

        </div>

    </div>



<?php endif; ?>



<?php


if ($spotify_url) :
?>
    <iframe src="<?php echo esc_url($spotify_url) ?>"></iframe>

<?php
endif;

?>
<div class="flex w-full justify-center p-8 bg-white" id="noticia">
    <div class="max-w-screen-md w-full" id="txt-in">

        <h1 class="md:text-4xl text-2xl my-3" style="color:#07376A;"><?php echo esc_html($entry_title); ?></h1>

        <div class="flex gap-3 items-center">

            <!-- CATEGORÍAS  -->
            <?php

            if (!empty($categories)) {
                echo '<h5 class=" text-md font-bold tracking-tight" style="text-transform:uppercase;">';

                foreach ($categories as $index => $category) {
                    if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
                        $category_link = get_category_link($category->term_id); // Obtenemos el enlace de la categoría
                        echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';

                        if ($index !== count($categories) - 1) {
                            echo ', '; // Agregar coma y espacio entre categorías
                        }
                    }
                }

                echo '</h5>';
            }
            if ($entry_tags) : ?>
                <?php foreach ($entry_tags as $tag) : ?>
                    <p class="rounded-lg text-white p-1  inline-flex" style="background-color: #1476B3; font-size:13px;"><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <p> <?php echo esc_html($entry_date); ?></p>

        </div>



        <?php
// Obtén el contenido de la entrada actual
$content = get_the_content();

// Divide el contenido en fragmentos separados por etiquetas <img>
$content_fragments = preg_split('/<img[^>]+>/', $content);

// Busca todas las imágenes en el contenido
preg_match_all('/<img[^>]+>/i', $content, $matches);

// Combina los fragmentos de texto y las imágenes en el mismo orden
$combined_content = '';
foreach ($matches[0] as $index => $image_tag) {
    $combined_content .= $content_fragments[$index];
    // Agrega el estilo "width: 100%;" para que la imagen se ajuste al 100% del contenedor
    $combined_content .= str_replace('<img', '<img style="width: 100%;"', $image_tag);
}

// Añade cualquier fragmento de texto restante
if (count($content_fragments) > count($matches[0])) {
    $combined_content .= end($content_fragments);
}

// Muestra el contenido combinado
echo '<div class="combined-content">' . $combined_content . '</div>';
?>


        
        <!-- PRUEBAS PARA NOTICIAS.UNSL.EDU.AR -->
        <div class="flex items-center gap-3">
            <button onclick="tipografia();">Dislexia</button>
            <button onclick="blancoynegro();">Blanco y negro</button>
            <button onclick="sintesisdevoz();">Síntesis de voz</button>
        </div>
        <script>
            function tipografia() {
                document.body.classList.toggle("tipog");
            }

            function blancoynegro() {
                document.body.classList.toggle("grayscale");
            }
            var buton = true;

            function sintesisdevoz() {
                var synth = window.speechSynthesis;
                let textContent = document.getElementById('noticia').innerText;

                var voices = synth.getVoices();
                var utterance = new SpeechSynthesisUtterance(textContent);

                if (buton) {


                    utterance.voice = voices.filter(
                        function(voice) {
                            return voice.name == 'Monica';
                        })[0];

                    synth.speak(utterance);

                    buton = false;
                } else {
                    buton = !buton;
                    synth.cancel();
                }


            }
        </script>

        <style>
            body {
                transition: filter 1s;
                /* Change "1s" to any time you'd like */
            }

            body.grayscale {
                /* grayscale(1) makes the website grayscale */
                -webkit-filter: grayscale(1);
                filter: grayscale(1);
            }

            .tipog {
                font-family: opendyslexic;
            }
        </style>
        <!--FIN PRUEBAS PARA NOTICIAS.UNSL.EDU.AR -->
        <?php get_footer(); ?>