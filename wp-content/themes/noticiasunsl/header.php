<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Pendiente">
  <title>Noticias UNSL</title>
  <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/72x72.png">

  <?php
  wp_head();
  ?>
</head>

<body>


  <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed w-full" style="z-index: 100;">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/512x512.png" class="h-11 mr-3" alt="Flowbite Logo" />
        <span class="self-center text-2xl  whitespace-nowrap dark:text-white">Noticias UNSL</span>
      </a>
      <div class="flex md:order-2">
<!--
        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700  text-sm p-2.5 mr-1">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
          <span class="sr-only">Search</span>
        </button>
-->
        <div class="relative hidden md:block">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
            <span class="sr-only">Search icon</span>
          </div>
          <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
          <input type="text" id="search-navbar" name="s" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar">
          </form>
        </div>
        <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500  md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
        <div class="relative mt-3 md:hidden">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
       
          <input type="text" id="search-navbar" name="s"  class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar">
          </form>
        </div>
        <ul class="flex py-5 justify-between w-full gap-5 px-3 md:hidden flex p-1" style="flex-direction: column;">
          <li><a href="<?php echo esc_url(home_url('/')); ?>"> INICIO</a></li>
          <li>PUBLICAS</li>
          <li>PRIVADAS</li>
          <li>CYT</li>
          <li>EXTENSION</li>
          <li>GREMIALES</li>
          <li>ORGANIZACIONES</li>
          <li>BECAS</li>
          <li>OPINION</li>
          <li>LATINOAMERICA</li>
          <li>ENTREVISTAS</li>
        </ul>
      </div>
    </div>




    <div class="flex justify-center items-center fixed w-full text-white relative fond-nav">


      <div class="w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto ">

          <ul class="flex justify-between w-full gap-5 px-3 flex-wrap hidden md:flex p-1">
          <li><a href="<?php echo esc_url(home_url('/')); ?>"> INICIO</a></li>
            <li>PUBLICAS</li>
            <li>PRIVADAS</li>
            <li>CYT</li>
            <li>EXTENSION</li>
            <li>GREMIALES</li>
            <li>ORGANIZACIONES</li>
            <li>BECAS</li>
            <li>OPINION</li>
            <li>LATINOAMERICA</li>
            <li>ENTREVISTAS</li>
          </ul>
        </div>

      </div>
    </div>
  </nav>

  <div class="w-full header-m"> </div>

<!--
  <div class="flex md:order-2">

    <div class="relative hidden md:flex flex gap-5 items-center">
      
      <div class="absolute inset-y-0 right-0 flex items-center pr-3 ">
     
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>

    
        <span class="sr-only">Search icon</span>
      </div>

      <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" id="search-navbar" name="s" class="block w-full pr-5  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="¿Qué estás buscando?" style="padding-right: 35px;
    margin-right: 6px;" />

      </form>
    </div>
    <button data-collapse-toggle="navbar-search" type="button"  class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
  </div>






  <div class="md:hidden items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
    <div class="relative mt-3 md:hidden">
      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </div>
      <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="text" id="search-navbar" name="s" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="¿Qué estás buscando?" />

      </form>
    </div>
  </div>
-->