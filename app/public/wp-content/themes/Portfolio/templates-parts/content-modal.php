<div id="myModal" class="modal show">
    <div class="modal-content">
        <img class="img-contact" src="<?php echo get_template_directory_uri(); ?>'/assets/images/contact.png'" alt="contact">

        <span class="close"></span>
        <p><?php
            $shortcode_output = do_shortcode('[wpforms id="134"]');
            echo $shortcode_output
            ?></p>
    </div>
</div>