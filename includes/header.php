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

// Zentrale Inline-SVG-Icons (pflegedex_icon()) überall verfügbar machen.
require_once __DIR__ . '/icons.php';

// Defaults setzen, damit nichts undefiniert ist.
$root        = $root        ?? '';
$currentPage = $currentPage ?? 'home';
$pageTitle   = $pageTitle   ?? 'Pflegedex – KI-Pflegedokumentation on-premise | Nils-Digital';
$pageDesc    = $pageDesc    ?? 'Pflegedex: Die sichere, KI-gestützte Pflegedokumentations-Software für Pflegeeinrichtungen. 100% lokal, DSGVO-konform, auf Ihrem Server. Ein Produkt von Nils-Digital.';

// Kanonische URL der aktuellen Seite (Duplicate-Content-Schutz, z.B. /index.php -> /).
$canonicalPath = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$canonicalPath = preg_replace('#/index\.php$#', '/', $canonicalPath);
$canonical     = $canonical ?? ('https://pflegedex-digital.de' . $canonicalPath);

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

    <!-- Kanonische URL (verhindert Duplicate Content) -->
    <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

    <!-- Open Graph (Social Sharing) -->
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="de_DE">
    <meta property="og:site_name" content="Pflegedex">
    <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
    <meta property="og:image" content="https://pflegedex-digital.de/assets/images/logo/pflegedex_icon_512.png">
    <meta property="og:image:width" content="512">
    <meta property="og:image:height" content="512">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="https://pflegedex-digital.de/assets/images/logo/pflegedex_icon_512.png">

    <!-- Theme-Farbe für mobile Browser (Bordeaux) -->
    <meta name="theme-color" content="#9B1C3B">

    <!-- Favicon / App-Icons (Logo von Kevin) -->
    <link rel="icon" type="image/svg+xml" href="<?= $root ?>assets/images/logo/pflegedex_icon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $root ?>assets/images/logo/pflegedex_favicon_32.png">
    <link rel="apple-touch-icon" href="<?= $root ?>assets/images/logo/pflegedex_icon_192.png">
    <link rel="manifest" href="<?= $root ?>site.webmanifest">

    <!-- Schriften: Inter (Fließtext) + Poppins (Headlines) – lokal gehostet,
         DSGVO-konform (keine Verbindung zu Google-Servern). -->
    <link rel="preload" href="<?= $root ?>assets/fonts/inter-400-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?= $root ?>assets/fonts/poppins-700-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="<?= $root ?>assets/fonts/fonts.css">

    <!-- Haupt-Stylesheet (lokal, kein CDN) -->
    <link rel="stylesheet" href="<?= $root ?>assets/css/style.css">

    <!-- Strukturierte Daten (JSON-LD): hilft Google, Pflegedex als Software-
         Produkt von Nils-Digital eindeutig zu verstehen. -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Organization",
          "@id": "https://pflegedex-digital.de/#organization",
          "name": "Nils-Digital",
          "url": "https://nils-digital.de",
          "description": "Nils-Digital (Nils Nehring & Kevin Herrmann) entwickelt digitale Lösungen aus dem Münsterland – darunter Pflegedex."
        },
        {
          "@type": "WebSite",
          "@id": "https://pflegedex-digital.de/#website",
          "url": "https://pflegedex-digital.de/",
          "name": "Pflegedex",
          "inLanguage": "de",
          "publisher": { "@id": "https://pflegedex-digital.de/#organization" }
        },
        {
          "@type": "SoftwareApplication",
          "name": "Pflegedex",
          "applicationCategory": "BusinessApplication",
          "operatingSystem": "Docker / Linux (on-premise)",
          "url": "https://pflegedex-digital.de/",
          "image": "https://pflegedex-digital.de/assets/images/logo/pflegedex_icon_512.png",
          "description": "KI-gestützte, lokale Pflegedokumentations-Software für Pflegeeinrichtungen. 100% on-premise, DSGVO-konform – Pflegedaten bleiben auf dem eigenen Server.",
          "publisher": { "@id": "https://pflegedex-digital.de/#organization" }
        }
      ]
    }
    </script>
</head>
<body>

<!-- Skip-Link für Screenreader / Tastatur-Navigation -->
<a href="#main" class="skip-link">Zum Inhalt springen</a>

<header class="site-header" id="siteHeader">
    <div class="container nav-wrap">

        <!-- Logo (Wortmarke) -->
        <a href="<?= $root ?>index.php" class="brand" aria-label="Pflegedex – zur Startseite">
            <img src="<?= $root ?>assets/images/logo/pflegedex_logo.svg"
                 alt="Pflegedex – Pflegedokumentation"
                 class="brand-logo" width="520" height="120">
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
