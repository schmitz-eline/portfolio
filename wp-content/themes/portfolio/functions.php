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

portfolio_get_navigation_links('header');

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