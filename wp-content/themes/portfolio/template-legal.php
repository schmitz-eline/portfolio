<?php
/* Template Name: Mentions légales */

$details_title = get_field('contact_details_title');
$int_prop_title = get_field('intellectual_property_title');
$int_prop_text = get_field('intellectual_property_text');
$hosting_title = get_field('hosting_title');
$hosting_text = get_field('hosting_text');
$hosting_address = get_field('hosting_address');
$personal_data_title = get_field('personal_data_title');
$personal_data_text = get_field('personal_data_text');
?>

<?php get_header(); ?>

    <section class="legal-notice">
        <h2 class="legal-notice__title"><?= get_the_title(); ?></h2>

        <div class="legal-notice__wrapper">
            <article class="legal-notice__contact" itemscope itemtype="https://schema.org/Person">
                <meta itemprop="name" content="Eline Schmitz">
                <?php if ($details_title): ?>
                    <h3 class="legal-notice__contact__title"><?= esc_html($details_title) ?></h3>
                <?php endif; ?>

                <ul class="legal-notice__contact__wrapper">
                    <?php get_template_part('templates/components/contact-details'); ?>
                </ul>
            </article>

            <article class="legal-notice__int-prop">
                <?php if ($int_prop_title): ?>
                    <h3 class="legal-notice__int-prop__title"><?= esc_html($int_prop_title) ?></h3>
                <?php endif; ?>

                <?php if ($int_prop_text): ?>
                    <p class="legal-notice__int-prop__text"><?= esc_html($int_prop_text) ?></p>
                <?php endif; ?>
            </article>

            <article class="legal-notice__hosting">
                <?php if ($hosting_title): ?>
                    <h3 class="legal-notice__hosting__title"><?= esc_html($hosting_title) ?></h3>
                <?php endif; ?>

                <div class="legal-notice__hosting__wrapper">
                    <?php if ($hosting_text): ?>
                        <div class="legal-notice__hosting__text"><?= wp_kses_post($hosting_text) ?></div>
                    <?php endif; ?>

                    <?php if ($hosting_address): ?>
                        <address class="legal-notice__hosting__address"><?= esc_html($hosting_address) ?></address>
                    <?php endif; ?>
                </div>
            </article>

            <article class="legal-notice__personal-data">
                <?php if ($personal_data_title): ?>
                    <h3 class="legal-notice__personal-data__title"><?= esc_html($personal_data_title) ?></h3>
                <?php endif; ?>

                <?php if ($personal_data_text): ?>
                    <p class="legal-notice__personal-data__text"><?= esc_html($personal_data_text) ?></p>
                <?php endif; ?>
            </article>
        </div>
    </section>

<?php get_footer(); ?>