<?php
/**
 * pages/funktionen.php – Detailseite Funktionen
 * ----------------------------------------------
 * Vertieft die sechs Kernfunktionen der Startseite und ergänzt den
 * geplanten Funktionsumfang (Roadmap). Inhalte stammen aus CLAUDE.md.
 */

require_once __DIR__ . '/../config.php';

$root        = '../';
$currentPage = 'funktionen';
$pageTitle   = 'Funktionen – Was Pflegedex kann | Pflegedex';
$pageDesc    = 'Alle Funktionen von Pflegedex im Überblick: lokaler Betrieb, Pseudonymisierung, KI-Unterstützung, Rollenkonzept, Audit-Trail und einfache Installation.';

require __DIR__ . '/../includes/header.php';
?>

<!-- Intro -->
<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Funktionen</span>
            <h2>Pflegedokumentation, durchdacht bis ins Detail</h2>
            <p class="section-sub">
                Pflegedex verbindet einen modernen Pflegealltag mit
                kompromisslosem Datenschutz – hier sehen Sie, wie.
            </p>
        </div>

        <!-- Detail-Features als abwechselnde Zeilen -->
        <div class="grid grid-2">
            <?php
            // [ Icon-Name (siehe includes/icons.php), Titel, Beschreibung ]
            $details = [
                ['server', 'Lokaler Betrieb',
                 'Pflegedex läuft Docker-basiert auf Ihrem eigenen Heimserver. Keine Cloud, keine fremden Rechenzentren – und damit kein Datenabfluss. Sie behalten die volle Kontrolle über Hardware und Daten.'],
                ['lock', 'Pseudonymisierung',
                 'Bewohnerdaten sind UUID-basiert strukturiert und werden vor jeder KI-Verarbeitung pseudonymisiert. So bleiben personenbezogene Informationen geschützt – auch gegenüber dem Sprachmodell.'],
                ['ai', 'KI-Unterstützung',
                 'Über eine lokale Ollama-Anbindung bereitet Pflegedex Pflegeberichte vor. Die KI-Ausgaben sind immer nur Entwürfe – nichts wird automatisch übernommen. Die Pflegekraft entscheidet.'],
                ['users', 'Rollenkonzept',
                 'Drei klar getrennte Rollen: Admin, PDL und Pflegekraft. Jede Person sieht und bearbeitet nur, was ihrer Rolle entspricht. Standort- und Wohnbereichs-Verwaltung inklusive.'],
                ['doc-check', 'Audit-Trail',
                 'Signierte Pflegeberichte werden append-only gespeichert und nie überschrieben. Das schafft eine lückenlose, nachvollziehbare und revisionssichere Dokumentation.'],
                ['package', 'Einfache Installation',
                 'Dank Docker-Setup läuft Pflegedex auf nahezu jedem Heimserver. PostgreSQL und Redis sind eingebunden – die Einrichtung übernehmen wir gemeinsam mit Ihrer IT.'],
            ];
            foreach ($details as $d): ?>
            <div class="feature-card reveal">
                <div class="feature-icon" aria-hidden="true"><?= pflegedex_icon($d[0]) ?></div>
                <h3><?= htmlspecialchars($d[1]) ?></h3>
                <p><?= htmlspecialchars($d[2]) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Technisches Fundament -->
<section class="section section--light">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Unter der Haube</span>
            <h2>Solides technisches Fundament</h2>
            <p class="section-sub">Moderne, bewährte Technologien – bewusst lokal betrieben.</p>
        </div>
        <div class="grid grid-3">
            <div class="ps-card reveal"><strong>Backend</strong><p class="muted mb-0" style="color:var(--pflege-muted-dark);">Laravel 11, PostgreSQL 16, Redis</p></div>
            <div class="ps-card reveal"><strong>Frontend</strong><p class="muted mb-0" style="color:var(--pflege-muted-dark);">Inertia.js, React 18, TypeScript</p></div>
            <div class="ps-card reveal"><strong>Betrieb &amp; KI</strong><p class="muted mb-0" style="color:var(--pflege-muted-dark);">Docker, lokale Ollama-Anbindung</p></div>
        </div>
    </div>
</section>

<!-- Roadmap -->
<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Roadmap</span>
            <h2>Was als Nächstes kommt</h2>
            <p class="section-sub">Pflegedex wächst kontinuierlich – das ist in Arbeit:</p>
        </div>
        <div class="grid grid-3">
            <div class="feature-card reveal">
                <div class="feature-icon" aria-hidden="true"><?= pflegedex_icon('signed') ?></div>
                <h3>Signierte Berichte</h3>
                <p>Append-only und revisionssicher – Berichte werden nicht überschrieben.</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon" aria-hidden="true"><?= pflegedex_icon('history') ?></div>
                <h3>Erweitertes Audit-Log</h3>
                <p>Noch feinere Nachvollziehbarkeit aller Änderungen.</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon" aria-hidden="true"><?= pflegedex_icon('link') ?></div>
                <h3>SIS-Integration</h3>
                <p>Anbindung an die Strukturierte Informationssammlung.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section trust">
    <div class="container text-center">
        <h2>Klingt passend für Ihr Haus?</h2>
        <p class="trust-lead">Lernen Sie Pflegedex in einer persönlichen Demo kennen.</p>
        <a href="kontakt.php" class="btn btn-primary">Demo anfragen</a>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
