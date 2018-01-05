$(document).ready(function() {

    $('.search_form').submit(function() {
        //alert($(this).attr("action"));
        action = 'search';
        article = $(this).find("input[name='article']").val();
        window.location.href = action + '/' + article;
        return false;
    });

});

