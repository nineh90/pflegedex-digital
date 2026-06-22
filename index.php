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
            Pflegedokumentation.<br>
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

        <div class="badge hero-badge">
            <span>🤖 Powered by KI</span>
            <span class="dot">·</span>
            <span>🏠 100% on-premise</span>
            <span class="dot">·</span>
            <span>🔒 DSGVO-konform</span>
        </div>
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
            <!-- Karte 1 -->
            <div class="ps-card reveal">
                <div class="ps-row">
                    <span class="ps-icon" aria-hidden="true">❌</span>
                    <span class="ps-bad">Papierbasierte Dokumentation</span>
                </div>
                <div class="ps-arrow">↓</div>
                <div class="ps-row">
                    <span class="ps-icon" aria-hidden="true">✅</span>
                    <span class="ps-good">Digitale Pflegeberichte – schnell erfasst, sauber strukturiert</span>
                </div>
            </div>

            <!-- Karte 2 -->
            <div class="ps-card reveal">
                <div class="ps-row">
                    <span class="ps-icon" aria-hidden="true">❌</span>
                    <span class="ps-bad">Datenschutz-Risiken in der Cloud</span>
                </div>
                <div class="ps-arrow">↓</div>
                <div class="ps-row">
                    <span class="ps-icon" aria-hidden="true">✅</span>
                    <span class="ps-good">Daten nur auf Ihrem Server – nichts verlässt das Haus</span>
                </div>
            </div>

            <!-- Karte 3 -->
            <div class="ps-card reveal">
                <div class="ps-row">
                    <span class="ps-icon" aria-hidden="true">❌</span>
                    <span class="ps-bad">Komplizierte, überladene Software</span>
                </div>
                <div class="ps-arrow">↓</div>
                <div class="ps-row">
                    <span class="ps-icon" aria-hidden="true">✅</span>
                    <span class="ps-good">Intuitiv, rollenbasiert, sofort einsatzbereit</span>
                </div>
            </div>
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
