<?php get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post();
?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


            <div class="w-full py-12">
                <div class="flex justify-center">
                    <div class="max-w-screen-md w-full  p-3" id="noticia">
                        <div class="flex items-center gap-3">
                            <button onclick="tipografia();">Dislexia</button>
                            <button onclick="blancoynegro();">Blanco y negro</button>
                            <button onclick="sintesisdevoz();">Síntesis de voz</button>
                        </div>
                        <header class="entry-header">
                            <h1 class="text-4xl"><?php the_title(); ?></h1>
                        </header>
                        <?php
                        the_content();
                        ?>

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


/*
    jQuery(document).ready(function($) {
        console.log("aa");
        // Selecciona todas las imágenes en el contenido
        $('#noticia img').each(function() {
            // Obtiene el contenedor padre de la imagen
            var parentFigure = $(this).closest('figure.wp-block-gallery');

            // Obtiene la URL de la imagen
            var imgSrc = $(this).attr('src');
            // Crea un enlace alrededor de la imagen
            var imgLink = $('<a href="' + imgSrc + '" class="fbx-link" />');

            // Verifica si la imagen está dentro de un contenedor con la clase wp-block-gallery
            if (parentFigure.length > 0) {
                // Si está dentro de una galería, agrega el atributo rel="gallery" al enlace
                imgLink.attr('rel', 'gallery');
            }

            // Envuelve la imagen con el enlace
            $(this).wrap(imgLink);
        });
    });
    */
</script>

<style>
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
        font-family: opendyslexic;
    }

    header h1 {
        padding: 15px 0;
    }

    #noticia p {
        padding: 10px 0 !important;
    }

    #noticia a {
        color: blue;
    }

    figure img {
        width: 100% !important;
        height: 100% !important;
    }
</style>
<!--FIN PRUEBAS PARA NOTICIAS.UNSL.EDU.AR -->
<?php get_footer(); ?>