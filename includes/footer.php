<?php
/**
 * includes/footer.php – Globaler Fußbereich
 * ------------------------------------------
 * Schließt <main> und <body>/<html>. Erwartet wie der Header die
 * Variable $root (Pfad zum Projekt-Root). Pflichtbestandteil laut
 * CLAUDE.md: der Hinweis "Ein Produkt von Nils-Digital".
 */
$root = $root ?? '';
?>
</main><!-- /#main -->

<footer class="site-footer">
    <div class="container footer-grid">

        <!-- Spalte 1: Marke + Kurzbeschreibung -->
        <div class="footer-brand">
            <span class="brand-mark">Pflege<span class="brand-accent">dex</span></span>
            <p class="footer-tagline">
                KI-gestützte Pflegedokumentation – sicher, lokal, intelligent.
                Ihre Pflegedaten bleiben in Ihrem Haus.
            </p>
        </div>

        <!-- Spalte 2: Seiten-Links -->
        <nav class="footer-nav" aria-label="Footer-Navigation">
            <h3 class="footer-heading">Seiten</h3>
            <ul>
                <li><a href="<?= $root ?>index.php">Startseite</a></li>
                <li><a href="<?= $root ?>pages/funktionen.php">Funktionen</a></li>
                <li><a href="<?= $root ?>pages/kontakt.php">Kontakt</a></li>
            </ul>
        </nav>

        <!-- Spalte 3: Rechtliches -->
        <nav class="footer-nav" aria-label="Rechtliches">
            <h3 class="footer-heading">Rechtliches</h3>
            <ul>
                <li><a href="<?= $root ?>pages/impressum.php">Impressum</a></li>
                <li><a href="<?= $root ?>pages/datenschutz.php">Datenschutz</a></li>
            </ul>
        </nav>
    </div>

    <!-- Untere Footer-Leiste -->
    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p>&copy; <?= PFLEGEDEX_YEAR ?> Pflegedex</p>
            <p class="footer-producer">
                Ein Produkt von
                <a href="https://nils-digital.de" target="_blank" rel="noopener">Nils-Digital</a>
            </p>
            <p class="footer-slogan">Entwickelt mit 💙 im Münsterland</p>
        </div>
    </div>
</footer>

<!-- Vanilla JS (kein Framework) -->
<script src="<?= $root ?>assets/js/main.js"></script>
</body>
</html>
