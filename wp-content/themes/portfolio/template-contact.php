<?php
/* Template Name: Me contacter */

$details_title = get_field('contact_details_title');
$form_title = get_field('contact_form_title');
$code = get_field('contact_form_shortcode');
?>

<?php get_header(); ?>

<section class="contact">
    <h2 class="contact__title"><?= get_the_title(); ?></h2>

    <div class="contact__wrapper">
        <section class="contact-details">
            <?php if ($details_title): ?>
                <h3 class="contact-details__title"><?= esc_html($details_title) ?></h3>
            <?php endif; ?>

            <ul class="contact-details__wrapper">
                <?php get_template_part('templates/components/contact-details'); ?>
            </ul>
        </section>

        <section class="form">
            <?php if ($form_title): ?>
                <h3 class="form__title"><?= esc_html($form_title) ?></h3>
            <?php endif; ?>

            <?= do_shortcode($code); ?>
        </section>
    </div>
</section>

<?php get_footer(); ?>