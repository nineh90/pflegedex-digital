<?php
/**
 * pages/impressum.php – Impressum (§ 5 DDG / § 18 MStV)
 * -----------------------------------------------------
 * ACHTUNG: Diese Seite enthält bewusst klar markierte PLATZHALTER.
 * Vor dem Live-Gang müssen alle <span class="placeholder">…</span>
 * durch die echten rechtlichen Angaben ersetzt werden.
 */

require_once __DIR__ . '/../config.php';

$root        = '../';
$currentPage = '';
$pageTitle   = 'Impressum | Pflegedex';
$pageDesc    = 'Impressum der Pflegedex-Website – ein Produkt von Nils-Digital.';

require __DIR__ . '/../includes/header.php';
?>

<section class="section">
    <div class="container">
        <div class="legal">
            <span class="eyebrow">Rechtliches</span>
            <h2 style="margin-top:0;">Impressum</h2>

            <p style="color:var(--pflege-muted);">
                <strong>Hinweis (Demo):</strong> Die mit
                <span class="placeholder">[PLATZHALTER]</span> markierten Felder
                sind vor dem Live-Gang durch die echten Angaben zu ersetzen.
            </p>

            <h3>Angaben gemäß § 5 DDG</h3>
            <p>
                <span class="placeholder">[ANBIETER / FIRMA]</span><br>
                <span class="placeholder">[STRASSE UND HAUSNUMMER]</span><br>
                <span class="placeholder">[PLZ ORT]</span><br>
                <span class="placeholder">[LAND]</span>
            </p>

            <h3>Vertreten durch</h3>
            <p>
                Nils Nehring &amp; Kevin Herrmann
                <span class="placeholder">[RECHTSFORM/VERTRETUNG PRÄZISIEREN]</span>
            </p>

            <h3>Kontakt</h3>
            <p>
                Telefon: <span class="placeholder">[TELEFONNUMMER]</span><br>
                E-Mail: <a href="mailto:<?= PFLEGEDEX_CONTACT_EMAIL ?>"><?= PFLEGEDEX_CONTACT_EMAIL ?></a>
            </p>

            <h3>Umsatzsteuer-ID</h3>
            <p>
                Umsatzsteuer-Identifikationsnummer gemäß § 27 a UStG:<br>
                <span class="placeholder">[USt-IdNr. ODER HINWEIS KLEINUNTERNEHMER]</span>
            </p>

            <h3>Verantwortlich für den Inhalt nach § 18 Abs. 2 MStV</h3>
            <p>
                <span class="placeholder">[NAME]</span><br>
                <span class="placeholder">[ANSCHRIFT]</span>
            </p>

            <h3>Verbraucherstreitbeilegung</h3>
            <p>
                Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren
                vor einer Verbraucherschlichtungsstelle teilzunehmen.
            </p>

            <h3>Haftung für Inhalte</h3>
            <p>
                Als Diensteanbieter sind wir gemäß § 7 Abs. 1 DDG für eigene Inhalte
                auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach
                §§ 8 bis 10 DDG sind wir als Diensteanbieter jedoch nicht verpflichtet,
                übermittelte oder gespeicherte fremde Informationen zu überwachen.
            </p>

            <h3>Haftung für Links</h3>
            <p>
                Unser Angebot enthält Links zu externen Websites Dritter, auf deren
                Inhalte wir keinen Einfluss haben. Für die Inhalte der verlinkten Seiten
                ist stets der jeweilige Anbieter verantwortlich.
            </p>

            <h3>Urheberrecht</h3>
            <p>
                Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen
                Seiten unterliegen dem deutschen Urheberrecht.
            </p>

            <p class="mt-lg">
                Pflegedex ist ein Produkt von
                <a href="https://nils-digital.de" target="_blank" rel="noopener">Nils-Digital</a>.
            </p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
