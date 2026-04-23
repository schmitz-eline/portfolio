<?php
$title = get_field('universe_tec_skills_title');
?>

<article class="universe__article universe__tec-skills">
    <?php if ($title): ?>
        <h3 class="universe__tec-skills__title"><?= esc_html($title) ?></h3>
    <?php endif; ?>

    <?php if (have_rows('universe_tec_skills_items')): ?>
        <ul class="universe__tec-skills__list">
            <?php while (have_rows('universe_tec_skills_items')) : the_row() ?>
                <li class="universe__tec-skills__item">
                    <?php
                    $image = get_sub_field('universe_tec_skills_image');
                    $name = get_sub_field('universe_tec_skills_name');
                    ?>
                    <?php if ($image): ?>
                        <figure class="universe__tec-skills__image-container image-container">
                            <img class="universe__tec-skills__image"
                                 src="<?= esc_url($image['url']) ?>"
                                 alt="<?= esc_attr($image['alt']) ?>">
                        </figure>
                    <?php endif; ?>

                    <?php if ($name): ?>
                        <span class="universe__tec-skills__name">
                            <?= esc_html($name) ?>
                        </span>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</article>