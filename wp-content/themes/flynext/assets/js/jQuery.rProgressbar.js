/**
 * jQuery Line Progressbar
 * Author: Sharifur Rahman
 * Author URI : https:devrobin.com
 * Version: 1.0.0
 */

;(function($) {
    'use strict';

    $.fn.rProgressbar = function(options) {
        options = $.extend({
            percentage: null,
            ShowProgressCount: true,
            duration: 1000,
            // Styling Options
            fillBackgroundColor: '#ed1c24',
            backgroundColor: '#EEEEEE',
            borderRadius: '0px',
            height: '5px',
            width: '100%'
        }, options);

        $.options = options;
        return this.each(function(index, el) {
            // Markup
            $(el).html('<div class="progressbar"><div class="proggress"></div><div class="percentCount"></div></div>');

            var lineProgressBarInit = function() {
                var progressFill = $(el).find('.proggress');
                var progressBar = $(el).find('.progressbar');
                var progressCount = $(el).find('.percentCount');
                var optionPercentage = options.percentage > 100 ? 100 : options.percentage;
                progressFill.css({
                    backgroundColor: options.fillBackgroundColor,
                    height: options.height,
                    borderRadius: options.borderRadius
                });
                progressBar.css({
                    width: options.width,
                    backgroundColor: options.backgroundColor,
                    borderRadius: options.borderRadius
                });

                // Progressing
                progressFill.animate({
                    width: optionPercentage + "%"
                }, {
                    step: function(x) {
                        if (options.ShowProgressCount) {
                            $(el).find(".percentCount").text(options.percentage + "%");
                        }
                    },
                    duration: options.duration
                });
                progressCount.animate({
                    left: optionPercentage >= 100 ? 85+ "%" : optionPercentage + "%"
                }, {
                    duration: options.duration
                });
            }

            $(this).waypoint(lineProgressBarInit, { offset: '100%', triggerOnce: true });
        });
    }
    var allProgress = $('.rprogressbar');
    $.each(allProgress,function (index,value) {
        var percentage = $(this).data('percentage');
        $(this).rProgressbar({
            percentage: percentage,
        });
    });
})(jQuery);