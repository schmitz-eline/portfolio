<?php
$title = get_field('universe_intro_title');
$text = get_field('universe_intro_text');
$image = get_field('universe_intro_image');
?>

<article class="universe__article universe__intro">
    <div class="universe__intro__wrapper">
        <?php if ($title): ?>
            <h3 class="universe__intro__title"><?= esc_html($title) ?></h3>
        <?php endif; ?>

        <?php if ($text): ?>
            <p class="universe__intro__text"><?= esc_html($text) ?></p>
        <?php endif; ?>
    </div>

    <?php if ($image): ?>
        <figure class="universe__intro__image-container image-container">
            <picture>
                <source
                        srcset="<?= get_template_directory_uri() ?>/assets/images/<?= pathinfo($image['filename'], PATHINFO_FILENAME) ?>.webp"
                        type="image/webp">

                <?= wp_get_attachment_image(
                        $image['id'],
                        'eline-square-medium',
                        false,
                        [
                                'class' => 'universe__intro__image',
                                'loading' => 'lazy',
                                'sizes' => '(min-width: 1024px) 20vw, (min-width: 800px) 54vw, 64vw'
                        ]
                ) ?>
            </picture>
        </figure>
    <?php endif; ?>
</article>