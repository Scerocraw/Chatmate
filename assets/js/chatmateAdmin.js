var adminInterface = {
    /**
     * Refresh the statistic
     * @returns {undefined}
     */
    refreshStatistic: function () {
        $.ajax({
            url: "/api/getStatistic",
            data: {'type': 'all', 'time': 'all'},
            type: "POST",
            dataType: "JSON",
            success: function (response) {
                if (response.statistic) {
                    // Each
                    $.each(response.statistic, function (timeInterval, statistics) {
                        $.each(statistics, function(singleStatistic, value) {
                            $('.' + timeInterval + '_' + singleStatistic).html(value);
                        });
                    });
                }
            }
        });
    },
};

$(document).ready(function () {
    if ($('.adminMode').length > 0) {
        // Set the statistic on call
        adminInterface.refreshStatistic();

        // Refresh every 5 seconds the statistic
        setInterval(function () {
            adminInterface.refreshStatistic();
        }, 5000);
    }
});