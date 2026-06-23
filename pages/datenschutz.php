<?php
/**
 * pages/datenschutz.php – Datenschutzerklärung
 * ---------------------------------------------
 * Bezieht sich AUSSCHLIESSLICH auf diese Marketing-Website
 * (pflegedex-digital.de), nicht auf die Pflegedex-Anwendung selbst.
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
            <h1 class="page-title" style="margin-top:0;">Datenschutzerklärung</h1>

            <p style="color:var(--pflege-muted);">
                Diese Erklärung betrifft die Website pflegedex-digital.de – nicht die
                Pflegedex-Software, die ausschließlich lokal beim Kunden betrieben wird.
            </p>

            <h3>1. Verantwortlicher</h3>
            <p>
                Verantwortlich für die Datenverarbeitung auf dieser Website ist:<br>
                Nils-Digital<br>
                Permer Stollen 6<br>
                49479 Ibbenbüren<br>
                E-Mail: <a href="mailto:<?= PFLEGEDEX_CONTACT_EMAIL ?>"><?= PFLEGEDEX_CONTACT_EMAIL ?></a>
            </p>

            <h3>2. Hosting</h3>
            <p>
                Diese Website wird bei der STRATO AG, Otto-Ostrowski-Straße 7,
                10249 Berlin, gehostet.
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
                Logfiles werden nach 7 Tagen automatisch gelöscht.
            </p>

            <h3>4. Reichweitenmessung (Webstatistik)</h3>
            <p>
                Auf Grundlage der oben genannten Server-Logfiles werten wir mithilfe
                der in unserem Hosting-Paket enthaltenen Webstatistik der STRATO AG
                anonymisiert aus, welche Seiten wie häufig aufgerufen werden. Diese
                Auswertung erfolgt ausschließlich serverseitig aus den ohnehin
                anfallenden Logdaten – es werden dafür <strong>keine Cookies gesetzt,
                kein zusätzliches Skript in Ihrem Browser geladen und keine Daten an
                Dritte übermittelt</strong>. Eine Zusammenführung der Daten zu
                personenbezogenen Nutzerprofilen findet nicht statt. Rechtsgrundlage
                ist Art. 6 Abs. 1 lit. f DSGVO (berechtigtes Interesse an einer
                statistischen Auswertung der Websitenutzung).
            </p>

            <h3>5. Kontakt- / Demo-Formular</h3>
            <p>
                Wenn Sie uns über das Formular kontaktieren, verarbeiten wir die von
                Ihnen angegebenen Daten (Name, Einrichtung, E-Mail, Nachricht) zur
                Bearbeitung Ihrer Anfrage. Die Übermittlung erfolgt über einen von
                uns betriebenen Automatisierungsdienst (n8n), der bei der Hostinger
                International Ltd. gehostet wird, an unser E-Mail-Postfach.
                Rechtsgrundlage ist Art. 6 Abs. 1 lit. a und lit. b DSGVO
                (Einwilligung bzw. Anbahnung eines Vertragsverhältnisses).
                Die Daten werden gelöscht, sobald sie für den Zweck nicht mehr
                erforderlich sind.
            </p>

            <h3>6. Schriftarten (lokal gehostet)</h3>
            <p>
                Diese Website verwendet die Schriftarten „Inter" und „Poppins".
                Diese werden lokal auf dem Server bereitgestellt und gemeinsam mit
                der Website ausgeliefert. Es besteht dabei <strong>keine Verbindung
                zu Servern von Google</strong> oder anderen Dritten; insbesondere wird
                Ihre IP-Adresse nicht an Google übermittelt.
            </p>

            <h3>7. Ihre Rechte</h3>
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

            <h3>8. SSL-/TLS-Verschlüsselung</h3>
            <p>
                Diese Seite nutzt aus Sicherheitsgründen eine SSL-/TLS-Verschlüsselung.
                Eine verschlüsselte Verbindung erkennen Sie am „https://" in der
                Adresszeile Ihres Browsers.
            </p>

            <p class="mt-lg" style="color:var(--pflege-muted);">
                Stand: 23.06.2026 ·
                Pflegedex ist ein Produkt von
                <a href="https://nils-digital.de" target="_blank" rel="noopener">Nils-Digital</a>.
            </p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
