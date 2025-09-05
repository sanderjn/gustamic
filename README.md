# Gustamic - Restaurant Statamic Starter Kit

A modern Statamic starter kit designed specifically for restaurants, cafes, and food businesses. Built with Tailwind CSS v4 and Alpine.js.

## Features

-   **Menu Management**: Easily manage your restaurant menu items with categories, prices, and descriptions
-   **Page Builder**: Flexible page builder with pre-designed components including hero sections, featured menu items, and text blocks
-   **Responsive Design**: Mobile-first design using Tailwind CSS v4
-   **Interactive Components**: Smooth interactions powered by Alpine.js
-   **Price Formatting**: Built-in price formatting helpers for consistent menu pricing display
-   **Color Customization**: Set your brand colors directly from the control panel with carefully selected color presets
-   **Sample Content**: Optional sample content to help you get started quickly

## Requirements

-   PHP 8.1+
-   Composer
-   Node.js 18+ and npm
-   Laravel 10+
-   Statamic 5+

## Installation

Install this starter kit via the Statamic CLI:

```bash
statamic new my-restaurant gustamic
```

During installation, you'll be prompted whether to include sample content. Choose "Yes" if you want example menu items and pages to help you get started.

### Manual Installation

If you prefer to install manually:

```bash
# Create a new Statamic site
statamic new my-restaurant

# Install the starter kit
php please starter-kit:install sanderjn/gustamic
```

## Post-Installation Setup

After installation, complete the setup:

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Build frontend assets
npm run build

# Or start the development server
npm run dev
```

## Project Structure

```
├── app/
│   ├── Helpers/         # Price formatting utilities
│   └── Modifiers/       # Custom Statamic modifiers
├── content/
│   ├── collections/
│   │   ├── menu_items/  # Restaurant menu items
│   │   └── pages/       # Static pages
│   ├── globals/         # Global settings
│   ├── navigation/      # Navigation menus
│   └── taxonomies/      # Menu categories
├── resources/
│   ├── blueprints/      # Content blueprints
│   ├── css/             # Tailwind CSS styles
│   ├── js/              # Alpine.js and JavaScript
│   └── views/           # Antlers templates
└── public/assets/       # Public assets
```

## Key Features

### Menu Management

The starter kit includes a complete menu management system:

-   **Menu Items Collection**: Create and manage individual menu items
-   **Menu Categories**: Organize items by category (appetizers, mains, desserts, etc.)
-   **Price Display**: Automatic price formatting with currency support
-   **Featured Items**: Highlight special dishes on your homepage

### Page Builder Components

Build custom pages with included components:

-   **Hero Section**: Eye-catching hero banners with text overlays
-   **Featured Menu**: Display selected menu items prominently
-   **Text Blocks**: Flexible content sections with rich text support

### Customization

#### Color Theming

Easily customize your restaurant's visual identity through the Control Panel:

-   **Brand Color**: Set your primary accent color for buttons and highlights
-   **Background Color**: Select your site's background tone

Navigate to Globals → Restaurant Details in the Control Panel to customize your colors.

#### Styling

The starter kit uses Tailwind CSS v4. Customize your design in:

-   `resources/css/site.css` - Main stylesheet

#### Templates

All templates use Antlers and are located in `resources/views/`:

-   `layout.antlers.html` - Main layout wrapper
-   `default.antlers.html` - Default page template
-   `partials/` - Reusable template components
-   `page_builder/` - Page builder section templates

## Development

### Available Commands

```bash
# Start development server with hot reload
npm run dev

# Build for production
npm run build

# Watch files for changes
npm run watch
```

### Adding Menu Items

1. Navigate to the Control Panel
2. Go to Collections → Menu Items
3. Click "Create Menu Item"
4. Fill in the details (name, description, price, category)
5. Save and publish

### Creating Pages

1. In the Control Panel, go to Collections → Pages
2. Create a new page
3. Use the Page Builder field to add sections
4. Choose from hero, menu featured, or text components
5. Customize content and publish

## Dependencies

### PHP Dependencies

-   `moneyphp/money`: Currency and price handling

### JavaScript Dependencies

-   Alpine.js: Reactive components
-   Tailwind CSS v4: Utility-first CSS
-   Vite: Build tool and dev server
-   Fitty: Dynamic text fitting

## Support

For issues, questions, or contributions, please visit the [GitHub repository](https://github.com/sanderjn/gustamic).

## License

This starter kit is open-source software. Please check the repository for license details.

## Credits

Created by Sander Janssen for the Statamic community. Perfect for restaurants, cafes, bistros, and any food-related business looking for a professional web presence.
