<?php

/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>

<div>
    <ul id="myModal" class="modal">

        <div class="modal-content">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="post-thumbnail" id="popup-img" />

                <div class="info part">
                    <li>
                        <h2 class="titre"><?php echo get_field('titre'); ?></h2>
                    </li>
                    <li>
                        <p class="desc"><?php echo get_field('description'); ?></p>
                    </li>
                    <li>
                        <p class="comp">Compétences :<?php echo get_field('format'); ?></p>
                    </li>
                </div>
        </div>
    <?php endif; ?>
    <?php the_content(); ?>
    </ul>
</div>
<!-- <span class="close">x</span> -->
</div>
</div>

<?php get_footer(); ?>