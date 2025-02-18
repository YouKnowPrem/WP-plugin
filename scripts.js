jQuery(document).ready(function($) {
    $('#refresh-btn').click(refreshSpeedData);

    // Initial load
    refreshSpeedData();

    function refreshSpeedData() {
        $.ajax({
            url:.ajaxurl,
            data: {
                action: 'wp_speed_checker_refresh',
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            }
        });
    }
});
