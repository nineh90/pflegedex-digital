<?php
/**
 * index.php – Pflegedex Startseite (One-Pager Einstieg)
 * ------------------------------------------------------
 * Sektionen (siehe CLAUDE.md):
 *   1. Hero
 *   2. Problem -> Lösung
 *   3. Features
 *   4. Trust / Datenschutz
 *   5. Zielgruppen
 *   6. Demo-Video-Platzhalter
 *   7. Kontakt-/Demo-CTA
 *   8. Footer
 */

require_once __DIR__ . '/config.php';

// Pfad-/Nav-Variablen für Header & Footer.
$root        = '';        // Startseite liegt im Root.
$currentPage = 'home';

require __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     1. HERO
     ============================================================ -->
<section class="hero">
    <div class="container">
        <h1>
            <!-- &shy; = weiches Trennzeichen: unsichtbar, bricht NUR bei
                 Platznot an dieser Stelle ("Pflege-/dokumentation"). -->
            Pflege&shy;dokumentation.<br>
            <span class="accent">Sicher. Lokal. Intelligent.</span>
        </h1>
        <p class="hero-sub">
            Die KI-gestützte Software für Pflegeeinrichtungen –
            Ihre Daten bleiben bei Ihnen.
        </p>

        <div class="hero-actions">
            <a href="pages/kontakt.php" class="btn btn-primary">Demo anfragen</a>
            <a href="#features" class="btn btn-ghost">Funktionen entdecken</a>
        </div>

        <!-- EKG-Band: feine Herzschlag-Linie als Marken-Akzent.
             Eine "Sweep"-Linie läuft über die ruhende Grundlinie (wie ein
             Monitor). Reine Deko -> aria-hidden. Animation wird bei
             prefers-reduced-motion automatisch abgeschaltet (siehe CSS). -->
        <div class="hero-ekg" aria-hidden="true">
            <svg viewBox="0 0 600 80" preserveAspectRatio="none" role="presentation" focusable="false">
                <!-- pathLength="100" normiert die Länge -> Animation unabhängig von der echten Pfadlänge -->
                <path class="ekg-base"  pathLength="100" d="M0 40 L60 40 L70 34 L80 40 L95 40 L100 46 L108 12 L116 58 L122 40 L140 40 L150 33 L160 40 L200 40 L260 40 L270 34 L280 40 L295 40 L300 46 L308 12 L316 58 L322 40 L340 40 L350 33 L360 40 L400 40 L460 40 L470 34 L480 40 L495 40 L500 46 L508 12 L516 58 L522 40 L540 40 L550 33 L560 40 L600 40"/>
                <path class="ekg-trace" pathLength="100" d="M0 40 L60 40 L70 34 L80 40 L95 40 L100 46 L108 12 L116 58 L122 40 L140 40 L150 33 L160 40 L200 40 L260 40 L270 34 L280 40 L295 40 L300 46 L308 12 L316 58 L322 40 L340 40 L350 33 L360 40 L400 40 L460 40 L470 34 L480 40 L495 40 L500 46 L508 12 L516 58 L522 40 L540 40 L550 33 L560 40 L600 40"/>
            </svg>
        </div>

        <!-- Trust-Badges mit Inline-SVG-Icons (keine Emojis, keine CDN-Abhängigkeit).
             Icons erben die Farbe per currentColor -> einheitliches Bordeaux. -->
        <ul class="hero-badges">
            <li><?= pflegedex_icon('server') ?><span>Eigener Server</span></li>
            <li><?= pflegedex_icon('shield') ?><span>DSGVO-konform</span></li>
            <li><?= pflegedex_icon('ai') ?><span>KI-gestützt</span></li>
        </ul>
    </div>
</section>

<!-- ============================================================
     2. PROBLEM -> LÖSUNG
     ============================================================ -->
<section class="section section--light">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Warum Pflegedex</span>
            <h2>Von der Zettelwirtschaft zur sicheren Digitaldoku</h2>
            <p class="section-sub">
                Pflegedex löst die drei größten Probleme der täglichen
                Dokumentation – ohne neue Risiken zu schaffen.
            </p>
        </div>

        <div class="grid grid-3">
            <?php
            // Problem -> Lösung Paare. Erst das Problem (Status quo),
            // dann die Pflegedex-Lösung.
            $problemSolutions = [
                ['Papierbasierte Dokumentation',        'Digitale Pflegeberichte – schnell erfasst, sauber strukturiert'],
                ['Datenschutz-Risiken in der Cloud',    'Daten nur auf Ihrem Server – nichts verlässt das Haus'],
                ['Komplizierte, überladene Software',   'Intuitiv, rollenbasiert, sofort einsatzbereit'],
            ];

            // Icons aus dem zentralen Helper (X/Haken kräftiger, Pfeil am kräftigsten).
            $iconBad   = pflegedex_icon('x', 2.2);
            $iconGood  = pflegedex_icon('check', 2.2);
            $iconArrow = pflegedex_icon('arrow-down', 2.4);

            foreach ($problemSolutions as $ps): ?>
            <div class="ps-card reveal">
                <div class="ps-row ps-row--bad">
                    <span class="ps-icon" aria-hidden="true"><?= $iconBad ?></span>
                    <span class="ps-bad"><?= htmlspecialchars($ps[0]) ?></span>
                </div>
                <div class="ps-arrow" aria-hidden="true"><?= $iconArrow ?></div>
                <div class="ps-row ps-row--good">
                    <span class="ps-icon" aria-hidden="true"><?= $iconGood ?></span>
                    <span class="ps-good"><?= htmlspecialchars($ps[1]) ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     3. FEATURES
     ============================================================ -->
<section class="section" id="features">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Funktionen</span>
            <h2>Alles, was eine moderne Pflegedoku braucht</h2>
            <p class="section-sub">
                Durchdacht für den Pflegealltag – und kompromisslos beim Datenschutz.
            </p>
        </div>

        <div class="grid grid-3">
            <?php
            // Feature-Liste -> [ Icon-Name (includes/icons.php), Titel, Beschreibung ]
            $features = [
                ['server',    'Lokaler Betrieb',       'Keine Cloud, kein Datenverlust. Pflegedex läuft auf Ihrem eigenen Heimserver.'],
                ['lock',      'Pseudonymisierung',     'Bewohnerdaten werden automatisch geschützt – auch gegenüber der KI.'],
                ['ai',        'KI-Unterstützung',      'Pflegeberichte KI-gestützt vorbereiten. Ausgaben sind immer nur Entwürfe.'],
                ['users',     'Rollenkonzept',         'Admin, PDL, Pflegekraft – jeder sieht nur, was er sehen darf.'],
                ['doc-check', 'Audit-Trail',           'Lückenlose, unveränderliche Dokumentation. Signierte Berichte bleiben erhalten.'],
                ['package',   'Einfache Installation', 'Docker-basiert – läuft auf nahezu jedem Heimserver.'],
            ];
            foreach ($features as $f): ?>
            <div class="feature-card reveal">
                <div class="feature-icon" aria-hidden="true"><?= pflegedex_icon($f[0]) ?></div>
                <h3><?= htmlspecialchars($f[1]) ?></h3>
                <p><?= htmlspecialchars($f[2]) ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <p class="text-center mt-lg mb-0">
            <a href="pages/funktionen.php" class="btn btn-outline-dark">Alle Funktionen im Detail</a>
        </p>
    </div>
</section>

<!-- ============================================================
     4. TRUST / DATENSCHUTZ
     ============================================================ -->
<section class="section trust">
    <div class="container">
        <span class="eyebrow" style="color:#fff;">Datensouveränität</span>
        <h2>Ihre Pflegedaten verlassen niemals Ihr Haus.</h2>
        <p class="trust-lead">
            Pflegedex ist bewusst als On-Premise-Lösung gebaut. Keine fremden
            Server, keine Drittanbieter, kein SaaS – volle Kontrolle bleibt bei Ihnen.
        </p>

        <div class="trust-points">
            <?php
            // Trust-Punkte -> [ Icon-Name (includes/icons.php), Titel, Untertitel ].
            // Icons erben hier Weiß (currentColor), da auf dem Bordeaux-Band.
            $trustPoints = [
                ['shield',    'DSGVO-konform',        'Datenschutz by Design'],
                ['cloud-off', 'Kein SaaS',            'Läuft komplett bei Ihnen'],
                ['share-off', 'Keine Drittanbieter',  'Keine Datenweitergabe'],
            ];
            foreach ($trustPoints as $tp): ?>
            <div class="trust-point">
                <span class="tp-icon" aria-hidden="true"><?= pflegedex_icon($tp[0]) ?></span>
                <strong><?= htmlspecialchars($tp[1]) ?></strong>
                <span><?= htmlspecialchars($tp[2]) ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     5. ZIELGRUPPEN
     ============================================================ -->
<section class="section section--light">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Für wen</span>
            <h2>Für wen ist Pflegedex gemacht?</h2>
        </div>

        <div class="grid grid-3">
            <?php
            // Zielgruppen -> [ Icon-Name (includes/icons.php), Titel, Beschreibung ]
            $audiences = [
                ['building', 'Stationäre Pflegeeinrichtungen',
                    'Häuser mit 10–100 Bewohnern, die ihre Dokumentation modernisieren wollen.'],
                ['monitor', 'Einrichtungen mit eigenem Heimserver',
                    'IT-Verantwortliche, die Software lieber im eigenen Haus betreiben.'],
                ['medal', 'Träger mit Anspruch an Datensouveränität',
                    'Kleine bis mittlere Träger (1–3 Häuser), die Verlässlichkeit priorisieren.'],
            ];
            foreach ($audiences as $a): ?>
            <div class="audience-card reveal">
                <span class="ac-icon" aria-hidden="true"><?= pflegedex_icon($a[0]) ?></span>
                <div>
                    <h3><?= htmlspecialchars($a[1]) ?></h3>
                    <p><?= htmlspecialchars($a[2]) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     6. DEMO-VIDEO (Platzhalter – Video folgt)
     ============================================================ -->
<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Einblick</span>
            <h2>Pflegedex in Aktion</h2>
            <p class="section-sub">Ein kurzes Demo-Video ist in Vorbereitung.</p>
        </div>

        <div class="video-placeholder reveal">
            <!-- EKG als dezenter Karten-Hintergrund (gleiche animierte Linie
                 wie im Hero, nur als Watermark hinter dem Text). -->
            <div class="video-ekg" aria-hidden="true">
                <svg viewBox="0 0 600 80" preserveAspectRatio="none" role="presentation" focusable="false">
                    <path class="ekg-base"  pathLength="100" d="M0 40 L60 40 L70 34 L80 40 L95 40 L100 46 L108 12 L116 58 L122 40 L140 40 L150 33 L160 40 L200 40 L260 40 L270 34 L280 40 L295 40 L300 46 L308 12 L316 58 L322 40 L340 40 L350 33 L360 40 L400 40 L460 40 L470 34 L480 40 L495 40 L500 46 L508 12 L516 58 L522 40 L540 40 L550 33 L560 40 L600 40"/>
                    <path class="ekg-trace" pathLength="100" d="M0 40 L60 40 L70 34 L80 40 L95 40 L100 46 L108 12 L116 58 L122 40 L140 40 L150 33 L160 40 L200 40 L260 40 L270 34 L280 40 L295 40 L300 46 L308 12 L316 58 L322 40 L340 40 L350 33 L360 40 L400 40 L460 40 L470 34 L480 40 L495 40 L500 46 L508 12 L516 58 L522 40 L540 40 L550 33 L560 40 L600 40"/>
                </svg>
            </div>
            <div class="video-content">
                <strong>Demo-Video folgt in Kürze</strong>
                <span>Sie möchten Pflegedex jetzt schon sehen? Fragen Sie eine persönliche Demo an.</span>
                <!-- Dezenter Outline-Button (sekundär), damit er sich vom
                     gefüllten Haupt-CTA in der Sektion direkt darunter abhebt. -->
                <a href="pages/kontakt.php" class="btn btn-outline-dark btn-sm">Demo anfragen</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     7. MITGESTALTEN – In 3 Schritten zur Demo
     ============================================================ -->
<section class="section section--light" id="mitgestalten">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Kostenlos testen &amp; mitgestalten</span>
            <h2>In drei Schritten zu Ihrer Demo</h2>
            <p class="section-sub">
                Testen Sie Pflegedex unverbindlich – und sagen Sie uns, was Sie
                wirklich brauchen. Ihre Ideen fließen direkt in die Entwicklung ein,
                damit die Software zu Ihrem Haus passt.
            </p>
        </div>

        <div class="steps">
            <?php
            // [ Schritt-Titel, Beschreibung ] – Nummer kommt automatisch aus der Schleife.
            $steps = [
                ['Kostenlos anfragen',
                 'Schreiben Sie uns kurz – wir richten Ihnen eine unverbindliche Demo von Pflegedex ein. Ohne Kosten, ohne Verpflichtung.'],
                ['In Ruhe ausprobieren',
                 'Testen Sie Pflegedex in Ihrem eigenen Tempo und im echten Pflegealltag. Schauen Sie, was zu Ihrem Haus passt.'],
                ['Mitgestalten',
                 'Sagen Sie uns, was Sie brauchen oder anders machen würden. Ihr Feedback fließt direkt in die Weiterentwicklung ein.'],
            ];
            foreach ($steps as $i => $step): ?>
            <div class="step reveal">
                <div class="step-num"><?= $i + 1 ?></div>
                <h3><?= htmlspecialchars($step[0]) ?></h3>
                <p><?= htmlspecialchars($step[1]) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     8. KONTAKT / DEMO-CTA
     ============================================================ -->
<section class="section trust" id="demo">
    <div class="container text-center">
        <h2>Jetzt kostenlos testen – und mitgestalten</h2>
        <p class="trust-lead">
            Fordern Sie Ihre unverbindliche Demo an: Sie testen Pflegedex ohne
            Kosten, und wir hören zu, was Ihr Haus wirklich braucht – persönlich
            aus dem Münsterland.
        </p>
        <a href="pages/kontakt.php" class="btn btn-primary">Demo kostenlos anfragen</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
