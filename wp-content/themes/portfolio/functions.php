<?php

include('core/theme/configuration.php');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');

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