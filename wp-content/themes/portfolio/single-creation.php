<?php
$back_link = get_field('back_to_creations_link');
$content = get_field('tm_content');
?>

<?php get_header(); ?>

    <section class="single-creation" itemscope itemtype="https://schema.org/CreativeWork">
        <h2 class="single-creation__title" itemprop="name"><?= get_the_title(); ?></h2>

        <?php if ($back_link): ?>
            <a class="single-creation__back-link"
               href="<?= esc_url($back_link['url']) ?>"
               title="<?= esc_attr($back_link['title']) ?>">
                <?= esc_html(__portfolio('Mes autres créations')); ?>
            </a>
        <?php endif; ?>

        <?php if (have_rows('tm_content')): ?>
            <?php while (have_rows('tm_content')): the_row() ?>
                <?php if (get_row_layout() === 'tm_part'): ?>

                    <article class="single-creation__part" itemprop="description">
                        <div class="single-creation__content">
                            <div class="single-creation__text-wrapper">
                                <?php
                                $part_title = get_sub_field('tm_part_title');
                                ?>
                                <?php if ($part_title): ?>
                                    <h3 class="single-creation__part-title"><?= esc_html($part_title) ?></h3>
                                <?php endif; ?>

                                <?php if (have_rows('tm_paragraphs')): ?>
                                    <div class="single-creation__paragraphs">
                                        <?php while (have_rows('tm_paragraphs')): the_row() ?>
                                            <?php
                                            $paragraph = get_sub_field('tm_paragraph');
                                            ?>
                                            <?php if ($paragraph): ?>
                                                <div class="single-creation__text">
                                                    <?= wp_kses_post($paragraph) ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php
                            $image = get_sub_field('tm_image');
                            ?>
                            <?php if ($image): ?>
                                <figure class="single-creation__image-container image-container">
                                    <picture>
                                        <source
                                                srcset="<?= get_template_directory_uri() ?>/assets/images/<?= pathinfo($image['filename'], PATHINFO_FILENAME) ?>.webp"
                                                type="image/webp">

                                        <?= wp_get_attachment_image(
                                                $image['id'],
                                                'eline-medium',
                                                false,
                                                [
                                                        'class' => 'single-creation__image',
                                                        'loading' => 'lazy',
                                                        'sizes' => '(min-width: 1024px) 700px, 74vw',
                                                        'itemprop' => 'image'
                                                ]
                                        ) ?>
                                    </picture>
                                </figure>
                            <?php endif; ?>
                        </div>

                        <?php if (have_rows('tm_links')): ?>
                            <ul class="single-creation__actions">
                                <?php while (have_rows('tm_links')): the_row() ?>
                                    <?php
                                    $link = get_sub_field('tm_link');
                                    $link_label = get_sub_field('tm_link_label');
                                    $link_icon = get_sub_field('tm_link_icon');
                                    ?>
                                    <?php if ($link && $link_label): ?>
                                        <li class="single-creation__action">
                                            <a class="single-creation__link action"
                                               href="<?= esc_url($link['url']) ?>"
                                               hreflang="fr"
                                               title="<?= esc_attr($link['title']) ?>"
                                               target="<?= esc_attr($link['target']) ?>"
                                               rel="noopener noreferrer"
                                               itemprop="url">
                                                <span><?= esc_html($link_label) ?></span>
                                                <?php if ($link_icon): ?>
                                                    <img src="<?= esc_url($link_icon['url']) ?>"
                                                         alt="<?= esc_attr($link_icon['alt']) ?>">
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </article>

                <?php endif; ?>
            <?php endwhile; ?>

        <?php endif; ?>
    </section>

<?php get_footer(); ?>