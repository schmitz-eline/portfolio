<?php
$title = get_field('cs_title');
$items = get_field('cs_items');
$link = get_field('cs_link');
?>

<section class="creations-section">
    <?php if (!empty($title)): ?>
        <h2 class="creations-section__title"><?= esc_html($title) ?></h2>
    <?php endif; ?>

    <?php if (!empty($items)): ?>
        <div class="creations-section__list">
            <?php foreach ($items as $item): ?>
                <?php
                $creation_id = $item['creation_item'];
                if (!$creation_id) continue;

                $image = get_field('creation_image', $creation_id);
                $name = get_the_title($creation_id);
                $link_url = get_permalink($creation_id);
                ?>

                <article class="creations-section__item">
                    <a class="creations-section__item-link"
                       href="<?= esc_url($link_url); ?>"
                       title="<?= esc_attr(__('Voir la création : ', 'portfolio') . $name); ?>">

                        <figure class="creations-section__item-image-container image-container">
                            <?php if (!empty($image)): ?>
                                <img class="creations-section__item-image"
                                     src="<?= esc_url($image['url']); ?>"
                                     alt="<?= esc_attr(__('Illustration de la création : ', 'portfolio') . $name); ?>">
                            <?php endif; ?>
                        </figure>

                        <h3 class="creations-section__item-name"><?= esc_html($name); ?></h3>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($link)): ?>
        <div class="creations-section__link-container action">
            <a class="creations-section__link"
               href="<?= esc_url($link['url']); ?>"
               title="<?= esc_attr($link['title']); ?>">
                <?= esc_html(__('Plus de créations', 'portfolio')); ?>
            </a>
        </div>
    <?php endif; ?>
</section>