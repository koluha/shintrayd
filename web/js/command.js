$(document).ready(function() {

    $('.carousel').carousel({
        interval: 7000
    });

    /* Обработчик Фиксакций меню фильтра*/
    var StickyElement = function(node) {
        var doc = $(document),
                fixed = false,
                anchor = node.find('.sticky-anchor'),
                content = node.find('.sticky-content');

        var onScroll = function(e) {
            var docTop = doc.scrollTop(),
                    anchorTop = anchor.offset().top;

            console.log('scroll', docTop, anchorTop);
            if (docTop > anchorTop) {
                if (!fixed) {
                    anchor.height(content.outerHeight());
                    content.addClass('fixed');
                    fixed = true;
                }
            } else {
                if (fixed) {
                    anchor.height(0);
                    content.removeClass('fixed');
                    fixed = false;
                }
            }
        };

        $(window).on('scroll', onScroll);
    };

    var demo = new StickyElement($('#sticky'));
    /* END Обработчик Фиксакций меню фильтра*/







    /* Обработчик клип по смене фильтра*/
    $('.tag-filtr-title li').click(
            function() {
                event.preventDefault();
                list = $(this).parent(); //все списки li
                list.find('li').removeClass('active');    //Удаляем класс

                form_param_shina = $(this).parent().parent().parent().parent().find('.filter-param-shina');
                form_param_shina_auto = $(this).parent().parent().parent().parent().find('.filter-param-shina-auto');



                $(this).toggleClass('active', '');

                if ($(this).hasClass('first')) {
                    form_param_shina_auto.hide();
                    form_param_shina.fadeIn(300);
                } else if ($(this).hasClass('last')) {
                    form_param_shina.hide();
                    form_param_shina_auto.fadeIn(300);
                }
            }
    );


    /* Обработчик клип по смене фильтра*/
    $('.tag-filtr-title-disk li').click(
            function() {
                event.preventDefault();
                list = $(this).parent(); //все списки li
                list.find('li').removeClass('active');    //Удаляем класс
                form_param_shina = $(this).parent().parent().parent().parent().find('.filter-param-disk');
                form_param_shina_auto = $(this).parent().parent().parent().parent().find('.filter-param-disk-auto');

                $(this).toggleClass('active', '');

                if ($(this).hasClass('first')) {
                    form_param_shina_auto.hide();
                    form_param_shina.fadeIn(300);
                } else if ($(this).hasClass('last')) {
                    form_param_shina.hide();
                    form_param_shina_auto.fadeIn(300);
                }
            }
    );


    /* Обработчик клип расширенные параметры */
    $('.add-settings').click(
            function() {
                event.preventDefault();
                block_settings = $('.add-settings-nav-filtr-block');
                display_z = block_settings.is(':hidden');

                if (display_z == false) {
                    block_settings.slideUp(300);
                } else if (display_z == true) {
                    block_settings.slideDown(300);
                }
            }
    );



    /* Обработчик клип по смене фильтра в каталоге*/
    $('.left-title-filtr li').click(
            function() {
                event.preventDefault();
                list = $(this).parent(); //все списки li
                list.find('li').removeClass('active');    //Удаляем класс

                form_param_shina = $(this).parent().parent().parent().parent().find('.left-filter-param-shina');
                form_param_shina_auto = $(this).parent().parent().parent().parent().find('.left-filter-param-shina-auto');



                $(this).toggleClass('active', '');

                if ($(this).hasClass('first')) {
                    form_param_shina_auto.hide();
                    form_param_shina.fadeIn(300);
                } else if ($(this).hasClass('last')) {
                    form_param_shina.hide();
                    form_param_shina_auto.fadeIn(300);
                }
            }
    );


    /* Обработчик клип по смене фильтра в каталоге*/
    $('.left-title-filtr-disk li').click(
            function() {
                event.preventDefault();
                list = $(this).parent(); //все списки li
                list.find('li').removeClass('active');    //Удаляем класс
                form_param_shina = $(this).parent().parent().parent().parent().find('.left-filter-param-disk');
                form_param_shina_auto = $(this).parent().parent().parent().parent().find('.left-filter-param-disk-auto');

                $(this).toggleClass('active', '');

                if ($(this).hasClass('first')) {
                    form_param_shina_auto.hide();
                    form_param_shina.fadeIn(300);
                } else if ($(this).hasClass('last')) {
                    form_param_shina.hide();
                    form_param_shina_auto.fadeIn(300);
                }
            }
    );

    /* Обработчик блоков автосервис*/
    $('.autoservice li').hover(function() {
        $(this).find('.sp_au').css("display", "flex").fadeIn("slow");
        $(this).find('.parency').fadeIn("slow");
    },
            function() {
                $(this).find('.sp_au').fadeOut("slow");
                $(this).find('.parency').fadeOut("slow");
            });

});

