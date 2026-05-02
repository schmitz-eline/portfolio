<?php
$strengths_title = get_field('universe_strengths_title');
$strengths_text = get_field('universe_strengths_text');
$hobbies_title = get_field('universe_hobbies_title');
?>

<article class="universe__article universe__strengths">
    <?php if ($strengths_title): ?>
        <h3 class="universe__strengths__title"><?= esc_html($strengths_title) ?></h3>
    <?php endif; ?>

    <?php if ($strengths_text): ?>
        <p class="universe__strengths__text"><?= esc_html($strengths_text) ?></p>
    <?php endif; ?>
</article>

<article class="universe__article universe__hobbies">
    <?php if ($hobbies_title): ?>
        <h3 class="universe__hobbies__title"><?= esc_html($hobbies_title) ?></h3>
    <?php endif; ?>

    <?php if (have_rows('universe_hobies_items')): ?>
        <?php while (have_rows('universe_hobies_items')) : the_row() ?>
            <?php
            $text = get_sub_field('universe_hobbies_text');
            $image = get_sub_field('universe_hobbies_image');
            ?>
            <?php if ($text && $image): ?>
                <div class="universe__hobbies__text-media">
                    <p class="universe__hobbies__text"><?= esc_html($text) ?></p>
                    <figure class="universe__hobbies__image-container image-container">
                        <picture>
                            <source
                                    srcset="<?= get_template_directory_uri() ?>/assets/images/<?= pathinfo($image['filename'], PATHINFO_FILENAME) ?>.webp"
                                    type="image/webp">

                            <?= wp_get_attachment_image(
                                    $image['id'],
                                    'eline-square-medium',
                                    false,
                                    [
                                            'class' => 'universe__hobbies__image',
                                            'loading' => 'lazy',
                                            'sizes' => '(min-width: 1024px) 20vw, (min-width: 800px) 54vw, 64vw'
                                    ]
                            ) ?>
                        </picture>
                    </figure>
                </div>
            <?php elseif ($text): ?>
                <p class="universe__hobbies__text"><?= esc_html($text) ?></p>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</article>