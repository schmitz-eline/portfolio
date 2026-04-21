<?php

include('core/theme/configuration.php');

register_nav_menu('header', 'Le menu qui se trouve dans le header');
register_nav_menu('footer', 'Le menu qui se trouve dans le footer');
register_nav_menu('socials', 'Le menu qui regroupe mes réseaux sociaux');
register_nav_menu('legal', 'Le menu qui contient le lien vers les mentions légales');

function portfolio_get_navigation_links(string $menu_name): array
{
    $all_menus = get_nav_menu_locations();

    if (!isset($all_menus[$menu_name])) {
        return [];
    }

    $nav_id = $all_menus[$menu_name];

    $items_menu = wp_get_nav_menu_items($nav_id);
    $links = [];

    foreach ($items_menu as $item) {
        $link = new stdClass();
        $link->href = $item->url;
        $link->label = $item->title;
        $link->title = $item->attr_title;

        $links[] = $link;
    }

    return $links;
}

function portfolio_asset(string $filename): string
{
    $manifest_path = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);

        if (isset($manifest['wp-content/themes/portfolio/assets/css/styles.scss']) && $filename === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/css/styles.scss']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/assets/js/main.js']) && $filename === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/js/main.js']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $filename;
}

load_theme_textdomain('portfolio-trad', get_template_directory() . '/locales');
function __portfolio(string $translation): ?string
{
    return __($translation, 'portfolio-trad');
}

function eline_allow_svg_uploads($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'eline_allow_svg_uploads');

register_post_type(
    'creation',
    [
        'label' => 'Créations',
        'description' => 'Les créations que j’ai réalisées',
        'menu_position' => 20,
        'menu_icon' => 'dashicons-edit',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'rewrite' => ['slug' => 'creations'],
        'has_archive' => false,
        'supports' => ['title']
    ]
);

register_taxonomy(
    'creation_type',
    [
        'creation'
    ],
    [
        'labels' => [
            'name' => 'Types de créations',
        ],
        'description' => 'Types de créations',
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_color' => true,
        'query_var' => true,
    ]
);

add_image_size('eline-small', 400, 9999);
add_image_size('eline-medium', 800, 9999);
add_image_size('eline-large', 1200, 9999);

// préférences d'affichage dans l'admin

function remove_taxonomy_box(): void
{
    remove_meta_box('tagsdiv-creation_type', 'creation', 'side');
}

add_action('admin_menu', 'remove_taxonomy_box');

function creations_add_taxonomy_column($columns)
{
    $columns['creation_type'] = 'Type de la création';
    return $columns;
}

add_filter('manage_creation_posts_columns', 'creations_add_taxonomy_column');

function creations_fill_taxonomy_column($column, $post_id): void
{
    if ($column === 'creation_type') {
        $terms = get_the_terms($post_id, 'creation_type');

        if (!empty($terms) && !is_wp_error($terms)) {
            $names = wp_list_pluck($terms, 'name');
            echo implode(', ', $names);
        } else {
            echo 'Aucun type sélectionné';
        }
    }
}

add_action('manage_creation_posts_custom_column', 'creations_fill_taxonomy_column', 10, 2);

function creations_sortable_columns($columns)
{
    $columns['creation_type'] = 'creation_type';
    return $columns;
}

add_filter('manage_edit-creation_sortable_columns', 'creations_sortable_columns');

function creations_reorder_columns($columns): array
{
    return [
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'creation_type' => 'Type de la création',
        'date' => $columns['date']
    ];
}

add_filter('manage_creation_posts_columns', 'creations_reorder_columns');