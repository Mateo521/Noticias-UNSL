<?php get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post();
?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


            <div class="w-full py-12">
                <div class="flex justify-center">
                    <div class="max-w-screen-md w-full  p-3">
                        <div class="flex items-center gap-3">
                            <button onclick="tipografia();">Dislexia</button>
                            <button onclick="blancoynegro();">Blanco y negro</button>
                            <button onclick="sintesisdevoz();">Síntesis de voz</button>
                        </div>
                        <header class="entry-header" id="noticia">
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

    figure img {
        width: 100% !important;
        height: 100% !important;
    }
</style>
<!--FIN PRUEBAS PARA NOTICIAS.UNSL.EDU.AR -->
<?php get_footer(); ?>