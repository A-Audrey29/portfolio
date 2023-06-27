<?php

/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>

<div>
    <ul class="article">

        <div class="article-content">
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
                        <p class="comp">Compétences : <?php
                                                        $competences = get_field('competences');
                                                        if ($competences) : ?>
                        <ul>
                            <?php foreach ($competences as $competence) : ?>
                                <li><?php echo $competence; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <li>

                        <a class="gitHub" href="<?php the_field('lien_vers_github'); ?>" target="_blank">Accédez au code sur GitHub</a>
                    </li>
                <?php endif; ?></p>
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