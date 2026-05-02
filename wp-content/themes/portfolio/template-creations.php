<?php
/* Template Name: Mes créations */
?>

<?php get_header(); ?>

    <section class="creations" itemscope itemtype="https://schema.org/CollectionPage">
        <h2 class="creations__title" itemprop="headline"><?= get_the_title(); ?></h2>

        <?php get_template_part('templates/content/creations/filters'); ?>
        <?php get_template_part('templates/content/creations/cards'); ?>
    </section>

<?php get_footer(); ?>