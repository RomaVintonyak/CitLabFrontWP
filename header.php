<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo('charset'); ?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
   <meta http-equiv="x-ua-compatible" content="ie=edge" />
   <!--disable format detection (iPhone / IPod / IPad) -->
   <meta name="format-detection" content="telephone=no" />
   <!--BlackBerry-->
   <meta http-equiv="x-rim-auto-match" content="none" />
   <title><?php bloginfo('name'); ?></title>
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
   <!--header-->
   <header class="header" id="header">
      <div class="header__row">
         <div class="navbar__brand">
            <a href="<?php bloginfo('url'); ?>">
               <img class="img" src="<?php the_field('nav_logo', 'option'); ?>" alt="logo">
               <p><?php the_field('nav_text', 'option'); ?></p>
            </a>
      </div><!--./navbar__brand-->
      <nav class="nav__menu">
      <?php 
            wp_nav_menu( [
               'theme_location'  => 'primary',
               'menu'            => 'PrimaryMenu', 
               'container'       => 'ul',
               'menu_class'      => 'menu__list', 
               'echo'            => true,
               'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
               'depth'           => 0,
               ] ); 
         ?>
      </nav><!--./nav__menu-->
      <div class="burgerBtn" id="burgerBtn">
         <span></span>
         <span></span>
         <span></span>
         <span></span>
      </div><!--./burger-->
      </div><!--./header__row-->
   </header><!--./header-->