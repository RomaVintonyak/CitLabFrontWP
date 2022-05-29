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
        <a href="index.html">
          <img class="img" src="img/header/logo.svg" alt="logo">
          <p>God is our judge</p>
        </a>
      </div><!--./navbar__brand-->
      <nav class="nav__menu">
        <ul class="menu__list">
          <li class="menu__list--item">
            <a class="menu__list--link" href="#">головна</a>
          </li>
          <li class="menu__list--item">
            <a class="menu__list--link" href="#">про компанію</a>
          </li>
          <li class="menu__list--item">
            <a class="menu__list--link" href="#">спеціалізація</a>
          </li>
          <li class="menu__list--item">
            <a class="menu__list--link" href="#">послуги</a>
          </li>
          <li class="menu__list--item">
            <a class="menu__list--link" href="#">контакти</a>
          </li>
        </ul>
      </nav><!--./nav__menu-->
      <div class="burgerBtn" id="burgerBtn">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div><!--./burger-->
    </div><!--./header__row-->
  </header><!--./header-->