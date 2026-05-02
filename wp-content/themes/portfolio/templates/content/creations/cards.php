<?php
// récupérer le filtre dans l'url
$filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : 'all';

// construire la requête
$args = [
        'post_type' => 'creation',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
];

// ajouter un tax_query si un filtre est actif
if ($filter !== 'all') {
    $args['tax_query'] = [
            [
                    'taxonomy' => 'creation_type',
                    'field' => 'slug',
                    'terms' => $filter,
            ]
    ];
}

// lancer la requête
$creations = new WP_Query($args);
?>

<?php if ($creations->have_posts()): ?>
    <div class="creations__cards"
         itemscope
         itemtype="https://schema.org/ItemList"
         itemprop="mainEntity">
        <?php while ($creations->have_posts()): ?>

            <?php $creations->the_post(); ?>

            <?php
            $types = get_the_terms(get_the_ID(), 'creation_type');
            $type_slug = ($types && !is_wp_error($types)) ? $types[0]->slug : 'none';
            $raw_slug = preg_replace('/-[a-z]{2}$/', '', $type_slug);
            $en_slugs = [
                    'web' => 'web',
                    'mobile' => 'mobile',
                    'autres' => 'others',
            ];
            $normalized_type = $en_slugs[$raw_slug] ?? $raw_slug;

            $image = get_field('creation_image');
            $link = get_field('creation_link');
            ?>

            <article class="creations__card"
                     data-type="<?= esc_attr($normalized_type) ?>"
                     itemprop="itemListElement"
                     itemscope
                     itemtype="https://schema.org/CreativeWork">
                <a class="creations__card-link"
                   href="<?= esc_url($link['url']); ?>"
                   title="<?= esc_attr($link['title']); ?>"
                   itemprop="url">
                    <?php if (!empty($image)): ?>
                        <figure class="creations__image-container image-container">
                            <img class="creations__image"
                                 src="<?= esc_url($image['url']) ?>"
                                 alt="<?= esc_attr($image['alt']); ?>"
                                 itemprop="image">
                        </figure>
                    <?php endif; ?>
                    <h3 class="creations__name" itemprop="name">
                        <?= esc_html(get_the_title()); ?>
                    </h3>
                </a>
            </article>

        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>