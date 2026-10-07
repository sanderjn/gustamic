# Changelog

All notable changes to the Gustamic Starter Kit will be documented in this file.

## [Unreleased]

### Added

-   MIT `LICENSE` file and a `.gitignore`
-   Live demo link and image credits (Unsplash photos, Logoipsum placeholder logo) in the README

### Changed

-   Menu links on the featured menu section and in the footer now follow the menu page entry instead of a hardcoded `/menu` path, so renaming the page slug keeps them working
-   JSON-LD `sameAs` now lists the social profiles configured in Restaurant Details
-   Install verified on Statamic 6.35 / Laravel 13

### Fixed

-   Sample content now installs by default on non-interactive installs, instead of being skipped
-   Removed the unused Bangers and Chewy font loads and the broken hardcoded font preload

## [1.0.0] - 2026-07-20

The "it actually works now" release. Gustamic now targets Statamic 6, and the
install, forms, SEO and currency features that earlier versions described are
real and wired up.

### Added

-   Statamic 6 support (requires PHP 8.3+ and Laravel 12+)
-   Runs on the free Statamic Solo edition: the kit ships a single contact form and a single site, so it needs no Pro license
-   A real contact form with a proper blueprint: name, email, phone and message
-   Reservations handled by the external reservation button, a configurable booking link set in Site Details (appears in the header, footer and contact section), rather than a native form
-   Form email notifications sent to the Restaurant Details email global, with the sender set as reply-to
-   `StarterKitPostInstall` hook that prints next steps after installation, noting the kit runs on the free Solo edition
-   `moneyphp/money` as a real Composer dependency of the kit
-   SEO wiring: per-page title/description/Open Graph fields with global fallbacks, Google Analytics ID and site-verification fields, and a JSON-LD LocalBusiness schema driven by Control Panel fields (business type, price range, cuisine type, accepts reservations)
-   Accessibility and UX improvements: proper tab semantics on the menu, aria attributes on the mobile menu toggle, an alt-text field on the asset container with sample alt texts, and empty states for missing images and menu items

### Changed

-   Install plumbing rebuilt: no more artisan/`please` install command; setup runs through the post-install hook
-   Sample content is now genuinely optional: the base install is a three-page skeleton (home, menu, contact) with navigation, globals, blueprints, forms and background/logo assets; the sample content module adds 16 menu items, 4 categories and dish photos
-   Money modifier rewritten: correct decimals per currency (0 for JPY, 2 for EUR, etc.), formatted in the site's locale, and tolerant of loosely formatted input. Any ISO currency the Control Panel offers now works
-   Form redisplay is XSS-safe

### Fixed

-   Installation actually runs now; the previous artisan install mechanism never executed
-   Forms now have fields and send notifications; earlier "forms" shipped without usable field definitions

### Removed

-   Non-functional robots.txt configuration field from SEO settings
-   Menu item detail-page route (menu items have no detail pages)

## [0.2.0] - 2025-09-16

### Added

-   Contact Info block for page builder with flexible layout options
-   Contact Form block for page builder
-   Two form types for contact page:
    -   Standard contact form for general inquiries
    -   Reservation form with date, time, and party size fields
-   Native Statamic forms integration replacing custom implementation
-   Automatic dividers between page builder sections for cleaner separation

### Changed

-   Contact forms now use standard Statamic forms functionality
-   Page builder components now have automatic border management

### Removed

-   Outdated demo content information from previous versions
-   Unnecessary field descriptions from blueprints for cleaner interface

## [0.1.0] - 2025-09-05

### Initial Release

-   Menu management system with categories and pricing
-   Page builder with hero, menu featured, and text components
-   Restaurant details global settings
-   Color theming system with curated presets
-   Responsive design using Tailwind CSS v4
-   Interactive components with Alpine.js
-   Price formatting helpers
-   Optional sample content module
-   Social media links integration
-   Opening hours management
