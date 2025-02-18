// In admin_init hook:
add_action('wp_ajax_nopriv_wp_speed_checker_refresh', 'handle_speed_data');
add_action('wp_ajax_wp_speed_checker_refresh', 'handle_speed_data');

function handle_speed_data() {
    if (!isset($_POST['action']) || $_POST['action'] !== 'wp_speed_checker_refresh') {
        return;
    }

    $url = get_site_url();
    $result = get_pagespeed_score($url);

    wp_die(json_encode(array('success' => true)));
}
