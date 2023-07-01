<?php

/**
 * The template for displaying all single posts
 */
?>


<?php get_header(); ?>

<div>

    <div class="article-content">
        <div class="article">
            <div class="info">

                <h1 class="titre"><?php echo get_field('titre'); ?></h1>

                <div class="zoneUp">
                    <div class="descContainer">
                        <p class="desc"><?php echo get_field('description'); ?></p>
                        <div class="compGitContainer">
                            <p class="compResult"><?php $competences = get_field('competences');
                                                    if ($competences) : ?>

                                    <?php foreach ($competences as $competence) : ?>

                                        <?php echo $competence; ?>
                                    <?php endforeach; ?></p>
                            <a class="gitHub" href="<?php the_field('lien_vers_github'); ?>" target="_blank">
                                <img class="logoGitSingle" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gitHubW.png'" alt="Logo de GitHub"></a>
                        </div>
                    </div>
                    <div class="img1Container">
                        <?php
                                                        $image1 = get_field('image1');
                                                        if (!empty($image1)) : ?>
                            <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="zoneDown">

                    <div class="compGitContainer">
                        <!-- <p class="comp">Compétences :</p> -->

                    <?php endif; ?>
                    </div>
                </div>
            </div>

            <a href="#" id="myBtn" class="modal-js singleBtn" role="button" data-toggle="modal">Contact</a>


            <div class="more-slider">
                <?php
                $prevPhoto = get_previous_post();
                $nextPhoto = get_next_post();
                ?>

                <div class="arrows">
                    <?php if (!empty($prevPhoto)) {
                        $prevThumbnail = get_the_post_thumbnail_url($prevPhoto->ID);
                        $prevLink = get_permalink($prevPhoto); ?>
                        <a href="<?php echo $prevLink; ?>">
                            <img class="arrow arrowLeft" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrowLeft.png" alt="Flèche vers la gauche" />
                        </a>
                    <?php } else { ?>
                        <img style="opacity:0; cursor: auto;" class="arrow " src="<?php echo get_template_directory_uri(); ?>/assets/images/arrowLeft.png" alt="Flèche vers la gauche" />
                    <?php }
                    if (!empty($nextPhoto)) {
                        $nextThumbnail = get_the_post_thumbnail_url($nextPhoto->ID);
                        $nextLink = get_permalink($nextPhoto); ?>
                        <a href="<?php echo $nextLink; ?>">
                            <img class="arrow arrowRight" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrowRight.png" alt="Flèche vers la droite" />
                        </a>
                    <?php } else { ?>
                        <img style="opacity:0; cursor: auto;" class="arrow " src="<?php echo get_template_directory_uri(); ?>/assets/images/arrowRight.png" alt="Flèche vers la droite" />
                    <?php } ?>
                </div>
                <?php the_content(); ?>

            </div>
        </div>
    </div>
    <?php get_footer(); ?>