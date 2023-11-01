<?php
get_header();
?>





<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>


            <img src="https://picsum.photos/1200/700.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            <div class="flex justify-center">
                <div class="flex justify-center absolute bottom-0 text-white text-center" style="padding:45px;">
                    <div style="z-index:3;">
                        <h5 class="text-center">UNSL</h5>
                        <p class="md:text-4xl">Fernando Tauber recibió el título Doctor Honoris Causa de la UNDAV</p>
                    </div>
                </div>

                <div class="absolute bottom-0 w-full h-96" style="background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%); ">


                </div>
            </div>

        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>


            <img src="https://picsum.photos/1200/700.jpg?page=2" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            <div class="flex justify-center">
                <div class="flex justify-center absolute bottom-0 text-white text-center" style="padding:45px;">
                    <div style="z-index:3;">
                        <h5 class="text-center">UNSL 2</h5>
                        <p class="md:text-4xl">Fernando Tauber recibió el título Doctor Honoris Causa de la UNDAV</p>
                    </div>
                </div>

                <div class="absolute bottom-0 w-full h-96" style="background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%); ">
                </div>
            </div>

        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>

        <!--
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
-->
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
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


<div class="relative p-1 hidden md:block" style=" object-fit:cover;">
    <img class="w-full h-full" src="https://www.telam.com.ar/advf/imagenes/2023/10/65328e2fe891d.jpg" alt="">
    <div class="absolute bottom-0 text-white p-5">

        <h1 class="md:text-4xl">ENTREVISTA EXCLUSIVA AL PAPA FRANCISCO </h1>
        <p class="md:text-xl">Estamos viviendo una guerra mundial a pedacitos</p>
    </div>
</div>
<div class="relative p-1 md:hidden block" style=" object-fit:cover;">
    <img class="w-full h-full" src="https://www.telam.com.ar/advf/imagenes/2023/10/6532bfe4bc1ca.jpg" alt="">
    <div class="absolute bottom-0 text-white p-5">

        <h1 class="md:text-4xl">ENTREVISTA EXCLUSIVA AL PAPA FRANCISCO </h1>
        <p class="md:text-xl">Estamos viviendo una guerra mundial a pedacitos</p>
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
<div class="flex justify-center py-8">
    <div class="w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto w-full">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff; " class="swiper mySwiper3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">

                        <div class="grid md:grid-cols-2 items-center">
                            <img class="w-full" style="padding:0 50px;" src="https://picsum.photos/1100/700.jpg?page=1" />

                            <p style="padding: 0 50px;">Personal de la Guardia Costera de Suecia trabaja en la limpieza después de la fuga de petróleo del ferry Marco Polo encallado en la costa de Horvik, al sur de Suecia (Johan Nilsson/TT News Agency vía AP).</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="grid md:grid-cols-2 items-center">
                            <img class="w-full" style="padding:0 50px;" src="https://picsum.photos/1100/700.jpg?page=2" />

                            <p style="padding: 0 50px;">Personal de la Guardia Costera de Suecia trabaja en la limpieza después de la fuga de petróleo del ferry Marco Polo encallado en la costa de Horvik, al sur de Suecia (Johan Nilsson/TT News Agency vía AP).</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="grid md:grid-cols-2 items-center">
                            <img class="w-full" style="padding:0 50px;" src="https://picsum.photos/1100/700.jpg?page=3" />

                            <p style="padding: 0 50px;">Personal de la Guardia Costera de Suecia trabaja en la limpieza después de la fuga de petróleo del ferry Marco Polo encallado en la costa de Horvik, al sur de Suecia (Johan Nilsson/TT News Agency vía AP).</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="grid md:grid-cols-2 items-center">
                            <img class="w-full" style="padding:0 50px;" src="https://picsum.photos/1100/700.jpg?page=4" />

                            <p style="padding: 0 50px;">Personal de la Guardia Costera de Suecia trabaja en la limpieza después de la fuga de petróleo del ferry Marco Polo encallado en la costa de Horvik, al sur de Suecia (Johan Nilsson/TT News Agency vía AP).</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next" style="z-index:50;"></div>
                <div class="swiper-button-prev" style="z-index:50;"></div>

                <div class="swiper-pagination"></div>
            </div>


            <div thumbsSlider="" class="swiper mySwiper  ">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://picsum.photos/1100/700.jpg?page=1" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://picsum.photos/1100/700.jpg?page=2" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://picsum.photos/1100/700.jpg?page=3" />
                    </div>
                    <div class="swiper-slide">

                        <img src="https://img.freepik.com/foto-gratis/fondo-producto-pared-negro-oscuro-liso_53876-129678.jpg?t=st=1698705032~exp=1698705632~hmac=b3df4b4f5bb274120d3da8b84c27c551b401f9e62541cac18653" />
                        <p class="absolute text-white">Ver más</p>

                    </div>
                </div>

            </div>

            <!--  <iframe class="w-full h-full" src="https://www.youtube.com/embed/oHg5SJYRHA0" title="RickRoll&#39;D" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              -->
            <p>AUDIOVISUAL</p>

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



        </div>
    </div>
</div>

<div class="flex justify-center py-8 text-white">
    <div class="w-full" style="background-color:#04303c;">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto w-full">
            <div class="grid-container-3 w-full p-3">
                <div class="item1" id="item1">
                    <!-- Aquí se mostrará el primer video de la API -->
                    <?php if (!empty($videos)) {
                        // Muestra el primer video de la API
                        $primer_video = $videos['items'][0];
                        $thumbnails = $primer_video['snippet']['thumbnails'];
                        $thumbnail_url = $thumbnails['medium']['url'];
                    ?>
                        <div class="flex h-full" style="flex-direction:column;">
                            <iframe id="videoPlayer" class="w-full h-full" height="315" src="https://www.youtube.com/embed/<?php echo $primer_video['id']['videoId']; ?>" frameborder="0" allowfullscreen></iframe>
                        <!--    <p class="text-xl py-5"><?php echo $primer_video['snippet']['title']; ?></p> -->
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
                    <div style="cursor:pointer;" class="miniatura item<?php echo ($index + 2); ?>" data-video-id="<?php echo $video['id']['videoId']; ?>">
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



<style>
    iframe {
        height: 500px;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: black;
    }

    
    .swiper-pagination,
    .swiper-pagination-current span {
      position:relative;
      padding:10px;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-wrapper {
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

    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 200px;
        opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>


<script>
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
</script>
<style>
    .swiper {
        height: 100%;
    }
</style>


<?php
get_footer();
?>