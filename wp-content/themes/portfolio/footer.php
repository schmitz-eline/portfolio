<?php
$footer = portfolio_get_navigation_links('footer');
$socials = portfolio_get_navigation_links('socials');
$legal = portfolio_get_navigation_links('legal');
?>

<footer class="footer">
    <nav class="footer__nav" aria-labelledby="footer-nav-title">
        <h2 class="footer__title sro" id="footer-nav-title">Navigation</h2>

        <ul class="footer__nav-list">
            <li class="footer__nav-item">
                <span class="footer__list-title">Navigation</span>
                <ul class="footer__list" role="list">
                    <?php foreach ($footer as $link): ?>
                        <li class="footer__item">
                            <a class="footer__link" href="<?= $link->href ?>" title="<?= $link->title ?>">
                                <?= $link->label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="footer__nav-item">
                <span class="footer__list-title"><?= __portfolio('Me suivre') ?></span>
                <ul class="footer__socials" role="list">
                    <?php foreach ($socials as $link): ?>
                        <li class="footer__item">
                            <a class="footer__link" href="<?= $link->href ?>" title="<?= $link->title ?>" target="_blank" rel="noopener noreferrer">
                                <?= $link->label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="footer__legal">
        <p class="footer__copyright"><?= __portfolio('© Eline Schmitz 2026. Tous droits réservés.') ?></p>
        <a class="footer__legal-link" href="<?= $legal[0]->href ?>" title="<?= $legal[0]->title ?>">
            <?= $legal[0]->label ?>
        </a>
    </div>
</footer>

</body>
</html>