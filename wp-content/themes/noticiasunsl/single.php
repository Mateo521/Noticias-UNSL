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
</style>
<!--FIN PRUEBAS PARA NOTICIAS.UNSL.EDU.AR -->
<!--
<section>
    <h3>Two Individual Images</h3>
    <div>
        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-1.jpg" data-lightbox="example-1">
            <img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-1.jpg" alt="image-1" />
        </a>
        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-2.jpg" data-lightbox="example-1" data-title="Optional caption.">
            <img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-2.jpg" alt="image-1" />
        </a>
    </div>

    <div>
        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-1.jpg" data-lightbox="img-1">
            <img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-1.jpg" alt="image-1" />
        </a>
        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-2.jpg" data-lightbox="img-2" data-title="Optional caption.">
            <img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-2.jpg" alt="image-1" />
        </a>
    </div>

    <h3>A Four Image Set</h3>
    <div class="flex gap-2">
        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt="" /></a>
        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-5.jpg" alt="" /></a>
        <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-6.jpg" alt="" /></a>
    </div>
</section>

como puedo que con todas las imagenes que estan en el componente con id ="noticia" se remplacen de la siguiente forma
<a  href="#" data-lightbox="img-1">
            <img  src="#" />
 </a>
 es decir que por cada imagen tenga un hipervinculo de la forma "<a  href="#" data-lightbox="img-1"></a>", y la imagen
       

 <section>
    <p>
        For more information, visit <a href="http://lokeshdhakar.com/projects/lightbox2/">http://lokeshdhakar.com/projects/lightbox2/</a>
    </p>
</section>
        -->     

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


        
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/js/lightbox-plus-jquery.min.js"></script>

<?php get_footer(); ?>