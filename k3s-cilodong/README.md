# K3S Cilodong WordPress Theme

A custom WordPress theme for K3S Kecamatan Cilodong website.

## Features

- Modern, clean design with blue and white color scheme
- Responsive layout for all screen sizes
- Custom post types for Kegiatan, Program, and Anggota
- Contact form integration
- Custom page templates
- SEO-friendly structure
- Tailwind CSS for styling

## Installation

1. Download the theme zip file
2. Go to WordPress Admin > Appearance > Themes
3. Click "Add New" then "Upload Theme"
4. Choose the downloaded zip file and click "Install Now"
5. After installation, click "Activate"

## Required Plugins

- Contact Form 7 (for contact form functionality)
- Classic Editor (recommended for better content editing experience)

## Customization

### Theme Options

Navigate to WordPress Admin > Appearance > Customize to modify:

1. Site Identity
   - Logo
   - Site Title
   - Tagline

2. Contact Information
   - Email addresses
   - Phone numbers
   - Office address

3. Social Media Links
   - Facebook
   - Twitter
   - Instagram
   - YouTube

### Custom Post Types

The theme includes three custom post types:

1. Kegiatan (Activities)
   - Title
   - Content
   - Featured Image
   - Date
   - Location

2. Program
   - Title
   - Content
   - Featured Image
   - Status
   - Objectives

3. Anggota (Members)
   - Name
   - Position
   - School
   - Profile Picture

### Page Templates

1. Front Page (front-page.php)
   - Banner section
   - Welcome message
   - Recent activities
   - Quick links

2. Contact Page (page-kontak.php)
   - Contact form
   - Office information
   - Google Maps integration

## Development

### Prerequisites

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

### File Structure

```
k3s-cilodong/
├── style.css
├── index.php
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── single.php
├── archive.php
├── page-kontak.php
├── screenshot.php
└── README.md
```

### CSS Classes

The theme uses Tailwind CSS utility classes. Main custom classes are defined in style.css:

- `.site-header`: Main header styling
- `.site-content`: Content area styling
- `.site-footer`: Footer styling
- `.banner`: Homepage banner styling
- `.card`: Card component styling

## Support

For support and questions, please contact:
- Email: support@k3scilodong.org
- Website: https://k3scilodong.org

## License

This theme is licensed under the GNU General Public License v2 or later.
See the LICENSE file for more information.
