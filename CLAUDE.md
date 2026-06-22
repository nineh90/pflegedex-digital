# CLAUDE.md – Pflegedex Website (pflegedex-digital.de)

## Projektübersicht

**Produkt:** Pflegedex – KI-gestützte Pflegedokumentations-Software  
**Domain:** pflegedex-digital.de (bereits bereitgestellt)  
**Hersteller:** Nils-Digital (Nils Nehring & Kevin Herrmann)  
**Zweck dieser Website:** Marketing-/Landingpage für Pflegedex als Produkt von Nils-Digital.  
**Tech-Stack der Website:** PHP, vanilla JS, kein Framework – identisch zu nils-digital.de und lerndex.de  
**Hosting:** Strato (analog zu den anderen Nils-Digital-Seiten)

---

## Was ist Pflegedex?

Pflegedex ist eine **lokale, on-premise Pflegedokumentations-App** für Pflegeheime.

### Technisches Fundament (aus dem Repo)
- Laravel 11 Backend + Inertia.js + React 18 + TypeScript Frontend
- PostgreSQL 16 + Redis
- Docker-basierter Betrieb auf einem Heimserver des Kunden
- Ollama-Anbindung für KI-Funktionen (Modell: gemma4)
- Bordeaux-Akzentfarbe `#9B1C3B` im Basis-Design (Sander-Pflege-inspiriert)

### Kernfunktionen (aktueller MVP-Stand)
- Pflegedokumentation mit Bewohner-Verwaltung
- UUID-basierte Datenstruktur + Pseudonymisierung von Bewohnerdaten
- Rollenbasierter Zugriff (Admin, PDL, Pflegekraft)
- Standort-Verwaltung (mehrere Wohnbereiche)
- Pflegeberichte (CareReports) mit Kategorisierung
- Geplant: Audit-Log, signierte Berichte (append-only), SIS-Integration

### Datenschutz-Versprechen (aus Repo-Doku)
- Pflegedaten verlassen **nie** den Heimserver
- KI-Ausgaben sind immer nur Entwürfe (kein Auto-Commit)
- Signierte Pflegeberichte werden nicht überschrieben
- LLM-Eingaben werden vor Verarbeitung pseudonymisiert

---

## Zielgruppe der Website

- Heimleiter / Pflegedienstleitungen (PDL) in stationären Pflegeeinrichtungen
- IT-Verantwortliche in Pflegeheimen
- Träger kleinerer bis mittlerer Pflegeeinrichtungen (1–3 Häuser)
- Regionale Pflegedienste im Münsterland / Nordwestdeutschland (Erstmarkt via Kevins Netzwerk)

**Tonalität:** Professionell, vertrauenswürdig, menschlich – kein Corporate-Kälte. Der Pflegebereich schätzt Verlässlichkeit und Datenschutz.

---

## Nils-Digital Handschrift (Design-DNA)

Referenz: nils-digital.de

- **Dark Hero** – dunkler Hintergrund (#0d1117 oder ähnlich) im Hero-Bereich
- **Klare Typografie** – große Headlines, starke Kontraste
- **Emoji-Icons** in Feature-Cards (kein Icon-Font, kein SVG-Overhead)
- **CTA-Buttons:** primär gefüllt, sekundär als Outline/Ghost
- **Persönlicher Ton:** direkte Ansprache ("du" oder "Sie" – für Pflege eher "Sie")
- **Footer:** immer „Ein Produkt von Nils-Digital" mit Link zu nils-digital.de
- **Kein Framework-Bloat** – sauberes, kommentiertes PHP/HTML/CSS/JS

---

## Pflegedex Branding / Farbwelt

| Token | Wert | Verwendung |
|---|---|---|
| `--pflege-bordeaux` | `#9B1C3B` | Primärfarbe, CTAs, Akzente |
| `--pflege-bordeaux-dark` | `#7a1630` | Hover-Zustände |
| `--pflege-bg-dark` | `#0d1117` | Hero-Hintergrund (Nils-Digital-DNA) |
| `--pflege-bg-card` | `#1a1f2e` | Karten-Hintergrund |
| `--pflege-text` | `#f0f4f8` | Fließtext hell |
| `--pflege-muted` | `#8b9ab0` | Untertitel, Metainfo |
| `--pflege-white` | `#ffffff` | Reine Akzente |

Sekundärfarbe für Trust-Badges: zartes Hellblau `#e8f4fd` (Pflege-Assoziation: Sauberkeit, Fürsorge)

---

## Seitenstruktur (PHP-Dateien)

```
pflegedex-digital.de/
├── index.php            # Landingpage (One-Pager oder Einstieg)
├── pages/
│   ├── funktionen.php   # Detailseite Features
│   ├── datenschutz.php  # Datenschutz-Erklärung
│   ├── impressum.php    # Impressum
│   └── kontakt.php      # Kontaktformular
├── assets/
│   ├── css/
│   │   └── style.css    # Haupt-Stylesheet
│   ├── js/
│   │   └── main.js      # Vanilla JS
│   └── images/
│       ├── logo/        # Pflegedex-Logo (noch zu erstellen)
│       └── screenshots/ # App-Screenshots (später)
└── includes/
    ├── header.php       # Globaler Header + Nav
    └── footer.php       # Globaler Footer
```

---

## Sektionen der Startseite (index.php)

### 1. Navigation
- Logo Pflegedex (links)
- Links: Funktionen | Datenschutz | Kontakt
- CTA-Button: "Demo anfragen" (Bordeaux)

### 2. Hero
- Dark Background (#0d1117)
- Headline: **„Pflegedokumentation. Sicher. Lokal. Intelligent."**
- Subline: „Die KI-gestützte Software für Pflegeheime – Ihre Daten bleiben bei Ihnen."
- Zwei Buttons: „Demo anfragen" (primary) + „Funktionen entdecken" (ghost)
- Badge: „Powered by KI · 100% on-premise · DSGVO-konform"

### 3. Problem → Lösung (3-Spalten)
- ❌ Papierbasierte Dokumentation → ✅ Digitale Pflegeberichte
- ❌ Datenschutz-Risiken in der Cloud → ✅ Daten nur auf Ihrem Server
- ❌ Komplizierte Software → ✅ Intuitiv, rollenbasiert, sofort einsatzbereit

### 4. Features (6 Cards mit Emoji)
- 🏠 **Lokaler Betrieb** – Keine Cloud, kein Datenverlust
- 🔒 **Pseudonymisierung** – Bewohnerdaten automatisch geschützt
- 🤖 **KI-Unterstützung** – Pflegeberichte KI-gestützt vorbereiten
- 👥 **Rollenkonzept** – Admin, PDL, Pflegekraft – jeder sieht nur was er darf
- 📋 **Audit-Trail** – Lückenlose, unveränderliche Dokumentation
- 🔧 **Einfache Installation** – Docker-basiert, läuft auf jedem Heimserver

### 5. Datenschutz-Block (Trust-Sektion)
- Großes Trust-Statement: „Ihre Pflegedaten verlassen niemals Ihr Haus."
- 3 Punkte: DSGVO-konform | Kein SaaS | Keine Drittanbieter
- Hintergrund: Bordeaux oder Dark

### 6. Für wen ist Pflegedex? (Zielgruppen)
- Stationäre Pflegeeinrichtungen (10–100 Bewohner)
- Einrichtungen mit eigenem IT-Heimserver
- Träger, die Datensouveränität priorisieren

### 7. Kontakt / Demo-Anfrage
- Einfaches Formular: Name, Einrichtung, E-Mail, Nachricht
- Webhook → n8n (Nils-Standard) ODER mailto-Fallback
- Subtext: „Wir melden uns innerhalb von 24 Stunden."

### 8. Footer
- Links: Impressum | Datenschutz
- Copyright: © 2025 Pflegedex
- **„Ein Produkt von [Nils-Digital](https://nils-digital.de)"** ← Pflicht!
- Slogan: „Entwickelt mit 💙 im Münsterland"

---

## Technische Anforderungen

- PHP 8.x, kein Framework
- Alle PHP-Dateien gut kommentiert (Nils-Standard: Beginner-readable)
- CSS-Variablen für Farben und Spacing
- Responsive (Mobile-first)
- `<meta name="robots" content="noindex">` ENTFERNEN vor Live-Gang (wird als Demo gestartet)
- Kontaktformular: primär via n8n-Webhook, Fallback mailto:
- Keine externen CDN-Abhängigkeiten für kritische Styles (alles lokal)
- Google Fonts erlaubt (Nils-Digital nutzt systemische + Google Fonts)

---

## SEO-Metadaten (für header.php)

```html
<title>Pflegedex – KI-Pflegedokumentation on-premise | Nils-Digital</title>
<meta name="description" content="Pflegedex: Die sichere, KI-gestützte Pflegedokumentations-Software für Pflegeheime. 100% lokal, DSGVO-konform, auf Ihrem Server. Ein Produkt von Nils-Digital.">
<meta name="keywords" content="Pflegedokumentation Software, on-premise Pflege, DSGVO Pflegeheim, KI Pflegedokumentation, Pflegesoftware lokal">
```

---

## Offene Entscheidungen (vor Build klären)

1. **Logo:** Pflegedex-Logo noch nicht vorhanden → Claude Code soll zunächst Text-Logo (Wortmarke) nutzen, später austauschbar
2. **Screenshots:** App noch im MVP → Platzhalter-Mockups oder Feature-Illustrationen (SVG)
3. **Kontaktformular-Ziel:** n8n-Webhook-URL von Nils eintragen (Variable in config.php auslagern)
4. **Demo-Video:** Geplant, aber noch nicht verfügbar → Platzhalter-Section vorbereiten
5. **Preise:** Noch nicht festgelegt → Keine Preis-Sektion, stattdessen „Angebot auf Anfrage"

---

## Wichtige Referenzen

- Nils-Digital Website: https://nils-digital.de
- Lerndex Website: https://lerndex.de  
- Pflegedex GitHub: https://github.com/kevherrmann/pflegedex
- Domain: https://pflegedex-digital.de

---

## Prioritäten für Claude Code

1. `includes/header.php` und `includes/footer.php` als Grundgerüst
2. `assets/css/style.css` mit CSS-Variablen und globalem Styling
3. `index.php` – vollständige Startseite
4. `pages/kontakt.php` – Kontaktformular
5. `pages/impressum.php` + `pages/datenschutz.php` – Pflichtseiten
6. `pages/funktionen.php` – Detail-Features (optional in Phase 1)

**Faustregel:** Lieber eine perfekte index.php als sechs mittelmäßige Seiten.