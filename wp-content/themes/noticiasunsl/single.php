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
        $('#noticia img').each(function() {
            var imgSrc = $(this).attr('src');
            var imgLink = $('<a href="' + imgSrc + '"></a>'); // Corrección: cerrar la comilla en 'href'
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
    #my-calendar{
        padding: 10px;
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
            href: imgSrc,  // Utilizar la URL de la imagen como href
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