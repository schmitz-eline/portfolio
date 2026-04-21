<?php
// récupérer les taxonomies et les mettre dans le bon ordre

$creation_types = get_terms([
        'taxonomy' => 'creation_type'
]);

foreach ($creation_types as $type) {
    $type->order = get_field('order', 'creation_type_' . $type->term_id);
}

function sort_creation_types($a, $b): int
{
    if ($a->order == $b->order) {
        return 0;
    }
    return ($a->order < $b->order) ? -1 : 1;
}

usort($creation_types, 'sort_creation_types');

// récupérer les slugs en anglais
$en_slugs = [
        'web' => 'web',
        'mobile' => 'mobile',
        'autres' => 'others',
];

// récupérer l'url de la page 'Mes créations'
$creations_url = get_permalink();

// aria-labels
$aria_labels = [
        'web' => __portfolio('Afficher les créations web'),
        'mobile' => __portfolio('Afficher les créations mobile'),
        'others' => __portfolio('Afficher les autres créations'),
];
?>

<?php if (!empty($creation_types)): ?>
    <ul class="creations__filters">
        <li class="creations__filter active-filter" data-filter="all">
            <a class="creations__filter-link"
               href="<?= esc_url($creations_url); ?>"
               aria-label="<?= esc_attr(__portfolio('Afficher toutes les créations')); ?>">
                <span><?= esc_html(__portfolio('Toutes')); ?></span>
            </a>
        </li>

        <?php foreach ($creation_types as $type): ?>
            <?php
            $filter_url = add_query_arg('filter', $type->slug, $creations_url);
            $raw_slug = preg_replace('/-[a-z]{2}$/', '', $type->slug);
            $normalized_slug = $en_slugs[$raw_slug] ?? $raw_slug;
            $aria_label = $aria_labels[$normalized_slug];
            ?>

            <li class="creations__filter" data-filter="<?= esc_attr($normalized_slug); ?>">
                <a class="creations__filter-link"
                   href="<?= esc_url($filter_url); ?>"
                   aria-label="<?= esc_attr($aria_label); ?>">
                    <span><?= esc_html($type->name); ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>