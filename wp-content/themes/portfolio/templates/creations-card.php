<?php
$title = get_field('cc_title');
$items = get_field('cc_items');
$link = get_field('cc_link');
?>

<section class="creations">
    <?php if (!empty($title)): ?>
        <h2 class="creations__title"><?= esc_html($title) ?></h2>
    <?php endif; ?>

    <?php if (!empty($items)): ?>
        <ul class="creations__list">
            <?php foreach ($items as $item): ?>
                <?php
                $creation_id = $item['creation_item'];
                if (!$creation_id) continue;

                $image = get_field('creation_image', $creation_id);
                $name = get_the_title($creation_id);
                $link_url = get_permalink($creation_id);
                ?>

                <li class="creations__item">
                    <a class="creations__item-link"
                       href="<?= esc_url($link_url); ?>"
                       title="<?= esc_attr(__portfolio('Voir la création : ') . $name); ?>">

                        <div class="creations__item-image-container image-container">
                            <?php if (!empty($image)): ?>
                                <img class="creations__item-image"
                                     src="<?= esc_url($image['url']); ?>"
                                     alt="<?= esc_attr(__portfolio('Illustration de la création : ') . $name); ?>">
                            <?php endif; ?>
                        </div>

                        <span class="creations__item-name"><?= esc_html($name); ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (!empty($link)): ?>
        <div class="creations__link-container action">
            <a class="creations__link"
               href="<?= esc_url($link['url']); ?>"
               title="<?= esc_attr($link['title']); ?>">
                <?= esc_html(__portfolio('Plus de créations')); ?>
            </a>
        </div>
    <?php endif; ?>
</section>