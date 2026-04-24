<?php
$languages = pll_the_languages(['raw' => 1]);
$currentLanguage = pll_current_language();
?>

<!doctype html>
<html lang="<?= $currentLanguage ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Eline Schmitz">
    <meta name="keywords"
          content="Eline Schmitz, portfolio, <?= __portfolio('design web, développement web, brutalisme, minimalisme') ?>">
    <meta name="description"
          content="<?= __portfolio('Portfolio d’Eline Schmitz, étudiante en Infographie. Découvrez mes créations et mon univers.') ?>">
    <link rel="canonical" href="<?= get_permalink(); ?>">
    <link rel="stylesheet" type="text/css" href="<?= portfolio_asset('css') ?>">
    <script defer type="module" src="<?= portfolio_asset('js') ?>"></script>
    <title>
        <?php if (is_404()): ?>
            404 - <?= __portfolio('Portfolio d’Eline Schmitz') ?>
        <?php else: ?>
            <?= get_the_title() ?> - <?= __portfolio('Portfolio d’Eline Schmitz') ?>
        <?php endif; ?>
    </title>
</head>
<body>
<h1 class="sro">
    <?php if (is_404()): ?>
        404
    <?php else: ?>
        <?= get_the_title() ?>
    <?php endif; ?>
</h1>

<header class="header">
    <a class="header__home-link" href="<?= home_url(); ?>"
       title="<?= __portfolio('Vers la page d’accueil') ?>">
        Eline Schmitz
    </a>

    <div class="header__nav-container">
        <button class="header__burger" aria-expanded="false" aria-controls="header-nav">
            <span class="sro"><?= __portfolio('Ouvrir le menu') ?></span>
            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 1C0 0.447715 0.447715 0 1 0H19C19.5523 0 20 0.447715 20 1C20 1.55228 19.5523 2 19 2H1C0.447716 2 0 1.55228 0 1Z"
                      fill="currentColor"/>
                <path d="M0 7C0 6.44772 0.447715 6 1 6H19C19.5523 6 20 6.44772 20 7C20 7.55228 19.5523 8 19 8H1C0.447716 8 0 7.55228 0 7Z"
                      fill="currentColor"/>
                <path d="M0 13C0 12.4477 0.447715 12 1 12H19C19.5523 12 20 12.4477 20 13C20 13.5523 19.5523 14 19 14H1C0.447716 14 0 13.5523 0 13Z"
                      fill="currentColor"/>
            </svg>
        </button>

        <nav class="header__nav" role="navigation" id="header-nav">
            <h2 class="header__nav-title sro"><?= __portfolio('Navigation de l’en-tête de page') ?></h2>

            <ul class="header__nav-list">
                <li class="header__nav-close">
                    <button class="header__close">
                        <span class="sro"><?= __portfolio('Fermer le menu') ?></span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.7452 0.393544C18.2608 -0.131335 19.0975 -0.131028 19.6134 0.393544C20.1292 0.918781 20.1292 1.77163 19.6134 2.29686L11.7745 10.2783L19.0665 17.7031C19.5823 18.2284 19.5823 19.0812 19.0665 19.6064C18.5507 20.1311 17.714 20.1313 17.1983 19.6064L9.90536 12.1807L2.80184 19.415C2.28602 19.94 1.44945 19.9401 0.933676 19.415C0.417937 18.8898 0.418005 18.0379 0.933676 17.5127L8.03817 10.2783L0.386801 2.48729C-0.128883 1.96205 -0.128984 1.11014 0.386801 0.584951C0.902579 0.0600101 1.73918 0.0600145 2.25496 0.584951L9.90536 8.37499L17.7452 0.393544Z"
                                  fill="currentColor"/>
                        </svg>
                    </button>
                </li>

                <?php foreach (portfolio_get_navigation_links('header') as $link) : ?>
                    <li class="header__nav-item">
                        <?php
                        $currentPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                        $link_path = parse_url($link->href, PHP_URL_PATH);
                        ?>

                        <a class="header__nav-link <?= ($currentPage === $link_path) ? 'active' : '' ?>"
                           href="<?= $link->href ?>"
                           title="<?= $link->title ?>" <?= ($currentPage === $link_path) ? 'aria-current="page"' : '' ?>>
                            <span><?= $link->label ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="header__lang">
                <?php foreach ($languages as $lang): ?>
                    <?php if ($lang['slug'] !== $currentLanguage): ?>
                        <a class="header__lang-link" href="<?= $lang['url'] ?>"
                           title="<?= __portfolio('Traduire en anglais') ?>">
                            <?= strtoupper($lang['slug']) ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </nav>
    </div>
</header>

<main>