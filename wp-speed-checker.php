<?php
namespace WP_Speed_Checker;

use_wp('admin_menu');
use_wp('admin_init');

function activate() {
    // Activation logic if needed
}

function deactivate() {
    // Deactivation logic if needed
}

register_activation_hook(__FILE__, 'activate');
register_deactivation_hook(__FILE__, 'deactivate');

// Add admin menu
add_action('admin_menu', function () {
    add_menu_page(
        'WP Speed Checker',
        'Speed Checker',
        'manage_options',
        'wp-speed-checker',
        __DIR__ . '/admin/dashboard.php'
    );
});

// Enqueue styles and scripts
add_action('admin_init', function () {
    enqueue_style(
        'wp-speed-checker-styles',
        plugins_url('assets/styles.css', dirname(__FILE__)),
        array(),
        filemtime(plugin_dir_path(dirname(__FILE__)) . 'assets/styles.css')
    );

    enqueue_script(
        'wp-speed-checker-scripts',
        plugins_url('assets/scripts.js', dirname(__FILE__)),
        array('jquery'),
        filemtime(plugin_dir_path(dirname(__FILE__)) . 'assets/scripts.js'),
        false
    );
});
