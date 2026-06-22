<?php
/**
 * pages/datenschutz.php – Datenschutzerklärung
 * ---------------------------------------------
 * Bezieht sich AUSSCHLIESSLICH auf diese Marketing-Website
 * (pflegedex-digital.de), nicht auf die Pflegedex-Anwendung selbst.
 *
 * ACHTUNG: Enthält bewusst klar markierte PLATZHALTER, die vor dem
 * Live-Gang durch echte Angaben (Verantwortlicher, Hoster-Details,
 * ggf. Auftragsverarbeiter) ersetzt werden müssen.
 */

require_once __DIR__ . '/../config.php';

$root        = '../';
$currentPage = 'datenschutz';
$pageTitle   = 'Datenschutz | Pflegedex';
$pageDesc    = 'Datenschutzerklärung der Pflegedex-Website. Ihre Pflegedaten bleiben on-premise – diese Erklärung betrifft die Marketing-Website.';

require __DIR__ . '/../includes/header.php';
?>

<section class="section">
    <div class="container">
        <div class="legal">
            <span class="eyebrow">Rechtliches</span>
            <h2 style="margin-top:0;">Datenschutzerklärung</h2>

            <p style="color:var(--pflege-muted);">
                <strong>Hinweis (Demo):</strong> Mit
                <span class="placeholder">[PLATZHALTER]</span> markierte Felder
                sind vor dem Live-Gang zu vervollständigen. Diese Erklärung betrifft
                die Website pflegedex-digital.de – nicht die Pflegedex-Software, die
                ausschließlich lokal beim Kunden betrieben wird.
            </p>

            <h3>1. Verantwortlicher</h3>
            <p>
                Verantwortlich für die Datenverarbeitung auf dieser Website ist:<br>
                <span class="placeholder">[ANBIETER / NAME]</span><br>
                <span class="placeholder">[ANSCHRIFT]</span><br>
                E-Mail: <a href="mailto:<?= PFLEGEDEX_CONTACT_EMAIL ?>"><?= PFLEGEDEX_CONTACT_EMAIL ?></a>
            </p>

            <h3>2. Hosting</h3>
            <p>
                Diese Website wird bei
                <span class="placeholder">[HOSTER, z.B. Strato AG]</span> gehostet.
                Der Hoster verarbeitet in unserem Auftrag Daten, die technisch zur
                Auslieferung der Website nötig sind (siehe Server-Logfiles). Mit dem
                Hoster besteht ein Vertrag zur Auftragsverarbeitung (AVV).
            </p>

            <h3>3. Server-Logfiles</h3>
            <p>
                Beim Aufruf dieser Website werden automatisch Informationen in
                sogenannten Server-Logfiles gespeichert, die Ihr Browser übermittelt:
            </p>
            <ul>
                <li>Browsertyp und -version</li>
                <li>verwendetes Betriebssystem</li>
                <li>Referrer-URL</li>
                <li>Hostname des zugreifenden Rechners</li>
                <li>Uhrzeit der Serveranfrage</li>
                <li>IP-Adresse</li>
            </ul>
            <p>
                Rechtsgrundlage ist Art. 6 Abs. 1 lit. f DSGVO (berechtigtes Interesse
                an einer technisch fehlerfreien Darstellung und Sicherheit). Die
                Logfiles werden nach <span class="placeholder">[SPEICHERDAUER, z.B. 7 Tage]</span>
                automatisch gelöscht.
            </p>

            <h3>4. Kontakt- / Demo-Formular</h3>
            <p>
                Wenn Sie uns über das Formular kontaktieren, verarbeiten wir die von
                Ihnen angegebenen Daten (Name, Einrichtung, E-Mail, Nachricht) zur
                Bearbeitung Ihrer Anfrage. Die Übermittlung erfolgt an
                <span class="placeholder">[n8n-Webhook / E-Mail-Postfach]</span>.
                Rechtsgrundlage ist Art. 6 Abs. 1 lit. a und lit. b DSGVO
                (Einwilligung bzw. Anbahnung eines Vertragsverhältnisses).
                Die Daten werden gelöscht, sobald sie für den Zweck nicht mehr
                erforderlich sind.
            </p>

            <h3>5. Google Fonts</h3>
            <p>
                Diese Website bindet Schriftarten von Google Fonts ein. Beim Aufruf
                lädt Ihr Browser die Schriften von Google-Servern, wodurch Ihre
                IP-Adresse an Google übermittelt wird. Rechtsgrundlage ist Art. 6
                Abs. 1 lit. f DSGVO.
                <span class="placeholder">[OPTIONAL: Fonts lokal hosten, um diese Übermittlung zu vermeiden]</span>
            </p>

            <h3>6. Ihre Rechte</h3>
            <p>Sie haben jederzeit das Recht auf:</p>
            <ul>
                <li>Auskunft (Art. 15 DSGVO)</li>
                <li>Berichtigung (Art. 16 DSGVO)</li>
                <li>Löschung (Art. 17 DSGVO)</li>
                <li>Einschränkung der Verarbeitung (Art. 18 DSGVO)</li>
                <li>Datenübertragbarkeit (Art. 20 DSGVO)</li>
                <li>Widerspruch (Art. 21 DSGVO)</li>
            </ul>
            <p>
                Außerdem haben Sie das Recht, sich bei einer
                Datenschutz-Aufsichtsbehörde zu beschweren.
            </p>

            <h3>7. SSL-/TLS-Verschlüsselung</h3>
            <p>
                Diese Seite nutzt aus Sicherheitsgründen eine SSL-/TLS-Verschlüsselung.
                Eine verschlüsselte Verbindung erkennen Sie am „https://" in der
                Adresszeile Ihres Browsers.
            </p>

            <p class="mt-lg" style="color:var(--pflege-muted);">
                Stand: <span class="placeholder">[DATUM]</span> ·
                Pflegedex ist ein Produkt von
                <a href="https://nils-digital.de" target="_blank" rel="noopener">Nils-Digital</a>.
            </p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
