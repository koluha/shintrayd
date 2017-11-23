$(document).ready(function () {




    //Если заполнен четвертый select тогда делаем кнопку активной для формы шины
    form_tyre = $("[data-act=act-tyre]");

    modification_id_tyre = form_tyre.parent().parent().find("[data-name=modification_id]").val();

    // console.log(form_tyre.parent().parent().parent().find('#button_p_1'));


    if (modification_id_tyre != 0) {
        form_tyre.parent().parent().parent().find('#button_p_1').removeAttr('disabled');
    }
    if (modification_id_tyre == null) {
        form_tyre.parent().parent().parent().find('#button_p_1').attr('disabled', 'disabled');
    }


    //Если заполнен четвертый select тогда делаем кнопку активной для формы Диска
    form_disk = $("[data-act=act-disk]");

    modification_id_disk = form_disk.parent().parent().find("[data-name=modification_id]").val();

    //console.log(form_tyre.parent().parent().parent().find('#button_p_1'));


    if (modification_id_disk != 0) {
        form_disk.parent().parent().parent().find('#button_p_1').removeAttr('disabled');
    }
    if (modification_id_disk == null) {
        form_disk.parent().parent().parent().find('#button_p_1').attr('disabled', 'disabled');
    }




// Вешаем обработчик события onchange
    $("[data-trigger=dep-drop]").on("change", function () {

        data_name = $(this).attr("data-name");
        data_act = $(this).attr("data-act");
        // data[data_name] = $(this).val();
        //Передать выбранное значение 
        //и перехватить какая форма в действий подбор по шинам или по дискам
        data = ({data_name: $(this).val(), data_act: data_act});


        // Контейнер для помещения ответа от сервера
        var target = $(this).attr("data-target");

        // Форму поиск с самого начала
        form = $(this).parent().parent();

        if (data_name == 'vendor_id') {
            form.find("[data-name=year_id]").empty();
            form.find("[data-name=modification_id]").empty();
            form.parent().find('#button_p_1').attr('disabled', 'disabled');
            //   console.log(form.parent().find('#button_p_1'));


        }
        if (data_name == 'mark_id') {
            form.find("[data-name=modification_id]").empty();
            form.parent().find('#button_p_1').attr('disabled', 'disabled');
        }
        if (data_name == 'year_id') {
            form.parent().find('#button_p_1').attr('disabled', 'disabled');
        }

//Если заполнен четвертый select тогда делаем кнопку активной
        if (data_name == 'modification_id') {
            if ($(this).val() != 0) {
                form.parent().find('#button_p_1').removeAttr('disabled');
            }
        }

        // Непосредственно отправка запроса на сервер
        //URL // GET-параметры
        $.getJSON($(this).attr("data-url"), data,
                // Обработчик ответа сервера
                        function (response, statusCode, xhr) {
                            var slct = $(target); // jQuery-объект целевого тега
                            slct.empty(); // Очищаем текущие <option>
                            // Обходим каждый элемент массива из ответа сервера
                            for (el in response) {
                                // И добавляем его в конец <select>
                                $("<option value=\"" + el + "\">" + response[el] + "</option>").appendTo(slct);
                            }

                            slct.removeAttr("disabled"); // Удаляем атрибут запрещающий изменение <select>
                        }
                );
            });

});

