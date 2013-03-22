$(document).ready(function() {
    (function() {
        function updateLogs() {
            var log_list = new Array();
            $.post(base_url+'index.php/home/refreshLogs', null, function(data) {
                log_list = $.parseJSON(data);
                $('.status_indicator').each(function(i, obj){
                    if(log_list[obj.id])
                        $(this).removeClass('error');
                    else
                        $(this).addClass('error');
                });
            }); 
        }
        updateLogs();
        setInterval(updateLogs, 10000);
    })();
});