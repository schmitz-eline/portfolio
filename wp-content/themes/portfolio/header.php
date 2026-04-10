<?php
$languages = pll_the_languages(['raw' => 1]);
$current = pll_current_language();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= get_the_title(); ?> - <?= __portfolio('Portfolio d’Eline Schmitz') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= portfolio_asset('css') ?>">
    <script src="<?= portfolio_asset('js') ?>" defer></script>
</head>
<body>
<h1 class="sro"><?= get_the_title(); ?></h1>

<nav class="navigation">
    <h2 class="navigation__title sro"><?= __portfolio('Menu de navigation') ?></h2>

    <a class="navigation__link navigation__link--home" href="<?= home_url(); ?>"
       title="<?= __portfolio('Vers la page d’accueil') ?>">
        Eline Schmitz
    </a>

    <ul class="navigation__list">
        <?php foreach (portfolio_get_navigation_links('header') as $link) : ?>
            <li class="navigation__list-item">
                <a class="navigation__link" href="<?= $link->href ?>" title="<?= $link->title ?>">
                    <?= $link->label ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="navigation__lang">
        <?php foreach ($languages as $lang): ?>
            <?php if ($lang['slug'] !== $current): ?>
                <a href="<?= $lang['url'] ?>" title="<?= __portfolio('Traduire en Anglais') ?>">
                    <?= strtoupper($lang['slug']) ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</nav>