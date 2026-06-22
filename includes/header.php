<?php
/**
 * includes/header.php – Globaler Kopfbereich + Navigation
 * --------------------------------------------------------
 * Wird am Anfang jeder Seite eingebunden. Erwartet zwei optionale
 * Variablen, die die einbindende Seite VORHER setzen kann:
 *
 *   $root        -> Relativer Pfad zum Projekt-Root.
 *                   '' auf der Startseite, '../' in /pages/.
 *   $pageTitle   -> Eigener <title>-Text (sonst Standard).
 *   $pageDesc    -> Eigene Meta-Description (sonst Standard).
 *   $currentPage -> Slug der aktiven Seite für die Nav-Markierung
 *                   ('home' | 'funktionen' | 'datenschutz' | 'kontakt').
 *
 * config.php wird hier sicherheitshalber eingebunden, falls die Seite
 * es noch nicht getan hat.
 */

// config.php robust einbinden (egal ob Root oder /pages/).
if (!defined('PFLEGEDEX_SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}

// Defaults setzen, damit nichts undefiniert ist.
$root        = $root        ?? '';
$currentPage = $currentPage ?? 'home';
$pageTitle   = $pageTitle   ?? 'Pflegedex – KI-Pflegedokumentation on-premise | Nils-Digital';
$pageDesc    = $pageDesc    ?? 'Pflegedex: Die sichere, KI-gestützte Pflegedokumentations-Software für Pflegeeinrichtungen. 100% lokal, DSGVO-konform, auf Ihrem Server. Ein Produkt von Nils-Digital.';

/**
 * Kleine Hilfsfunktion: setzt die CSS-Klasse "is-active" auf den
 * gerade aktiven Navigationspunkt.
 */
function navActive(string $slug, string $current): string {
    return $slug === $current ? ' class="is-active"' : '';
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if (PFLEGEDEX_NOINDEX): ?>
    <!-- Demo-Phase: Suchmaschinen ausschließen. Vor Live-Gang in config.php deaktivieren. -->
    <meta name="robots" content="noindex">
    <?php endif; ?>

    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
    <meta name="keywords" content="Pflegedokumentation Software, on-premise Pflege, DSGVO Pflegeeinrichtung, KI Pflegedokumentation, Pflegesoftware lokal">
    <meta name="author" content="Nils-Digital">

    <!-- Open Graph (Social Sharing) -->
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="de_DE">

    <!-- Theme-Farbe für mobile Browser (Bordeaux) -->
    <meta name="theme-color" content="#9B1C3B">

    <!-- Google Fonts: Inter (Fließtext) + Poppins (Headlines) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Haupt-Stylesheet (lokal, kein CDN) -->
    <link rel="stylesheet" href="<?= $root ?>assets/css/style.css">
</head>
<body>

<!-- Skip-Link für Screenreader / Tastatur-Navigation -->
<a href="#main" class="skip-link">Zum Inhalt springen</a>

<header class="site-header" id="siteHeader">
    <div class="container nav-wrap">

        <!-- Wortmarke (Text-Logo – später durch Bild austauschbar) -->
        <a href="<?= $root ?>index.php" class="brand" aria-label="Pflegedex Startseite">
            <span class="brand-mark">Pflege<span class="brand-accent">dex</span></span>
        </a>

        <!-- Mobile-Toggle (per JS gesteuert) -->
        <button class="nav-toggle" id="navToggle" aria-label="Menü öffnen" aria-expanded="false" aria-controls="primaryNav">
            <span></span><span></span><span></span>
        </button>

        <!-- Hauptnavigation -->
        <nav class="primary-nav" id="primaryNav" aria-label="Hauptnavigation">
            <ul>
                <li><a href="<?= $root ?>pages/funktionen.php"<?= navActive('funktionen', $currentPage) ?>>Funktionen</a></li>
                <li><a href="<?= $root ?>pages/datenschutz.php"<?= navActive('datenschutz', $currentPage) ?>>Datenschutz</a></li>
                <li><a href="<?= $root ?>pages/kontakt.php"<?= navActive('kontakt', $currentPage) ?>>Kontakt</a></li>
                <li class="nav-cta">
                    <a href="<?= $root ?>pages/kontakt.php" class="btn btn-primary btn-sm">Demo anfragen</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<main id="main">
