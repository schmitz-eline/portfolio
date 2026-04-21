<?php
$text = get_field('hero_intro_text');
$words = get_field('hero_words');
$universe_link = get_field('hero_universe_link');
$contact_link = get_field('hero_contact_link');
?>

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

                <span class="hero__word hero__word--clone">
                <?= esc_html($words[0]['word']); ?>
            </span>
            </div>
        </div>
    <?php endif; ?>

    <ul class="hero__actions">
        <?php if (!empty($universe_link)): ?>
            <li class="hero__action">
                <a class="hero__link action"
                   href="<?= esc_url($universe_link['url']); ?>"
                   title="<?= esc_attr($universe_link['title']); ?>">
                    <span><?= esc_html(__portfolio('Mon univers')); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($contact_link)): ?>
            <li class="hero__action">
                <a class="hero__link action"
                   href="<?= esc_url($contact_link['url']); ?>"
                   title="<?= esc_attr($contact_link['title']); ?>">
                    <span><?= esc_html(__portfolio('Me contacter')); ?></span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</section>