# Gustamic - Restaurant Statamic Starter Kit

A modern, **no-code-required** Statamic starter kit designed specifically for restaurants, cafes, and food businesses. Built with Tailwind CSS v4 and some Alpine.js for interactivity.

**Live demo:** [gustamic.sanderjanssen.app](https://gustamic.sanderjanssen.app/)

It works out of the box on Statamic's free Solo edition: one content form (contact), one user and one site is all it needs.

## Perfect for Non-Developers

**No developer experience required!** Once installed, you can build and manage your entire restaurant website through the Statamic Control Panel. Everything is dynamic and customizable without touching any code:

-   Upload your own logo
-   Set your brand colors (background & accent colors for CTA buttons)
-   Manage all content through the intuitive Control Panel
-   Build pages using the page builder
-   Update menu items and prices globally
-   Configure reservations and contact information

This starter kit is designed to be completely manageable by restaurant owners and staff, no ongoing developer support needed!

## Features

-   **Menu Management**: Easily manage your restaurant menu items with prices, images, categories and descriptions
-   **Three Pre-built Page Types**: Ready-to-use templates for all your restaurant needs
-   **Localized Currency Formatting**: Pick any currency the Control Panel offers and prices are formatted correctly for your site's locale, including currencies with no decimals like the Japanese Yen (with or without the currency symbol)
-   **Page Builder**: Flexible page builder with pre-designed components including automatic dividers between sections
-   **Color Customization**: Set your brand colors directly from the Control Panel
-   **Comprehensive SEO**: Page-specific and global SEO settings including meta tags, Open Graph, and JSON-LD local business schema markup
-   **Real Contact Form**: A native Statamic contact form (name, email, phone, message) with email notifications, no wiring required
-   **Third-party Scripts**: Easy integration of analytics, tracking, and floating reservation buttons

## Page Types

Gustamic includes three professionally designed page types that cover all your restaurant website needs:

### 1. Landing Pages (Homepage & Marketing Pages)

Perfect for your homepage or any promotional page, built with customizable blocks:

-   **Hero Block**: Eye-catching banner with a title, subtitle and background image
-   **Text with Image Block**: Share your story or highlight offers, with two text columns, images, and a call-to-action button
-   **Featured Menu Items Block**: Showcase your signature dishes with automatic price updates
-   **Contact Form Block**: Display contact information alongside a working contact form

### 2. Menu Page

A dedicated menu display that automatically organizes all your dishes:

-   Displays all menu items organized by category (starters, main courses, desserts, drinks)
-   Prices update globally: change once, update everywhere
-   Currency formatted for your site's locale, with an option to hide the symbol

### 3. Contact Page

Everything your customers need to reach you or make a reservation:

-   Display your restaurant's contact information (address, phone, hours)
-   A single **Contact Form**: name, email, phone and message for general inquiries
-   Submissions email the restaurant address set in Restaurant Details, with the sender set as reply-to so you can respond in one click
-   Built using native Statamic forms functionality for easy management
-   Reservations are handled by the external reservation button (a configurable booking link set in Site Details), not a native form, so the kit stays within the free Solo edition's single-form limit

> **Runs on the free edition:** Gustamic ships exactly one content form (contact) and one site, so it installs and runs fully on Statamic's free Solo edition (one admin user, one form, unlimited collections, entries, taxonomies, globals, assets, blueprints and page builder). Reservations use the external booking link described below, so no second form is needed.

## Managing Your Restaurant Website

### Adding Menu Items

1. Navigate to the Control Panel
2. Go to **Collections → Menu Items**
3. Click "Create Menu Item"
4. Fill in the details:
    - Name and description
    - Price (formatted automatically for your currency and locale)
    - Category (starters, main courses, desserts, drinks)
    - Optional image
    - Featured status (to show on landing pages)
5. Save and publish

Your menu items will automatically appear on the menu page and can be featured on landing pages.

### Creating Pages

1. In the Control Panel, go to **Collections → Pages**
2. Create a new page
3. Choose your page template (landing, menu, or contact)
4. For landing pages:
    - Use the Page Builder to add sections
    - Choose from hero, text with image, featured menu, or contact form components
    - Customize each section's content
    - Dividers are automatically added between sections for clean separation
5. Configure SEO settings (meta title, description, social sharing image)
6. Save and publish

### Managing Global Settings

Navigate to **Globals** in the Control Panel to manage site-wide settings. Gustamic includes three global sets:

#### 1. Restaurant Details

Configure your restaurant's core information:

-   Restaurant name and logo
-   Brand colors (background and accent colors)
-   Contact information (address, phone, email; the email address also receives form submissions)
-   Opening hours
-   Social media links (Facebook, Instagram, Yelp, TripAdvisor, TikTok, X, Threads, Bluesky)

#### 2. Site Details

Manage site-wide settings and functionality:

-   Currency selection and a currency-symbol display toggle
-   Reservation button configuration (an external booking link and its button text; the button appears in the header, footer and contact section, and can point to OpenTable, Resengo or any external booking system, or to an internal page)
-   Footer customization (title, description, image)
-   Copyright information
-   Third-party scripts (head and body scripts for analytics, tracking, floating reservation buttons)

#### 3. SEO Settings

Set default SEO configuration for your entire site:

-   Site name, description, and keywords
-   Default Open Graph image for social sharing
-   Google Analytics ID and Google site verification code
-   Local business schema markup (business type, price range, cuisine type, accepts reservations)

Per-page overrides for title, description and Open Graph fields live on each page's SEO tab, falling back to these global defaults. The JSON-LD LocalBusiness schema is generated from the fields above.

All these settings can be managed without any coding knowledge, just fill in the fields and save!

---

## Developer Information

### Requirements

-   PHP 8.3+
-   Composer
-   Node.js and npm
-   Laravel 12+
-   Statamic 6 (the free Solo edition is enough: the kit needs only one form, one user and one site)

The kit is install-tested on Statamic 6.35 with Laravel 13.

The kit ships single-site content, with globals stored for the default site only. Multi-site setups need to localize the globals themselves after install.

### Installation

Install this starter kit via the Statamic CLI:

```bash
statamic new my-restaurant sanderjn/gustamic
```

During installation you'll be prompted whether to include sample content. Choose "Yes" for example menu items, categories and dish photos to help you get started. On non-interactive installs (for example with `--no-interaction`) the sample content module is included by default.

#### What you get

-   **Base install:** a three-page skeleton (home, menu, contact), navigation, globals, blueprints, forms, and the background and logo assets.
-   **Sample content module (optional):** adds 16 menu items, 4 menu categories, and the accompanying dish photos.

#### Manual Installation

If you prefer to install manually:

```bash
# Create a new Statamic site
statamic new my-restaurant

# Install the starter kit
php please starter-kit:install sanderjn/gustamic
```

### Post-Installation Setup

After the kit is installed, a post-install message prints the remaining steps. In short:

```bash
# Install Node dependencies
npm install

# Build frontend assets for production
npm run build

# Or start the development server
npm run dev
```

Then manage your content, menu items and forms in the Control Panel at `/cp`, and set your restaurant details, SEO and site settings under **Globals**.

### Project Structure

```
├── app/
│   └── Modifiers/       # Custom Statamic modifiers (Money)
├── content/
│   ├── collections/
│   │   ├── menu_items/  # Menu items (sample content)
│   │   └── pages/       # Home, menu and contact pages
│   ├── globals/         # Global settings
│   ├── navigation/      # Navigation menu
│   └── taxonomies/      # Menu categories
├── resources/
│   ├── blueprints/      # Content, form and asset blueprints
│   ├── forms/           # Contact form config
│   ├── fieldsets/       # Shared fieldsets (page builder, contact settings)
│   ├── css/             # Tailwind CSS styles
│   ├── js/              # Alpine.js and JavaScript
│   └── views/           # Antlers templates
└── public/assets/       # Background, logo and dish images
```

### Styling & Templates

#### Tailwind CSS

The starter kit uses Tailwind CSS v4 for styling. The main stylesheet is located at:

-   `resources/css/site.css`

Custom color properties are dynamically generated based on the Control Panel settings.

#### Templates

All templates use Antlers and are located in `resources/views/`:

-   `layout.antlers.html` - Main layout wrapper
-   `default.antlers.html` - Default page template
-   `partials/` - Reusable template components
-   `page_builder/` - Page builder section templates

### The Money modifier

Prices are formatted with a custom `money` modifier, used in templates as:

```antlers
{{ price | money:USD }}          {{-- with currency symbol --}}
{{ price | money:USD:false }}    {{-- without the symbol --}}
```

It uses the currency's correct number of decimals (for example 0 for JPY, 2 for EUR), formats in the site's locale, and tolerates loosely formatted input. Any ISO currency works; unknown or empty codes fall back gracefully rather than erroring the page.

### Development Commands

```bash
# Start development server with hot reload
npm run dev

# Build for production
npm run build
```

### Dependencies

#### PHP Dependencies

-   `moneyphp/money`: currency and price handling (shipped as a real dependency of the kit)
-   `ext-intl`: locale-aware number formatting

#### JavaScript Dependencies

-   Alpine.js (with collapse, focus and intersect plugins): reactive components
-   Tailwind CSS v4: utility-first CSS
-   Vite: build tool and dev server
-   Fitty: dynamic text fitting

> The kit ships a `package.json` but no `vite.config.js`, so its build tool versions track the Statamic 6 app skeleton (Vite, the Laravel Vite plugin, Tailwind and its Vite plugin).

## License

MIT, see [LICENSE](LICENSE).

## Image credits

The sample photos come from [Unsplash](https://unsplash.com) and are used under the [Unsplash License](https://unsplash.com/license). The sample logo is a placeholder from [Logoipsum](https://logoipsum.com). Replace both with your own before going live.

## Support

For issues, questions, or contributions, please visit the [GitHub repository](https://github.com/sanderjn/gustamic).
