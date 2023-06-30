<?php

/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>

<div>
    <ul class="article">

        <div class="article-content">

            <div class="slider"></div>
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

        <?php the_content(); ?>
    </ul>
    <li class="menu-item nav-item"><a href="#" id="myBtn" class="modal-js" role="button" data-toggle="modal">Contact</a></li>

</div>
<!-- <span class="close">x</span> -->
</div>
</div>

<?php get_footer(); ?>