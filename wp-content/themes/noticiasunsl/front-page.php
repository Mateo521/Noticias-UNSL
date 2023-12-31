<?php
get_header();
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'order'          => 'DESC',
    'category__not_in' => array(get_category_by_slug('entrevistas')->term_id)
);

$latest_posts = get_posts($args);

?>

<!-- Swiper -->
<div class="swiper mySwiper4">
    <div class="swiper-wrapper">
        <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
            <?php
            // Obtener la URL de la imagen destacada
            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');

            if (!$thumbnail_url) {
                // Si no hay imagen destacada, proporcionar una URL de imagen de respaldo
                $thumbnail_url = 'img.img'; // Reemplaza esto con la URL de tu imagen de respaldo
            }
            ?>

            <div class="swiper-slide">
                <div class="max-screen-2xl w-full bg-cover" id="slide-e" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>); background-repeat: no-repeat; height:32rem;">
                    <div style="align-items: flex-end;" class="relative h-full flex items-end justify-center ">
                        <div class="text-white p-12 z-10" style="z-index: 1;">
                            <p><?php echo get_the_category_list(', ', '', $post->ID); ?></p>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <h1 class="text-4xl"><?php echo get_the_title($post->ID); ?></h1>
                            </a>
                        </div>
                        <div class="absolute h-96 w-full" style="background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    <div class="autoplay-progress">
        <svg viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="20"></circle>
        </svg>
        <span></span>
    </div>
</div>


 <div class="flex justify-center py-8">
    <div class="w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto w-full">
            <div class="grid-container-1 w-full">
                <div class="item1 relative">

                    <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=3);">
                        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B;">UNIVERSIDAD PUBLICA</p>
                        <div class="absolute bottom-0 text-left text-white p-2">
                            <h5 class="text-sm relative" style="z-index:5;"> | Espacio de intercambio académico y prductivo</h5>
                            <p class="text-xl relative" style="z-index:5;">Universidad Siglo 21 celebró “Semana 21” junto a múltiples empresas nacionales e internacionales</p>


                        </div>
                        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%;">
                        </div>
                    </div>
                </div>
                <div class="item2 relative">

                    <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=4);">
                        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B;">UNIVERSIDAD PUBLICA</p>
                        <div class="absolute bottom-0 text-left text-white p-2">
                            <h5 class="text-sm relative" style="z-index:5;"> | Espacio de intercambio académico y prductivo</h5>
                            <p class="text-xl relative" style="z-index:5;">Universidad Siglo 21 celebró “Semana 21” junto a múltiples empresas nacionales e internacionales</p>


                        </div>
                        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%;">
                        </div>
                    </div>
                </div>
                <div class="item3 relative">

                    <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=5);">
                        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B;">UNIVERSIDAD PUBLICA</p>
                        <div class="absolute bottom-0 text-left text-white p-2">
                            <h5 class="text-sm relative" style="z-index:5;"> | Espacio de intercambio académico y prductivo</h5>
                            <p class="text-xl relative" style="z-index:5;">El reconocido dibujante Rep brindará una charla en la UNLa</p>


                        </div>
                        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%;">
                        </div>
                    </div>
                </div>
                <div class="item4 relative">

                    <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=6);">
                        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B;">UNIVERSIDAD PUBLICA</p>
                        <div class="absolute bottom-0 text-left text-white p-2">
                            <h5 class="text-sm relative" style="z-index:5;"> | Espacio de intercambio académico y prductivo</h5>
                            <p class="text-xl relative" style="z-index:5;">Mammarella: “Estamos ratificando a la Educación como un derecho”</p>


                        </div>
                        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%;">
                        </div>
                    </div>
                </div>
                <div class="item5 relative">

                    <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=7);">
                        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B;">UNIVERSIDAD PUBLICA</p>
                        <div class="absolute bottom-0 text-left text-white p-2">
                            <h5 class="text-sm relative" style="z-index:5;"> | Espacio de intercambio académico y prductivo</h5>
                            <p class="text-xl relative" style="z-index:5;">El verano ya está llegando al Centro Cultural Rojas</p>


                        </div>
                        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%;">
                        </div>
                    </div>
                </div>
                <div class="item6 relative">

                    <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=8);">
                        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B;">UNIVERSIDAD PUBLICA</p>
                        <div class="absolute bottom-0 text-left text-white p-2">
                            <h5 class="text-sm relative" style="z-index:5;"> | Espacio de intercambio académico y prductivo</h5>
                            <p class="text-xl relative" style="z-index:5;">Preocupan resultados de estudios sobre resistencia a los antimicrobianos</p>


                        </div>
                        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%;">
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    </div>





    <?php
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'category_name' => 'entrevistas',
        'order'          => 'DESC',
    );

    $latest_posts = get_posts($args);

    ?>

    <!-- Swiper -->
    <div class="swiper mySwiper4">
        <div class="swiper-wrapper">
            <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
                <?php
                // Obtener todas las imágenes adjuntas al post
                $attachments = get_posts(array(
                    'post_type'      => 'attachment',
                    'posts_per_page' => -1,
                    'post_parent'    => $post->ID,
                    'order'          => 'ASC'
                ));

                if ($attachments) {
                    // Obtener la URL de la primera imagen adjunta
                    $first_attachment = reset($attachments); // Obtiene el primer elemento del array
                    $thumbnail_url = wp_get_attachment_url($first_attachment->ID);
                } else {
                    // Si no hay imágenes adjuntas, proporcionar una URL de imagen de respaldo
                    $thumbnail_url = 'img.img'; // Reemplaza esto con la URL de tu imagen de respaldo
                }
                ?>


                <div class="swiper-slide">

                    <div class="max-screen-2xl w-full h-96  bg-cover">

                        <div style="align-items: flex-end;" class="relative h-full flex items-end  ">

                            <img src="<?php echo esc_url($thumbnail_url); ?>" class="w-full h-full" alt="">
                            <div class="text-white md:p-12 p-1 z-10 absolute" style="z-index: 1;">

                                <p class="text-left py-5 uppercase"><?php echo get_the_category_list(', ', '', $post->ID); ?></p>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <h1 class="md:text-4xl text-xl"><?php echo get_the_title($post->ID); ?></h1>
                                </a>
                            </div>

                            <div class="absolute h-96 w-full" style="background: rgb(0,0,0);background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);"></div>
                        </div>


                    </div>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        <div class="autoplay-progress">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>






    <!--

<div class="flex justify-center py-8">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto  w-full h-full">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            <div class="swiper-wrapper">
                <?php
                foreach ($videos->items as $video) {
                    if (isset($video->id->videoId)) {
                ?>
                        <div class="swiper-slide">
                            <?php echo ('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' . $video->id->videoId . '" frameborder="0" allowfullscreen></iframe>') ?>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                foreach ($videos->items as $video) {
                    $video_id = explode("?v=", 'http://www.youtube.com/watch?v=' . $video->id->videoId . '');
                    $video_id = $video_id[1];
                    $thumbnail = "http://img.youtube.com/vi/" . $video_id . "/1.jpg";
                    if (isset($video->id->videoId)) {
                ?>
                        <div class="swiper-slide">
                            <img src="<?php echo ($thumbnail) ?>" class="w-full" />
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div> -->


    <?php
    $videos = obtener_videos_de_youtube();
    /*
            $videos = array(
                "item2" => "https://www.youtube.com/embed/Xao20KgGzVU",
                "item3" => "https://www.youtube.com/embed/wXnJArjhW1M",
                "item4" => "https://www.youtube.com/embed/auwiJlu8c7Y",
                "item5" => "https://www.youtube.com/embed/lCeP3JXYvQA",
                "item6" => "https://www.youtube.com/embed/t0esK6WzVE4",
                // ...
            );
            */
    ?>





    <!--
<div class="flex justify-center py-8">
    <div class="w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto w-full">
            <div class="grid-container-2 w-full mx-2 text-white">
                <div class="item7 p-2">
                    <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=9" alt="">
                    <div>
                        <h2 class="text-2xl title-c">Lo destaca Warren Buffet.</h2>
                        <p>Cuanto influye la suerte para tener una carrera profesional exitosa</p>
                    </div>
                </div>
                <div class="item8 p-2">
                    <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=10" alt="">
                    <div>
                        <h2 class="text-2xl title-c">Lo destaca Warren Buffet.</h2>
                        <p>Preocupan resultados de estudios sobre resistencia a los antimicrobianos</p>
                    </div>
                </div>
                <div class="item9 p-2">
                    <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=11" alt="">
                    <div>
                        <h2 class="text-2xl title-c">Lo destaca Warren Buffet.</h2>
                        <p>Preocupan resultados de estudios sobre resistencia a los antimicrobianos</p>
                    </div>
                </div>
                <div class="item10 p-2">
                    <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=12" alt="">
                    <div>
                        <h2 class="text-2xl title-c">Lo destaca Warren Buffet.</h2>
                        <p>Preocupan resultados de estudios sobre resistencia a los antimicrobianos</p>
                    </div>
                </div>
                <div class="item11 p-2">
                    <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=13" alt="">
                    <div>
                        <h2 class="text-2xl title-c">Lo destaca Warren Buffet.</h2>
                        <p>Preocupan resultados de estudios sobre resistencia a los antimicrobianos</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

        -->



    <div class="w-full py-12" style="background-color:#0f2f49;">
        <div class="flex justify-center  text-white">
            <div class="max-w-screen-xl w-full">
                <p class="text-3xl  p-5">AUDIOVISUAL</p>
                <div class="flex flex-wr items-center justify-between mx-auto ">
                    <div class="grid-container-3 w-full p-3">

                        <div class="item1" id="item1">


                            <!-- Aquí se mostrará el primer video de la API -->
                            <?php if (!empty($videos)) {
                                $videoId = $videos['items'][0]['snippet']['resourceId']['videoId'];
                                $thumbnails = $primer_video['snippet']['thumbnails'];
                                $thumbnail_url = $thumbnails['medium']['url'];
                            ?>
                                <div class="flex h-full" style="flex-direction:column;">
                                    <iframe id="videoPlayer" class="w-full h-full" height="315" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" frameborder="0" allowfullscreen></iframe>
                                    <!-- <p class="text-xl py-5"><?php echo $videos['items'][0]['snippet']['title']; ?></p> -->
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        for ($index = 0; $index < count($videos['items']) - 1; $index++) {
                            $video = $videos['items'][$index];
                            $thumbnails = $video['snippet']['thumbnails'];
                            $thumbnail_url = $thumbnails['medium']['url'];
                        ?>
                            <!-- Contenido de la miniatura -->
                            <div style="cursor:pointer;" class="miniatura item<?php echo ($index + 2); ?>" data-video-id="<?php echo $video['snippet']['resourceId']['videoId']; ?>">
                                <div class="grid items-center gap-3 grid-cols-2">
                                    <div class="relative w-full h-full">

                                        <img class="absolute" style="left:50%;top:50%; transform:translate(-50%,-50%)" width="35" height="35" src="<?php echo get_template_directory_uri(); ?>/assets/images/pngegg.png" alt="">

                                        <img class="w-full h-full" src="<?php echo $thumbnail_url; ?>">
                                    </div>


                                    <p class="text"><?php echo $video['snippet']['title']; ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="flex justify-center py-8">
        <div class="w-full">
            <!--
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto w-full">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 4,
                'order'          => 'DESC',
            );

            $latest_posts = get_posts($args);
            ?>

            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff; " class="swiper mySwiper3">
                <div class="swiper-wrapper">
                    <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
                        <div class="swiper-slide">
                            <div class="flex flex-col items-center">
                                <?php
                                // Obtener la URL de la imagen destacada o adjunta
                                $thumbnail_id = get_post_thumbnail_id($post->ID);
                                $thumbnail_url = wp_get_attachment_url($thumbnail_id);
                                if (empty($thumbnail_url)) {
                                    $attachments = get_posts(array(
                                        'post_type'      => 'attachment',

                                        'posts_per_page' => 1,
                                        'post_parent'    => $post->ID,
                                        'order'          => 'ASC'
                                    ));
                                    if ($attachments) {
                                        $thumbnail_url = wp_get_attachment_url($attachments[0]->ID);
                                    }
                                }
                                ?>
                                <div class="w-full" style="height:550px;">
                                    <img class="w-full h-full" src="<?php echo esc_url($thumbnail_url); ?>" />
                                </div>
                                <p class="py-5"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>

                            </div>
                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
                <div class="swiper-button-next" style="z-index:50;"></div>
                <div class="swiper-button-prev" style="z-index:50;"></div>
                <div class="swiper-pagination"></div>
            </div>

            <div thumbsSlider="" class="swiper mySwiper  p-3">
                <div class="swiper-wrapper">
                    <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
                        <div class="swiper-slide">
                            <?php
                            // Obtener la URL de la imagen destacada o adjunta
                            $thumbnail_id = get_post_thumbnail_id($post->ID);
                            $thumbnail_url = wp_get_attachment_url($thumbnail_id);
                            if (empty($thumbnail_url)) {
                                $attachments = get_posts(array(
                                    'post_type'      => 'attachment',
                                    'posts_per_page' => 1,
                                    'post_parent'    => $post->ID,
                                    'order'          => 'ASC'
                                ));
                                if ($attachments) {
                                    $thumbnail_url = wp_get_attachment_url($attachments[0]->ID);
                                }
                            }
                            ?>
                            <img src="<?php echo esc_url($thumbnail_url); ?>" />
                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                           -->
        </div>
    </div>


    <!--  <iframe class="w-full h-full" src="https://www.youtube.com/embed/oHg5SJYRHA0" title="RickRoll&#39;D" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              -->



    <!--

            <div class="grid grid-container-4 w-full text-white" style="background-color: #172f3b;">
                <div class="item1 p-5">

                    <img class="w-full" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Service_mark.svg" alt="">
                    <p>Ciencia</p>
                    <p>Tecnología</p>
                    <p>Salud</p>
                    <p>Ambiente</p>
                </div>
                <div class="item2 p-5">
                    <img class="w-full" src="https://picsum.photos/1100/700.jpg?page=3" alt="">
                    <span style="text-transform:uppercase; color:aliceblue;">Gabriel Rabinovich recibe el Premio Konex de Brillante</span>
                    <h2 class="text-2xl">"La ciencia argentina tiene talento humano para iluminar al mundo"</h2>
                    <p>El bióquímico e investigador de Conicet, reconocido nacional e internacionalmente, defendió la necesidad de hacer ciencia básica, al asegurar que en la Argentina "hacer tecnologías asociadas a descubrimientos de países centrales" sino que hay "potencia para desarrollar cosas nuevas".</p>
                </div>
                <div class="item3 p-5">
                    <img class="w-full" src="https://www.telam.com.ar/thumbs/bluesteel/advf/imagenes/2023/10/6540e770a92a0_655.jpg" alt="">


                </div>
            </div>
            -->

    <div class="container" id="cta">
        <section class="tarjeta-inicio">
            <div class="entry tarjeta-inicio__fondo-azul">
                <div class="row">
                    <div class="col-md-12">
                        <div class="categoria-seccion">
                            <p>AGENDA UNIVERSITARIA</p>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="entry-title">Convocatorias/Vencimientos</h3>
                                    <div class="row">
                                        <div class="subheading">
                                            <div class="col-md-12">
                                                <?php
                                                if (function_exists('add_eventon')) {
                                                    $args = array(
                                                        'show_et_ft_img' => 'yes',
                                                        'cal_id' => 1871,
                                                        'event_type' => 1871,
                                                        'show_upcoming' => 2,
                                                        'number_of_months' => 2,
                                                        'event_count' => 5,
                                                    );
                                                    add_eventon($args);
                                                } ?>
                                                <hr><a class="btn-ver-mas" href="event-type/convocatorias-vencimientos/">VER MÁS</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="entry-title">Eventos Académicos</h3>
                                    <div class="row">
                                        <div class="subheading">
                                            <div class="col-md-12">
                                                <?php if (function_exists('add_eventon')) {
                                                    $args = array(
                                                        'show_et_ft_img' => 'yes',
                                                        'cal_id' => 1872,
                                                        'event_type' => 1872,
                                                        'show_upcoming' => 2,
                                                        'number_of_months' => 2,
                                                        'event_count' => 5,
                                                    );
                                                    add_eventon($args);
                                                } ?>
                                                <hr><a class="btn-ver-mas" href="event-type/eventos-academicos/">VER MÁS</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="entry-title">Comunidad</h3>
                                    <div class="row">
                                        <div class="subheading">
                                            <div class="col-md-12">
                                                <?php if (function_exists('add_eventon')) {
                                                    $args = array(
                                                        'show_et_ft_img' => 'yes',
                                                        'cal_id' => 1873,
                                                        'event_type' => 1873,
                                                        'show_upcoming' => 0,
                                                        'number_of_months' => 2,
                                                        'event_count' => 5,
                                                        'exp_jumper' => 'no',
                                                    );
                                                    add_eventon($args);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr><a class="btn-ver-mas" href="event-type/comunidad/">VER MÁS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <div id="ww_f3c2f35d065a9" v='1.3' loc='id' a='{"t":"responsive","lang":"es","sl_lpl":1,"ids":["wl6235"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>Más previsiones: <a href="https://oneweather.org/de/deutschland/21_tage/" id="ww_f3c2f35d065a9_u" target="_blank">Wetter vorschau 21 tage</a></div>
    <script async src="https://app2.weatherwidget.org/js/?id=ww_f3c2f35d065a9"></script>
    </div>
    </div>
    </div>

















    <style>
        #slide-e {
            animation: desp-x 50s infinite;
        }

        @media screen and (min-width: 766px) {
            #slide-e {
                animation: desp-y 75s infinite;
            }
        }

        @keyframes desp-x {
            50% {
                background-position: 100% 0;
            }
        }

        @keyframes desp-y {
            50% {
                background-position: 0 100%;
            }
        }

        iframe {
            height: 500px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: black;
        }


        .swiper-pagination,
        .swiper-pagination-current span {
            position: relative;
            padding: 10px;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-wrapper {
            width: 100%;
            height: 100%;
            align-items: flex-end;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;

            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper2 {
            height: 100%;
            width: 100%;
            max-width: 950px;
        }

        /*
    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }*/

        .mySwiper .swiper-slide {
            width: 25%;
            height: 150px;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>


    <script>
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");
        var swiper = new Swiper(".mySwiper4", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 12000,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            on: {
                autoplayTimeLeft(s, time, progress) {
                    progressCircle.style.setProperty("--progress", 1 - progress);
                    progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                }
            }
        });

        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
        var swiper3 = new Swiper(".mySwiper3", {
            loop: false,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        document.addEventListener("DOMContentLoaded", function() {
            //var item1 = document.querySelector("#titulo-miniatura");
            var videoPlayer = document.querySelector("#videoPlayer");
            var miniaturas = document.querySelectorAll(".miniatura");
            //   console.log(miniaturas);
            miniaturas.forEach(function(miniatura) {
                miniatura.addEventListener("click", function() {
                    var videoId = this.getAttribute("data-video-id");
                    videoPlayer.src = "https://www.youtube.com/embed/" + videoId;
                });
            });
        });
    </script>
    <style>
        .swiper {
            height: 100%;
        }
    </style>


    <?php
    get_footer();
    ?>