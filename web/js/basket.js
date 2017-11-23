$(document).ready(function () {
    //В фильтре шипы не шипы
    $('[name=spikes]').on("click", function () {
        //.убрать галочку с нешипов
        $('[name=not_spikes]').prop("checked", false);
    });
    $('[name=not_spikes]').on("click", function () {
        //.убрать галочку с шипов
        $('[name=spikes]').prop("checked", false);
    });


//В list
//Увеличение картинки
    $('.ch_block_img').click(function () {
        //Получение атрибутов с нажатой кнопки
        // img = $(this).attr("src");

        width = $(this).width();
        height = $(this).height();
        $(this).next().find('.ch_img').height(height + 150);
        //  $(this).next().find('.ch_img img').width(width + 250).height(height + 250);
        $(this).next().height(height + 150).fadeIn(500);

        //Cкрытая форма сзади
        $('.form_back_basket').css("display", "flex");
    });
    $('.ch_block_img_zoom').click(function () {
        $(this).fadeOut(500); //Тоже все картинки скрыть
    });

//Увеличение в модификаций
    $('.pr_img_block').click(function () {
        //Получение атрибутов с нажатой кнопки
        // img = $(this).attr("src");

        width = $(this).width();
        height = $(this).height();
        $(this).next().find('.ch_img').height(height + 150);
        //  $(this).next().find('.ch_img img').width(width + 250).height(height + 250);
        $(this).next().height(height + 150).fadeIn(500);

        //Cкрытая форма сзади
        $('.form_back_basket').css("display", "flex");
    });
    $('.ch_block_img_zoom').click(function () {
        $(this).fadeOut(500); //Тоже все картинки скрыть
    });



    /* Обработчик страницы доставки корзина*/
    $(".field-deliverypayment-address").hide();

    $("#deliverypayment-delivery_method").change(function () {
        if ($(this).val() == 'adres_delivery' || $(this).val() == 'adres_delivery_z' || $(this).val() == 'transport') {
            $(".field-deliverypayment-address").show();
            return false;
        }

        if ($(this).val() == 'pickup') {
            $(".field-deliverypayment-address").hide();
            return false;
        }
    });

    /* Обработчик Страница товара изменение кол-ва select*/
    $("#quantity").change(function () {
        $('.add_basket').attr("data-count", $(this).val());

        price_roz = $('.price_roz').html();
        //Чтобы цена сумма изменялась при изменении кол-ва
        price_roz_total = parseFloat(price_roz) * $(this).val();
        $(".price_roz_total").html(number_format(price_roz_total, 0, '', ' '));
        return;
    });


    /* Обработчик Добавления товара в корзину*/
    $('.add_basket').click(function () {
        //Получение атрибутов с нажатой кнопки
        data_count = $(this).attr("data-count");
        data_id = $(this).attr("data-id");
        data_article = $(this).attr("data-article"); //code77
        data_brand = $(this).attr("data-brand"); //code77
        data_nomenclature = $(this).attr("data-nomenclature");

        $('.form_back_basket').css("display", "flex");
        //Присваиваем атрибуты из первой кнопки атрибуты на кнонке на форме
        form_add_basket = $('.form_add_basket');
        form_add_basket.find("#check_cart")
                .attr("data-count", data_count)
                .attr("data-id", data_id)
                .attr("data-brand", data_brand)
                .attr("data_article", data_article)
                .attr("data_nomenclature", data_nomenclature);
        form_add_basket.show();

        $.ajax({
            url: "/basket/add",
            type: 'post',
            dataType: 'json',
            data: ({'data_count': data_count, 'data_id': data_id, 'data_brand': data_brand, 'data_article': data_article, 'data_nomenclature': data_nomenclature}),
            success: function (data) {
                //Отправь назад данные
                //$('.results').html('Name = ' + jsondata.name + ', Nickname = ' + jsondata.nickname);
                $('#basket_info').html('<p><span class="b">' + data.count + '</span> товара</p><p> на <span class="r">' + number_format(data.sumtotal, 0, '', ' ') + ' руб.</span></p>');
            }
        });
    });

    $('.form_back_basket').click(function () {
        $('.form_back_basket').hide();
        $('.form_add_basket').hide();
        $('.ch_block_img_zoom').fadeOut(500); //Тоже все картинки скрыть
    });

//Кнопка продолжить покупки
    $('.form_back_basket').find("#check_cart").click(function () {
        $('.form_back_basket').hide();
        $('.form_add_basket').hide();
    });
    //Кнопка оформить
    $('.form_back_basket').find("#check_cart").click(function () {
        window.location.replace("/basket/index");
    });

    //кнопка шиномонтаж
    $('.mountingbutton').click(function () {
        window.location.replace("/site/mounting");
    });


});

