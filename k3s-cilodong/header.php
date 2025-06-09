<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <nav class="main-navigation">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                    'fallback_cb' => false,
                ));
                ?>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'space-y-1 px-2 pb-3 pt-2',
                'container' => false,
                'fallback_cb' => false,
            ));
            ?>
        </div>
    </nav>
</header>

<main id="main" class="site-main">
