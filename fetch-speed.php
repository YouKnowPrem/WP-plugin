<?php
namespace WP_Speed_Checker;

function get_pagespeed_score($url, $device = 'desktop') {
    $url = rawurlencode($url);
    $api_key = ''; // No API key needed for v5
    $response = wp_remote_get(
        "https://www.googleapis.com/pagespeedonline/v5/runbatch?url=$url&key=$api_key"
    );
    
    if (!is_wp_error($response)) {
        $body = json_decode(wp_remote_retrieve_body($response), true);
        return process_speed_data($body);
    }
    return false;
}

function process_speed_data($data) {
    global $wpdb;
    
    $metrics = array();
    if (isset($data['lighthouseResult'])) {
        // Extract metrics from Lighthouse data
        $metrics['performance_score'] = isset($data['lighthouseResult']['categories']['Performance']) 
            ? round($data['lighthouseResult']['categories']['Performance'], 1) : 0;
        
        // Additional metric processing...
    }
    
    // Store results in WordPress options for later use
    update_option('wp_speed_check_results', $metrics);
    
    return $metrics;
}
