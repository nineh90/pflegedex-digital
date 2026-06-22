<?php
/**
 * config.example.php – Vorlage für die zentrale Konfiguration
 * -----------------------------------------------------------
 * Diese Datei DARF ins Repo (enthält keine Geheimnisse).
 *
 * Setup:
 *   1. Kopiere diese Datei zu config.php  (cp config.example.php config.php)
 *   2. Trage in config.php die echten Werte ein (z.B. n8n-Webhook-URL).
 *
 * config.php selbst ist in .gitignore und wird NICHT gepusht.
 */

// -----------------------------------------------------------------
//  Kontaktformular
// -----------------------------------------------------------------

/**
 * n8n-Webhook-URL für eingehende Demo-/Kontaktanfragen.
 * Solange dieser String LEER ist, fällt das Formular automatisch
 * auf den E-Mail-Versand (mailto / PHP mail) zurück.
 *
 * Beispiel: 'https://n8n.nils-digital.de/webhook/pflegedex-kontakt'
 */
define('PFLEGEDEX_WEBHOOK_URL', '');

/** Empfänger-Adresse für den mailto-/mail()-Fallback. */
define('PFLEGEDEX_CONTACT_EMAIL', 'info@nils-digital.de');

// -----------------------------------------------------------------
//  Allgemeine Seiten-Infos (für SEO / Footer)
// -----------------------------------------------------------------

define('PFLEGEDEX_SITE_NAME', 'Pflegedex');
define('PFLEGEDEX_DOMAIN', 'pflegedex-digital.de');
define('PFLEGEDEX_YEAR', date('Y'));

// -----------------------------------------------------------------
//  Marketing-/Hinweis-Modus
// -----------------------------------------------------------------

/**
 * Solange die Seite als Demo läuft, bleibt "noindex" aktiv, damit
 * Google die unfertige Seite nicht indexiert. Vor dem Live-Gang
 * einfach auf false setzen (siehe CLAUDE.md).
 */
define('PFLEGEDEX_NOINDEX', true);
