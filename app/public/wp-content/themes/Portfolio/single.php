<?php

/**
 * The template for displaying all single posts
 */
?>


<?php get_header(); ?>

<div>

    <div class="article-content">
        <div class="info">

            <h1 class="titre"><?php echo get_field('titre'); ?></h1>

            <div class="zoneUp">
                <div class="descContainer">
                    <p class="desc"><?php echo get_field('description'); ?></p>
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
                <div class="img2Container">
                    <?php
                    $image2 = get_field('image2');
                    if (!empty($image2)) : ?>
                        <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
                    <?php endif; ?>

                </div>
                <div class="compGitContainer">
                    <p class="comp">Compétences : <?php
                                                    $competences = get_field('competences');
                                                    if ($competences) : ?>

                            <?php foreach ($competences as $competence) : ?>

                                <?php echo $competence; ?>
                            <?php endforeach; ?></p>

                    <p class="gitHub"><a href="<?php the_field('lien_vers_github'); ?>" target="_blank"></a>
                        Accédez au code sur GitHub
                    </p>

                <?php endif; ?>
                </div>
            </div>
        </div>


        <?php the_content(); ?>

        <a href="#" id="myBtn" class="modal-js singleBtn" role="button" data-toggle="modal">Contact</a>


    </div>

    <?php get_footer(); ?>