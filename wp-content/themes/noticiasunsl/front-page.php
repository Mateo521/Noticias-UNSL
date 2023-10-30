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
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto ">
            <div class="grid-container w-full">
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
<style>

</style>

<?php
get_footer();
?>