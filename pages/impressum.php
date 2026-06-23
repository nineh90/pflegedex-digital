<?php
/**
 * pages/impressum.php – Impressum (§ 5 DDG / § 18 MStV)
 * -----------------------------------------------------
 * Pflichtangaben gemäß DDG/MStV für pflegedex-digital.de.
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
            <h1 class="page-title" style="margin-top:0;">Impressum</h1>

            <h3>Angaben gemäß § 5 DDG</h3>
            <p>
                Nils-Digital<br>
                Permer Stollen 6<br>
                49479 Ibbenbüren<br>
                Deutschland
            </p>

            <h3>Vertreten durch</h3>
            <p>
                Nils Nehring &amp; Kevin Herrmann<br>
                Gründer und Entwickler
            </p>

            <h3>Kontakt</h3>
            <p>
                Telefon: <a href="tel:+4915229581766">0152 29581766</a><br>
                E-Mail: <a href="mailto:<?= PFLEGEDEX_CONTACT_EMAIL ?>"><?= PFLEGEDEX_CONTACT_EMAIL ?></a>
            </p>

            <h3>Umsatzsteuer</h3>
            <p>
                Als Kleinunternehmer im Sinne von § 19 UStG erheben wir keine
                Umsatzsteuer und weisen diese daher nicht aus.
            </p>

            <h3>Verantwortlich für den Inhalt nach § 18 Abs. 2 MStV</h3>
            <p>
                Nils Nehring<br>
                Permer Stollen 6, 49479 Ibbenbüren
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
