<?php
$title = get_field('cs_title');
$items = get_field('cs_items');
$link = get_field('cs_link');
?>

<article class="universe__article creations-section">
    <?php if (!empty($title)): ?>
        <h3 class="creations-section__title"><?= esc_html($title) ?></h3>
    <?php endif; ?>

    <?php if (!empty($items)): ?>
        <ul class="creations-section__list">
            <?php foreach ($items as $item): ?>
                <?php
                $creation_id = $item['creation_item'];
                if (!$creation_id) continue;

                $image = get_field('creation_image', $creation_id);
                $name = get_the_title($creation_id);
                $link_url = get_field('creation_link', $creation_id);
                ?>

                <li class="creations-section__item">
                    <a class="creations-section__item-link"
                       href="<?= esc_url($link_url['url']); ?>"
                       title="<?= esc_attr($link_url['title']); ?>">

                        <figure class="creations-section__item-image-container image-container">
                            <?php if (!empty($image)): ?>
                                <img class="creations-section__item-image"
                                     src="<?= esc_url($image['url']); ?>"
                                     alt="<?= esc_attr($image['alt']); ?>">
                            <?php endif; ?>
                        </figure>

                        <span class="creations-section__item-name"><?= esc_html($name); ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (!empty($link)): ?>
        <a class="creations-section__link action"
           href="<?= esc_url($link['url']); ?>"
           title="<?= esc_attr($link['title']); ?>">
            <span><?= esc_html(__portfolio('Plus de créations')); ?></span>
        </a>
    <?php endif; ?>
</article>