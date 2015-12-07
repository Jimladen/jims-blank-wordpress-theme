/* Custom JS */


(function($) {

    $('body').hide();
    $('body').fadeIn();

    equalHeights = function(container) {

        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;
        $(container).each(function() {

            $el = $(this);
            $($el).height('auto')
            topPostion = $el.position().top;

            if (currentRowStart != topPostion) {
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = $el.height();
                rowDivs.push($el);
            } else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
            }
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    }

    var windowWidth = $(window).width();


    // Use this variable to set up the common and page specific functions. If you 
    // rename this variable, you will also need to rename the namespace below.
    var Roots = {
        // All pages
        common: {
            init: function() {

                equalHeights('.equalHeight');

                /*
                 *
                 *   Menu animation
                 *
                 */


                var isAnimating = 0;
                $('a.menuClick').on('click tap', function() {
                    console.log(isAnimating);
                    if (isAnimating != 1) {
                        isAnimating = 1;
                        $('a.menuClick').toggleClass('active');
                        $('nav').toggleClass('active');
                        setTimeout(function() {
                            isAnimating = 0;
                        }, 400)
                    }
                })

                $('a[href]').on('click tap', function(e) {
                    var target = $(this).attr('href');
                    e.preventDefault();
                    if ($(this).is('a:not([href^="#"])')) {
                        console.log($(this));
                        if (isAnimating != 1) {
                            if ($('nav').hasClass('active')) {
                                $('a.menuClick').toggleClass('active');
                                $('nav').toggleClass('active');
                            }
                            $('body').fadeOut();
                            setTimeout(function() {
                                isAnimating = 0;
                                window.location.href = target;
                            }, 400)
                        }
                    }

                })


            }
        },
        // Home page
        home: {
            init: function() {
                console.log('home');
            }
        },
        // Test page
        page_template_page_test: {
            init: function() {
                console.log('test');
            }
        },

        // resize events
        common_resize: {
            init: function() {
                console.log('resize');
                equalHeights('.equalHeight');
            }
        },


        common_mobile_load: {
            init: function() {
               
            }
        }

    };

    function unique(list) {
        var result = [];
        $.each(list, function(i, e) {
            if ($.inArray(e, result) === -1) {
                result.push(e);
            }
        });
        return result;
    }



    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function(func, funcname, args) {
            var namespace = Roots;
            funcname = (funcname === undefined) ? 'init' : funcname;
            if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function() {
            UTIL.fire('common');

            $.each(unique(document.body.className.replace(/-/g, '_').split(/\s+/)), function(i, classnm) {
                UTIL.fire(classnm);
            });
            if (windowWidth < 768) {
                UTIL.fire('common_mobile_load');
                $.each(unique(document.body.className.replace(/-/g, '_').split(/\s+/)), function(i, classnm) {
                    UTIL.fire(classnm + '_resize');
                });
            }
        },
        resizeEvents: function() {
            UTIL.fire('common_resize');
            $.each(unique(document.body.className.replace(/-/g, '_').split(/\s+/)), function(i, classnm) {
                UTIL.fire(classnm + '_resize');
            });
        }
    };

    $(document).ready(UTIL.loadEvents);

    $(window).resize(UTIL.resizeEvents);

})(jQuery); // Fully reference jQuery after this point.
