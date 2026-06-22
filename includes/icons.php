<?php
/**
 * includes/icons.php – Zentrale Inline-SVG-Icons
 * ------------------------------------------------
 * Alle Icons der Website an EINER Stelle. So sehen sie überall gleich
 * aus und müssen nur hier gepflegt werden (kein CDN, kein Icon-Font).
 *
 * Nutzung in einer Seite:
 *     <?= pflegedex_icon('server') ?>
 *
 * Farbe & Größe kommen aus dem CSS (currentColor + svg-Größe der
 * jeweiligen Eltern-Klasse, z.B. .feature-icon svg).
 *
 * Wird in includes/header.php eingebunden -> auf jeder Seite verfügbar.
 */

if (!function_exists('pflegedex_icon')) {

    /**
     * Gibt das fertige <svg>-Markup für einen Icon-Namen zurück.
     * Unbekannter Name -> leeres (aber valides) SVG, damit nichts bricht.
     *
     * @param string $name   Icon-Name (siehe $paths unten)
     * @param float  $stroke Strichstärke (Standard 1.7; z.B. 2.2 für X/Haken)
     */
    function pflegedex_icon(string $name, float $stroke = 1.7): string {
        // Einheitlicher Strich-Look; nur die Strichstärke ist variabel.
        $open = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" '
              . 'stroke-width="' . $stroke . '" stroke-linecap="round" stroke-linejoin="round" '
              . 'aria-hidden="true">';

        // Nur der innere Pfad-Teil je Icon.
        $paths = [
            // --- Kernfunktionen (identisch zur Startseite) ---
            'server'    => '<rect x="3" y="4" width="18" height="7" rx="1.6"/>'
                         . '<rect x="3" y="13" width="18" height="7" rx="1.6"/>'
                         . '<circle cx="7" cy="7.5" r="0.9" fill="currentColor" stroke="none"/>'
                         . '<circle cx="7" cy="16.5" r="0.9" fill="currentColor" stroke="none"/>',

            'lock'      => '<rect x="5" y="11" width="14" height="9" rx="2"/>'
                         . '<path d="M8 11V8a4 4 0 0 1 8 0v3"/>'
                         . '<circle cx="12" cy="15.3" r="1.1" fill="currentColor" stroke="none"/>',

            'ai'        => '<path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3z"/>',

            'users'     => '<circle cx="9" cy="8" r="3.2"/>'
                         . '<path d="M3.6 19a5.4 5.4 0 0 1 10.8 0"/>'
                         . '<path d="M16 5.2a3.2 3.2 0 0 1 0 6.1"/>'
                         . '<path d="M17.5 13.1A5.4 5.4 0 0 1 20.4 18"/>',

            'doc-check' => '<path d="M7 3h7l4 4v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/>'
                         . '<path d="M14 3v4h4"/>'
                         . '<path d="M9 14.5l2 2 3.5-3.5"/>',

            'package'   => '<path d="M21 7.5l-9-4.5-9 4.5 9 4.5 9-4.5z"/>'
                         . '<path d="M3 7.5v9l9 4.5 9-4.5v-9"/>'
                         . '<path d="M12 12v9"/>',

            // --- Hero / Trust / Problem-Lösung / Zielgruppen ---
            'shield'    => '<path d="M12 3l7 3v5c0 4.5-3 7.6-7 9-4-1.4-7-4.5-7-9V6l7-3z"/>'
                         . '<path d="M9 12l2 2 4-4"/>',

            'x'         => '<path d="M6 6l12 12M18 6L6 18"/>',

            'check'     => '<path d="M5 12.5l4.5 4.5L19 7"/>',

            'arrow-down'=> '<path d="M12 5v13M6 12l6 6 6-6"/>',

            'cloud-off' => '<path d="M17.5 19a4 4 0 0 0 .5-7.97A6 6 0 0 0 6.5 9.5 4.5 4.5 0 0 0 7 19h10.5z"/>'
                         . '<path d="M4 4l16 16"/>',

            'share-off' => '<circle cx="6" cy="12" r="2.3"/>'
                         . '<circle cx="18" cy="6.5" r="2.3"/>'
                         . '<circle cx="18" cy="17.5" r="2.3"/>'
                         . '<path d="M8.05 10.95l7.9-3.4M8.05 13.05l7.9 3.4"/>'
                         . '<path d="M3.5 3.5l17 17"/>',

            'building'  => '<path d="M3 21h18"/>'
                         . '<rect x="5" y="3" width="14" height="18" rx="1"/>'
                         . '<path d="M12 7v3M10.5 8.5h3"/>'
                         . '<path d="M10 21v-4h4v4"/>',

            'monitor'   => '<rect x="3" y="4" width="18" height="12" rx="2"/>'
                         . '<path d="M8 20h8M12 16v4"/>',

            'medal'     => '<circle cx="12" cy="9" r="6"/>'
                         . '<path d="M9 13.5L8 21l4-2 4 2-1-7.5"/>'
                         . '<path d="M9.6 9l1.7 1.7L15 7"/>',

            // --- Roadmap ---
            'signed'    => '<path d="M13 3H7a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-7"/>'
                         . '<path d="M8.5 16.6c1.2-.45 2-.45 3.2 0"/>'
                         . '<path d="M18.4 4.1a1.5 1.5 0 0 1 2.1 2.1l-6 6-2.6.6.6-2.6 5.9-6.1z"/>',

            'history'   => '<path d="M3.5 9a9 9 0 1 1-1 5"/>'
                         . '<path d="M3.5 4v5h5"/>'
                         . '<path d="M12 8v4l3 2"/>',

            'link'      => '<path d="M9 15l6-6"/>'
                         . '<path d="M10.5 6.5l1.5-1.5a4 4 0 0 1 5.5 5.5l-1.5 1.5"/>'
                         . '<path d="M13.5 17.5l-1.5 1.5a4 4 0 0 1-5.5-5.5l1.5-1.5"/>',
        ];

        $inner = $paths[$name] ?? '';
        return $open . $inner . '</svg>';
    }
}
