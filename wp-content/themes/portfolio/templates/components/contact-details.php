<?php
$name = get_field('contact_details_name');
$email = get_field('contact_details_email');
$phone = get_field('contact_details_phone');
$address = get_field('contact_details_address');

$reformated_phone = preg_replace('/(\+352)(\d{3})(\d{3})(\d{3})/', '$1 $2 $3 $4', $phone);
?>

<?php if ($name): ?>
    <li class="contact-details__item">
        <?= esc_html($name) ?>
    </li>
<?php endif; ?>

<?php if ($email): ?>
    <li class="contact-details__item">
        <a class="contact-details__item-link"
           href="mailto:<?= $email ?>"
           title="<?= esc_attr(__portfolio('Envoyer un email à Eline Schmitz')) ?>"
           target="_blank"
           rel="noopener noreferrer"
           itemprop="email">
            <?= esc_html($email) ?>
        </a>
    </li>
<?php endif; ?>

<?php if ($phone): ?>
    <li class="contact-details__item">
        <a class="contact-details__item-link"
           href="tel:<?= $phone ?>"
           title="<?= esc_attr(__portfolio('Appeler Eline Schmitz')) ?>"
           target="_blank"
           rel="noopener noreferrer"
           itemprop="telephone">
            <?= esc_html($reformated_phone) ?>
        </a>
    </li>
<?php endif; ?>

<?php if ($address): ?>
    <li class="contact-details__item" itemprop="address">
        <?= esc_html($address) ?>
    </li>
<?php endif; ?>