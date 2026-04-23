<?php
/* Template Name: Mon univers */
?>

<?php get_header(); ?>

    <section class="universe">
        <h2 class="universe__title"><?= get_the_title(); ?></h2>

        <?php get_template_part('templates/content/universe/intro'); ?>
        <?php get_template_part('templates/content/universe/journey'); ?>
        <?php get_template_part('templates/content/universe/technical-skills'); ?>
        <?php get_template_part('templates/content/universe/creations'); ?>
        <?php get_template_part('templates/content/universe/strengths-and-hobbies'); ?>
    </section>

<?php get_footer(); ?>