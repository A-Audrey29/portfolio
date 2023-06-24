<?php
get_template_part('templates-parts/content', 'modal');

?>
<footer class="footer">

    <!-- <div class="footer-img"> -->
    <a href="<?php echo home_url('/'); ?>">
        <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logoW.png'" alt="Logo">
    </a>
    <!-- </div> -->

    <?php wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'footer_nav',
    ]);
    ?>

</footer>

<?php wp_footer(); ?>

</body>

</html>