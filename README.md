# Quote of the Day

[![PHP CI](https://github.com/apermo/quote-of-the-day/actions/workflows/ci.yml/badge.svg)](https://github.com/apermo/quote-of-the-day/actions/workflows/ci.yml)
[![License: GPL v2+](https://img.shields.io/badge/License-GPLv2+-blue.svg)](LICENSE)

A simple WordPress plugin that provides a `[quote_of_the_day]` shortcode. It displays a random inspirational quote that changes once per day.

## Requirements

- PHP 8.1+
- WordPress 6.0+

## Installation

1. Download or clone this repository into `wp-content/plugins/quote-of-the-day/`
2. Run `composer install`
3. Activate the plugin in WordPress

## Usage

Add the shortcode to any post, page, or widget:

```
[quote_of_the_day]
```

The shortcode renders a `<blockquote>` with a quote and its author. The quote rotates daily — every visitor sees the same quote on the same day.

## Development

```bash
composer install
composer cs              # Run PHPCS
composer cs:fix          # Fix PHPCS violations
composer analyse         # Run PHPStan
composer test:unit       # Run unit tests
```

### Local WordPress Environment

Requires [DDEV](https://ddev.readthedocs.io/) and the [`ddev-orchestrate`](https://github.com/apermo/ddev-orchestrate) addon:

```bash
ddev add-on get apermo/ddev-orchestrate
ddev start && ddev orchestrate
```

This downloads WordPress into `.ddev/wordpress/`, installs dependencies, symlinks the plugin, and activates it. Login at `https://quote-of-the-day.ddev.site/wp-admin/` (admin/admin).

## License

[GPL-2.0-or-later](LICENSE)
