<?php
$title = get_field('universe_journey_title');
$download_link = get_field('universe_download_resume');
$download_icon = get_field('universe_download_icon');
$contact_link = get_field('universe_contact_link');
?>

<article class="universe__article universe__journey" itemprop="description">
    <?php if ($title): ?>
        <h3 class="universe__journey__title"><?= esc_html($title) ?></h3>
    <?php endif; ?>

    <?php if (have_rows('universe_journey_items')): ?>
        <ol class="universe__journey__list">
            <?php while (have_rows('universe_journey_items')) : the_row(); ?>
                <?php
                $date = get_sub_field('universe_journey_date');
                $detail = get_sub_field('universe_journey_detail');
                $localisation = get_sub_field('universe_journey_localisation');
                ?>
                <li class="universe__journey__item">
                    <ul class="universe__journey__sublist">
                        <?php if ($date): ?>
                            <li class="universe__journey__date"><?= esc_html($date) ?></li>
                        <?php endif; ?>
                        <?php if ($detail): ?>
                            <li class="universe__journey__detail"><?= esc_html($detail) ?></li>
                        <?php endif; ?>
                        <?php if ($localisation): ?>
                            <li class="universe__journey__localisation"><?= esc_html($localisation) ?></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endwhile; ?>
        </ol>
    <?php endif; ?>

    <ul class="universe__journey__actions">
        <?php if($download_link && $download_icon): ?>
        <li class="universe__journey__action">
            <a class="universe__journey__download action"
               href="<?= esc_url($download_link['url']) ?>"
               title="<?= esc_attr($download_link['title']) ?>"
               download>
                <span><?= esc_html(__portfolio('Mon CV en PDF')) ?></span>
                <img src="<?= esc_url($download_icon['url']) ?>" alt="<?= esc_attr($download_link['alt']) ?>">
            </a>
        </li>
        <?php endif; ?>

        <?php if($contact_link): ?>
            <li class="universe__journey__action">
                <a class="universe__journey__contact action"
                   href="<?= esc_url($contact_link['url']) ?>"
                   title="<?= esc_attr($contact_link['title']) ?>">
                    <span><?= esc_html(__portfolio('Me contacter')) ?></span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</article>