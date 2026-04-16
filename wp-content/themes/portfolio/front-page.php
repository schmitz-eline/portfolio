<?php
$text = get_field('hero_intro_text');
$words = get_field('hero_words');
$universe_link = get_field('hero_universe_link');
$contact_link = get_field('hero_contact_link');
?>

<?php get_header(); ?>

    <section class="hero">
        <h2 class="hero__title sro">Introduction</h2>

        <?php if (!empty($text)): ?>
            <p class="hero__intro"><?= esc_html($text); ?></p>
        <?php endif; ?>

        <?php if (!empty($words)): ?>
            <div class="hero__words-slider">
                <div class="hero__words-inner">
                    <?php foreach ($words as $word): ?>
                        <span class="hero__word"><?= esc_html($word['word']); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <ul class="hero__actions">
            <?php if (!empty($universe_link)): ?>
                <li class="hero__action action">
                    <a class="hero__link"
                       href="<?= esc_url($universe_link['url']); ?>"
                       title="<?= esc_attr($universe_link['title']); ?>">
                        <?= esc_html(__portfolio('Mon univers')); ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (!empty($contact_link)): ?>
                <li class="hero__action action">
                    <a class="hero__link"
                       href="<?= esc_url($contact_link['url']); ?>"
                       title="<?= esc_attr($contact_link['title']); ?>">
                        <?= esc_html(__portfolio('Me contacter')); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </section>

<?php get_template_part('templates/creations-card'); ?>

<?php get_footer(); ?>