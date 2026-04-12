# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.1] - Unreleased

### Added

- Initial project setup from template-wordpress
- `[quote_of_the_day]` shortcode with 12 hardcoded quotes
- Daily quote rotation using date-based deterministic selection
- Unit tests for quote selection and shortcode output

### Fixed

- Workflow callers missing permissions (caused startup_failure)
