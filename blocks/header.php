<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <section class="bg-blue-500 px-5 py-3 min-h-40 w-full">
      <div class="max-w-5xl flex items-center justify-center mx-auto">
        <div class="flex justify-start w-1/4">
          <?php the_custom_logo(); ?>
        </div>
        <div class="flex justify-end w-3/4">
          <div id="burger-menu" class="md:hidden flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#ffffff" class="cursor-poionter w-8 h-8">
              <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </div>

          <?php 
            wp_nav_menu( array( 
              'theme_location' => 'primary_menu',
              'menu' => "main-menu",
              'menu_class' => "flex justify-between w-2/12",
              'menu_id' => "main-menu",
              'container' => "nav", 
              'container_class'	=> "text-white w-full justify-end hidden md:flex", 
              'container_id' => "main-menu-container", 
            ) );
          ?>
        </div>
      </div>
    </section>    