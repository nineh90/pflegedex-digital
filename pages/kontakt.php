<?php
/**
 * pages/kontakt.php – Kontakt- / Demo-Anfrage
 * --------------------------------------------
 * Ablauf bei Absenden (POST):
 *   1. Honeypot- + Pflichtfeld-Prüfung (einfacher Spam-Schutz).
 *   2. Wenn eine n8n-Webhook-URL in config.php gesetzt ist:
 *      Daten als JSON per cURL an den Webhook senden.
 *   3. Fallback (keine Webhook-URL ODER cURL fehlt): per PHP mail()
 *      an die Kontaktadresse senden.
 *   4. Schlägt alles fehl, bekommt der Nutzer einen mailto-Link.
 *
 * Hinweis: Das Formular sendet an sich selbst (POST auf kontakt.php).
 */

require_once __DIR__ . '/../config.php';

// ----- Zustandsvariablen für die Ausgabe -----
$sent       = false;  // erfolgreich übermittelt?
$errorMsg   = '';      // Fehlertext für den Nutzer (immer als Klartext, wird escaped ausgegeben)
$showMailto = false;   // soll zusätzlich der direkte mailto-Link angeboten werden?
$old        = ['name' => '', 'einrichtung' => '', 'email' => '', 'nachricht' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1) Honeypot: Bots füllen das versteckte Feld "website" aus.
    $honeypot = trim($_POST['website'] ?? '');

    // Eingaben einsammeln + säubern.
    $old['name']        = trim($_POST['name'] ?? '');
    $old['einrichtung'] = trim($_POST['einrichtung'] ?? '');
    $old['email']       = trim($_POST['email'] ?? '');
    $old['nachricht']   = trim($_POST['nachricht'] ?? '');

    // 1b) Pflichtfeld- und Format-Validierung.
    if ($honeypot !== '') {
        // Bot erkannt – wir tun so, als wäre alles gut (kein Hinweis fürs Bot).
        $sent = true;
    } elseif ($old['name'] === '' || $old['email'] === '' || $old['nachricht'] === '') {
        $errorMsg = 'Bitte füllen Sie Name, E-Mail und Nachricht aus.';
    } elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMsg = 'Bitte geben Sie eine gültige E-Mail-Adresse an.';
    } else {
        // 2) Nutzlast vorbereiten.
        $payload = [
            'name'        => $old['name'],
            'einrichtung' => $old['einrichtung'],
            'email'       => $old['email'],
            'nachricht'   => $old['nachricht'],
            'quelle'      => 'pflegedex-digital.de/kontakt',
            'zeitpunkt'   => date('c'),
        ];

        $delivered = false;

        // 2a) Primär: n8n-Webhook (falls konfiguriert und cURL vorhanden).
        if (PFLEGEDEX_WEBHOOK_URL !== '' && function_exists('curl_init')) {
            $ch = curl_init(PFLEGEDEX_WEBHOOK_URL);
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => json_encode($payload),
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 8,
            ]);
            curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // 2xx = erfolgreich zugestellt.
            $delivered = ($httpCode >= 200 && $httpCode < 300);
        }

        // 3) Fallback: PHP mail() an die Kontaktadresse.
        if (!$delivered) {
            $subject = 'Neue Demo-/Kontaktanfrage über pflegedex-digital.de';
            $body =
                "Name: {$old['name']}\n" .
                "Einrichtung: {$old['einrichtung']}\n" .
                "E-Mail: {$old['email']}\n\n" .
                "Nachricht:\n{$old['nachricht']}\n";
            // Defense-in-depth: CR/LF aus der (bereits validierten) Adresse hart
            // entfernen, damit kein Header-Injection-Vektor entstehen kann.
            $replyTo = str_replace(["\r", "\n"], '', $old['email']);
            $headers =
                'From: website@' . PFLEGEDEX_DOMAIN . "\r\n" .
                'Reply-To: ' . $replyTo . "\r\n" .
                'Content-Type: text/plain; charset=UTF-8';

            // @ unterdrückt Warnungen, falls mail() auf dem Server nicht geht.
            $delivered = @mail(PFLEGEDEX_CONTACT_EMAIL, $subject, $body, $headers);
        }

        if ($delivered) {
            $sent = true;
        } else {
            // 4) Letzter Ausweg: mailto-Link anbieten. Fehlertext bleibt reiner
            //    Klartext (wird escaped ausgegeben); der Link kommt fest aus dem Template.
            $errorMsg   = 'Die Anfrage konnte technisch nicht gesendet werden. Bitte schreiben Sie uns direkt an:';
            $showMailto = true;
        }
    }
}

// ----- Seiten-Meta + Header -----
$root        = '../';
$currentPage = 'kontakt';
$pageTitle   = 'Demo anfragen – Kontakt | Pflegedex';
$pageDesc    = 'Fragen Sie eine unverbindliche Demo von Pflegedex an. Wir melden uns innerhalb von 24 Stunden.';

require __DIR__ . '/../includes/header.php';
?>

<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Kontakt</span>
            <h1 class="page-title">Demo anfragen</h1>
            <p class="section-sub">
                Erzählen Sie uns kurz von Ihrer Einrichtung – wir melden uns
                innerhalb von 24 Stunden.
            </p>
        </div>

        <div class="contact-grid">
        <div class="form-card">
            <?php if ($sent): ?>
                <!-- Erfolgsmeldung -->
                <div class="alert alert-success" role="status">
                    <strong>Vielen Dank!</strong> Ihre Anfrage ist bei uns eingegangen.
                    Wir melden uns innerhalb von 24 Stunden bei Ihnen.
                </div>
                <p class="text-center mb-0">
                    <a href="../index.php" class="btn btn-outline-dark">Zurück zur Startseite</a>
                </p>
            <?php else: ?>

                <?php if ($errorMsg !== ''): ?>
                    <div class="alert alert-error" role="alert">
                        <?= htmlspecialchars($errorMsg) ?>
                        <?php if ($showMailto): ?>
                            <a href="mailto:<?= htmlspecialchars(PFLEGEDEX_CONTACT_EMAIL) ?>"><?= htmlspecialchars(PFLEGEDEX_CONTACT_EMAIL) ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="kontakt.php" novalidate>
                    <!-- Honeypot gegen Spam-Bots (für Menschen unsichtbar) -->
                    <div class="hp-field" aria-hidden="true">
                        <label>Bitte leer lassen
                            <input type="text" name="website" tabindex="-1" autocomplete="off">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="name">Name <span class="req">*</span></label>
                        <input type="text" id="name" name="name" class="form-control"
                               required value="<?= htmlspecialchars($old['name']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="einrichtung">Einrichtung</label>
                        <input type="text" id="einrichtung" name="einrichtung" class="form-control"
                               value="<?= htmlspecialchars($old['einrichtung']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">E-Mail <span class="req">*</span></label>
                        <input type="email" id="email" name="email" class="form-control"
                               required value="<?= htmlspecialchars($old['email']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="nachricht">Nachricht <span class="req">*</span></label>
                        <textarea id="nachricht" name="nachricht" class="form-control"
                                  required placeholder="Worum geht es? Gerne mit Größe der Einrichtung."><?= htmlspecialchars($old['nachricht']) ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Anfrage senden</button>

                    <p class="form-hint">
                        Wir melden uns innerhalb von 24 Stunden. Ihre Daten werden
                        ausschließlich zur Bearbeitung Ihrer Anfrage verwendet.
                    </p>
                </form>
            <?php endif; ?>
        </div>

        <!-- Info-Panel: persönliche Note + Trust neben dem Formular -->
        <aside class="contact-info">
            <h3>Persönlich für Sie da</h3>
            <p>
                Kein Callcenter, kein Vertriebsdruck – Sie sprechen direkt mit
                den Machern von Pflegedex.
            </p>
            <ul class="contact-points">
                <li>
                    <span class="ci-icon" aria-hidden="true"><?= pflegedex_icon('clock') ?></span>
                    <div>
                        <strong>Antwort in 24 Stunden</strong>
                        <span>Wir melden uns schnell und persönlich zurück.</span>
                    </div>
                </li>
                <li>
                    <span class="ci-icon" aria-hidden="true"><?= pflegedex_icon('mail') ?></span>
                    <div>
                        <strong>Direkt schreiben</strong>
                        <a href="mailto:<?= htmlspecialchars(PFLEGEDEX_CONTACT_EMAIL) ?>"><?= htmlspecialchars(PFLEGEDEX_CONTACT_EMAIL) ?></a>
                    </div>
                </li>
                <li>
                    <span class="ci-icon" aria-hidden="true"><?= pflegedex_icon('pin') ?></span>
                    <div>
                        <strong>Aus dem Münsterland</strong>
                        <span>Regional verwurzelt und nah an Ihrer Einrichtung.</span>
                    </div>
                </li>
                <li>
                    <span class="ci-icon" aria-hidden="true"><?= pflegedex_icon('check') ?></span>
                    <div>
                        <strong>Kostenlos &amp; unverbindlich</strong>
                        <span>Testen Sie Pflegedex in Ruhe – ohne Risiko.</span>
                    </div>
                </li>
            </ul>
        </aside>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
