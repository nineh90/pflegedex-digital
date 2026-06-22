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
            <li>
                <!-- Icon: Server (on-premise) -->
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="4"  width="18" height="7" rx="1.6"/>
                    <rect x="3" y="13" width="18" height="7" rx="1.6"/>
                    <circle cx="7" cy="7.5"  r="0.9" fill="currentColor" stroke="none"/>
                    <circle cx="7" cy="16.5" r="0.9" fill="currentColor" stroke="none"/>
                </svg>
                <span>Eigener Server</span>
            </li>
            <li>
                <!-- Icon: Schild mit Haken (DSGVO) -->
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 3l7 3v5c0 4.5-3 7.6-7 9-4-1.4-7-4.5-7-9V6l7-3z"/>
                    <path d="M9 12l2 2 4-4"/>
                </svg>
                <span>DSGVO-konform</span>
            </li>
            <li>
                <!-- Icon: Funke (KI) -->
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3z"/>
                </svg>
                <span>KI-gestützt</span>
            </li>
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

            // Icons einmal definieren (statt pro Karte zu wiederholen).
            $iconBad = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>';
            $iconGood = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7"/></svg>';
            $iconArrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v13M6 12l6 6 6-6"/></svg>';

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
            // Feature-Liste als Array -> sauber wiederholbar.
            $features = [
                ['🏠', 'Lokaler Betrieb',     'Keine Cloud, kein Datenverlust. Pflegedex läuft auf Ihrem eigenen Heimserver.'],
                ['🔒', 'Pseudonymisierung',   'Bewohnerdaten werden automatisch geschützt – auch gegenüber der KI.'],
                ['🤖', 'KI-Unterstützung',    'Pflegeberichte KI-gestützt vorbereiten. Ausgaben sind immer nur Entwürfe.'],
                ['👥', 'Rollenkonzept',       'Admin, PDL, Pflegekraft – jeder sieht nur, was er sehen darf.'],
                ['📋', 'Audit-Trail',         'Lückenlose, unveränderliche Dokumentation. Signierte Berichte bleiben erhalten.'],
                ['🔧', 'Einfache Installation','Docker-basiert – läuft auf nahezu jedem Heimserver.'],
            ];
            foreach ($features as $f): ?>
            <div class="feature-card reveal">
                <div class="feature-icon"><?= $f[0] ?></div>
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
            <div class="trust-point">
                <span class="tp-icon">🛡️</span>
                <strong>DSGVO-konform</strong>
                <span>Datenschutz by Design</span>
            </div>
            <div class="trust-point">
                <span class="tp-icon">🚫</span>
                <strong>Kein SaaS</strong>
                <span>Läuft komplett bei Ihnen</span>
            </div>
            <div class="trust-point">
                <span class="tp-icon">🔐</span>
                <strong>Keine Drittanbieter</strong>
                <span>Keine Datenweitergabe</span>
            </div>
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
            <div class="audience-card reveal">
                <span class="ac-icon">🏥</span>
                <div>
                    <h3>Stationäre Pflegeeinrichtungen</h3>
                    <p>Häuser mit 10–100 Bewohnern, die ihre Dokumentation modernisieren wollen.</p>
                </div>
            </div>
            <div class="audience-card reveal">
                <span class="ac-icon">🖥️</span>
                <div>
                    <h3>Einrichtungen mit eigenem Heimserver</h3>
                    <p>IT-Verantwortliche, die Software lieber im eigenen Haus betreiben.</p>
                </div>
            </div>
            <div class="audience-card reveal">
                <span class="ac-icon">🤝</span>
                <div>
                    <h3>Träger mit Anspruch an Datensouveränität</h3>
                    <p>Kleine bis mittlere Träger (1–3 Häuser), die Verlässlichkeit priorisieren.</p>
                </div>
            </div>
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
            <div class="play" aria-hidden="true">▶</div>
            <strong>Demo-Video folgt in Kürze</strong>
            <span>Sie möchten Pflegedex jetzt schon sehen? Fragen Sie eine persönliche Demo an.</span>
        </div>
    </div>
</section>

<!-- ============================================================
     7. KONTAKT / DEMO-CTA
     ============================================================ -->
<section class="section trust" id="demo">
    <div class="container text-center">
        <h2>Bereit für sichere Pflegedokumentation?</h2>
        <p class="trust-lead">
            Vereinbaren Sie eine unverbindliche Demo. Wir zeigen Ihnen Pflegedex
            in Ruhe und beantworten Ihre Fragen – persönlich aus dem Münsterland.
        </p>
        <a href="pages/kontakt.php" class="btn btn-primary">Demo anfragen</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
