# Gustamic - Restaurant Statamic Starter Kit

A modern, **no-code-required** Statamic starter kit designed specifically for restaurants, cafes, and food businesses. Built with Tailwind CSS v4 and some Alpine.js for interactivity.

## 🎯 Perfect for Non-Developers

**No developer experience required!** Once installed, you can build and manage your entire restaurant website through the Statamic Control Panel. Everything is dynamic and customizable without touching any code:

-   Upload your own logo
-   Set your brand colors (background & accent colors for CTA buttons)
-   Manage all content through the intuitive Control Panel
-   Build pages using the pagebuilder
-   Update menu items and prices globally
-   Configure reservations and contact information

This starter kit is designed to be completely manageable by restaurant owners and staff - no ongoing developer support needed!

## Features

-   **Menu Management**: Easily manage your restaurant menu items with prices, images, categories and descriptions
-   **Three Pre-built Page Types**: Ready-to-use templates for all your restaurant needs
-   **Global Currency Settings**: Support for 60+ major currencies with automatic formatting (with or without currency symbols)
-   **Page Builder**: Flexible page builder with pre-designed components
-   **Color Customization**: Set your brand colors directly from the control panel
-   **Comprehensive SEO**: Page-specific and global SEO settings including meta tags, Open Graph, and local business schema markup
-   **Reservation System Integration**: Built-in contact form for reservations or connect to external systems with custom scripts
-   **Third-party Scripts**: Easy integration of analytics, tracking, and floating reservation buttons

## Page Types

Gustamic includes three professionally designed page types that cover all your restaurant website needs:

### 1. Landing Pages (Homepage & Marketing Pages)

Perfect for your homepage or any promotional page, built with three customizable blocks:

-   **Hero Block**: Eye-catching banner with your restaurant imagery and call-to-action
-   **Text Block**: Share your story, describe your cuisine, or highlight special offers
-   **Featured Menu Items Block**: Showcase your signature dishes with automatic price updates

### 2. Menu Page

A dedicated menu display that automatically organizes all your dishes:

-   Displays all menu items organized by category (appetizers, mains, desserts, etc.)
-   Prices update globally - change once, update everywhere
-   Support for 60+ major currencies with flexible display options (with/without currency symbols)

### 3. Contact Page

Everything your customers need to reach you or make a reservation:

-   Display your restaurant's contact information (address, phone, hours)
-   Built-in Statamic contact form for reservations or inquiries
-   Option to integrate external reservation systems (OpenTable, Resy, etc.)
-   Support for floating reservation buttons via script tags
-   Fully customizable through the Control Panel

## Managing Your Restaurant Website

### Adding Menu Items

1. Navigate to the Control Panel
2. Go to **Collections → Menu Items**
3. Click "Create Menu Item"
4. Fill in the details:
    - Name and description
    - Price (will be formatted automatically)
    - Category (appetizers, mains, desserts, etc.)
    - Optional image
    - Featured status (to show on homepage)
5. Save and publish

Your menu items will automatically appear on the menu page and can be featured on landing pages.

### Creating Pages

1. In the Control Panel, go to **Collections → Pages**
2. Create a new page
3. Choose your page template (landing, menu, or contact)
4. For landing pages:
    - Use the Page Builder to add sections
    - Choose from hero, text, or featured menu components
    - Customize each section's content
5. Configure SEO settings (meta title, description, social sharing image)
6. Save and publish

### Managing Global Settings

Navigate to **Globals** in the Control Panel to manage site-wide settings. Gustamic includes three global sets:

#### 1. Restaurant Details

Configure your restaurant's core information:

-   Restaurant name and logo
-   Brand colors (background and accent colors)
-   Contact information (address, phone, email)
-   Opening hours
-   Social media links (Facebook, Instagram, Yelp, TripAdvisor, TikTok, X, Threads, Bluesky)

#### 2. Site Details

Manage site-wide settings and functionality:

-   Currency selection from 60+ global currencies
-   Currency symbol display toggle
-   Reservation system configuration (URL, button text)
-   Footer customization (title, description, image)
-   Copyright information
-   Third-party scripts (head and body scripts for analytics, tracking, floating reservation buttons)

#### 3. SEO Settings

Set default SEO configuration for your entire site:

-   Site name, description, and keywords
-   Default Open Graph image for social sharing
-   Google Analytics ID and site verification
-   Local business schema markup (business type, price range)
-   Robots.txt configuration

All these settings can be managed without any coding knowledge - just fill in the fields and save!

---

## Developer Information

### Requirements

-   PHP 8.2+
-   Composer
-   Node.js and npm
-   Laravel 10+
-   Statamic 5+

### Installation

Install this starter kit via the Statamic CLI:

```bash
statamic new my-restaurant sanderjn/gustamic
```

During installation, you'll be prompted whether to include sample content. Choose "Yes" if you want example menu items and pages to help you get started.

#### Manual Installation

If you prefer to install manually:

```bash
# Create a new Statamic site
statamic new my-restaurant

# Install the starter kit
php please starter-kit:install sanderjn/gustamic
```

### Post-Installation Setup

After installation, complete the setup:

```bash
# Install Node dependencies
npm install

# Build frontend assets for production
npm run build

# Or start the development server
npm run dev
```

### Project Structure

```
├── app/
│   └── Modifiers/       # Custom Statamic modifiers (formatPrice, etc.)
├── content/
│   ├── collections/
│   │   ├── menu_items/  # Sample menu items
│   │   └── pages/       # Sample pages
│   ├── globals/         # Global settings
│   ├── navigation/      # Navigation menu
│   └── taxonomies/      # Menu categories
├── resources/
│   ├── blueprints/      # Content blueprints
│   ├── css/             # Tailwind CSS styles
│   ├── js/              # Alpine.js and JavaScript
│   └── views/           # Antlers templates
└── public/assets/       # Sample images
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

### Development Commands

```bash
# Start development server with hot reload
npm run dev

# Build for production
npm run build
```

### Dependencies

#### PHP Dependencies

-   `moneyphp/money`: Currency and price handling

#### JavaScript Dependencies

-   Alpine.js: Reactive components
-   Tailwind CSS v4: Utility-first CSS
-   Vite: Build tool and dev server
-   Fitty: Dynamic text fitting

## Support

For issues, questions, or contributions, please visit the [GitHub repository](https://github.com/sanderjn/gustamic).
