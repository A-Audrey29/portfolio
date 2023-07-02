<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<header>

    <div class="header-nav">

        <div class="menu-navbar">

            <a href="<?php echo home_url('/'); ?>">
                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logoW.png'" alt="Logo">
            </a>


            <div class="navDesk">
                <a href="https://github.com/A-Audrey29" target="_blank">
                    <img class="logo logoGit" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gitHubBlack.png'" alt="Logo">
                </a>

                <?php
                wp_nav_menu([
                    'theme_location' => 'main',
                    'container' => false,
                    // 'menu_class' => 'navbar'
                ]);
                ?>
                <li><a href="#" id="myBtn" class="wp-block-button__link contactNav modal-js" role="button" data-toggle="modal">Contact</a></li>
            </div>
        </div>

        <nav id="site-navigation" class="main-navigation navbar">
            <div class="menu-mobile">
                <button class="menu-toggle close" aria-controls="main" aria-expanded="false">
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
                <li class="menu-item nav-item"><a href="#" id="myBtn" class="modal-js" role="button" data-toggle="modal">Contact</a></li>

                <a href="https://github.com/A-Audrey29" target="_blank">
                    <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gitHubW.png'" alt="Logo">
                </a>
            </ul>




</header>

<?php wp_body_open(); ?>