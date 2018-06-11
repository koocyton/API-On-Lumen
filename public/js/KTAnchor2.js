(function($){

    $.extend({
    });

    $.fn.extend({

    });

    $("input").fn.extend({

        dateInput : function() {

            $(this).find("input.date").each(function(key, date_input) {
                // 绑定
                $(this).datetimepicker({
                    timepicker:false,
                    lang:"ch",
                    startView : 2,
                    format:'Y-m-d'
                });
            });

            $(this).find("input.datetime").each(function(key, datetime_input) {
                // 绑定
                $(this).datetimepicker({
                    timepicker:true,
                    lang:"ch",
                    startView : 2,
                    format:'Y-m-d H:i:s'
                });
            });

            $(this).find("input.time").each(function(key, datetime_input) {
                // 绑定
                $(this).datetimepicker({
                    timepicker:false,
                    lang:"ch",
                    startView : 2,
                    format:'H:i:s'
                });
            });
            return this;
        }

    });

})(jQuery);