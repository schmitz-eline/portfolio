<?php get_header(); ?>

    <section class="not-found">
        <h2 class="not-found__title">404</h2>

        <p class="not-found__text">
            <?= __portfolio('Vous êtes perdu·e ?') ?>
        </p>

        <a class="not-found__link action"
           href="<?= home_url(); ?>"
           title="<?= esc_html(__portfolio('Retourner vers la page d’accueil')); ?>">
            <span><?= esc_html(__portfolio('Retourner à l’accueil')); ?></span>
        </a>
    </section>

<?php get_footer(); ?>