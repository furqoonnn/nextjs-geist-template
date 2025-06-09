<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme Setup
function k3s_cilodong_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'k3s-cilodong'),
        'footer'  => esc_html__('Footer Menu', 'k3s-cilodong'),
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'k3s_cilodong_setup');

// Enqueue scripts and styles
function k3s_cilodong_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('k3s-cilodong-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);

    // Enqueue Tailwind CSS
    wp_enqueue_style('tailwindcss', 'https://cdn.tailwindcss.com', array(), null);

    // Enqueue theme's main stylesheet
    wp_enqueue_style('k3s-cilodong-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // Enqueue theme's main JavaScript file
    wp_enqueue_script('k3s-cilodong-script', get_template_directory_uri() . '/js/script.js', array(), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'k3s_cilodong_scripts');

// Register widget areas
function k3s_cilodong_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'k3s-cilodong'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'k3s-cilodong'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'k3s_cilodong_widgets_init');

// Customize theme settings
function k3s_cilodong_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('contact_info', array(
        'title'    => __('Contact Information', 'k3s-cilodong'),
        'priority' => 30,
    ));

    // Email Setting
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'info@k3scilodong.org',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label'    => __('Email Address', 'k3s-cilodong'),
        'section'  => 'contact_info',
        'type'     => 'email',
    ));

    // Phone Setting
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+62 xxx-xxxx-xxxx',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'    => __('Phone Number', 'k3s-cilodong'),
        'section'  => 'contact_info',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'k3s_cilodong_customize_register');

// Custom Post Types
function k3s_cilodong_register_post_types() {
    // Kegiatan Post Type
    register_post_type('kegiatan', array(
        'labels' => array(
            'name'               => __('Kegiatan', 'k3s-cilodong'),
            'singular_name'      => __('Kegiatan', 'k3s-cilodong'),
            'add_new'           => __('Tambah Baru', 'k3s-cilodong'),
            'add_new_item'      => __('Tambah Kegiatan Baru', 'k3s-cilodong'),
            'edit_item'         => __('Edit Kegiatan', 'k3s-cilodong'),
            'view_item'         => __('Lihat Kegiatan', 'k3s-cilodong'),
            'all_items'         => __('Semua Kegiatan', 'k3s-cilodong'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-calendar-alt',
        'show_in_rest'        => true,
    ));

    // Program Post Type
    register_post_type('program', array(
        'labels' => array(
            'name'               => __('Program', 'k3s-cilodong'),
            'singular_name'      => __('Program', 'k3s-cilodong'),
            'add_new'           => __('Tambah Baru', 'k3s-cilodong'),
            'add_new_item'      => __('Tambah Program Baru', 'k3s-cilodong'),
            'edit_item'         => __('Edit Program', 'k3s-cilodong'),
            'view_item'         => __('Lihat Program', 'k3s-cilodong'),
            'all_items'         => __('Semua Program', 'k3s-cilodong'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-awards',
        'show_in_rest'        => true,
    ));

    // Anggota Post Type
    register_post_type('anggota', array(
        'labels' => array(
            'name'               => __('Anggota', 'k3s-cilodong'),
            'singular_name'      => __('Anggota', 'k3s-cilodong'),
            'add_new'           => __('Tambah Baru', 'k3s-cilodong'),
            'add_new_item'      => __('Tambah Anggota Baru', 'k3s-cilodong'),
            'edit_item'         => __('Edit Anggota', 'k3s-cilodong'),
            'view_item'         => __('Lihat Anggota', 'k3s-cilodong'),
            'all_items'         => __('Semua Anggota', 'k3s-cilodong'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'menu_icon'           => 'dashicons-groups',
        'show_in_rest'        => true,
    ));
}
add_action('init', 'k3s_cilodong_register_post_types');

// Add custom meta boxes for Anggota post type
function k3s_cilodong_add_meta_boxes() {
    add_meta_box(
        'anggota_details',
        __('Detail Anggota', 'k3s-cilodong'),
        'k3s_cilodong_anggota_meta_box_callback',
        'anggota',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'k3s_cilodong_add_meta_boxes');

function k3s_cilodong_anggota_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('k3s_cilodong_save_meta_box_data', 'k3s_cilodong_meta_box_nonce');

    // Get current values
    $jabatan = get_post_meta($post->ID, '_jabatan', true);
    $sekolah = get_post_meta($post->ID, '_sekolah', true);

    ?>
    <p>
        <label for="jabatan"><?php _e('Jabatan:', 'k3s-cilodong'); ?></label><br>
        <input type="text" id="jabatan" name="jabatan" value="<?php echo esc_attr($jabatan); ?>" class="widefat">
    </p>
    <p>
        <label for="sekolah"><?php _e('Sekolah:', 'k3s-cilodong'); ?></label><br>
        <input type="text" id="sekolah" name="sekolah" value="<?php echo esc_attr($sekolah); ?>" class="widefat">
    </p>
    <?php
}

// Save meta box data
function k3s_cilodong_save_meta_box_data($post_id) {
    if (!isset($_POST['k3s_cilodong_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['k3s_cilodong_meta_box_nonce'], 'k3s_cilodong_save_meta_box_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['post_type']) && 'anggota' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    if (isset($_POST['jabatan'])) {
        update_post_meta($post_id, '_jabatan', sanitize_text_field($_POST['jabatan']));
    }

    if (isset($_POST['sekolah'])) {
        update_post_meta($post_id, '_sekolah', sanitize_text_field($_POST['sekolah']));
    }
}
add_action('save_post', 'k3s_cilodong_save_meta_box_data');
