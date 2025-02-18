<?php
namespace WP_Speed_Checker;

function dashboard() {
    $results = get_option('wp_speed_check_results');
    
    ?>
    <div class="wrap">
        <h1>WP Speed Checker</h1>
        
        <div class="cards-container">
            <?php foreach (get_speed_metrics() as $metric) : ?>
                <div class="card">
                    <h3><?php echo esc_html($metric['label']); ?></h3>
                    <p><?php echo esc_html($metric['value']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <button id="refresh-btn">Refresh Speed Data</button>
    </div>
    <?php
}

function get_speed_metrics() {
    return array(
        array('label' => 'Performance Score', 'value' => get_option('wp_speed_check_results.performance_score')),
        // Add more metrics as needed
    );
}
