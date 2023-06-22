<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<header>

    <div class="header-nav">

        <a href="<?php echo home_url('/'); ?>">
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png'" alt="Logo">
        </a>
        <?php
        wp_nav_menu([
            'theme_location' => 'main',
        ]);
        ?>
    </div>
    <nav id="site-navigation" class="main-navigation navbar">
        <div class="menu-mobile">
            <button class="menu-toggle close" aria-controls="primary-menu" aria-expanded="false">
                <div class="line line_one"></div>
                <div class="line line_two"></div>
                <div class="line line_three"></div>
            </button>
        </div>
        <ul class="open_nav close_nav navbar-links">
            <?php wp_nav_menu([
                'theme_lacation' => 'main',
                // 'container' => false,
                'menu_class' => 'navbar-burger'
            ]); ?>
            <!-- <li class="menu-item nav-item"><a href="#" id="myBtn" class="modal-js" role="button" data-toggle="modal">CONTACT</a></li> -->
        </ul>


</header>

<?php wp_body_open(); ?>