<?php
get_template_part('templates-parts/content', 'modal');

?>
<footer class="footer">


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