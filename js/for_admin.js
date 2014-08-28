/**
 * Created by Олег on 27.08.14.
 */

$(document).ready(function(){

    $(document).on("click", ".editAjax", function(){

        var obj = $(this);
        var url = obj.parent().parent().attr('action');
        var data = obj.parent().parent().serializeArray();
        $.blockUI();
        $.ajax({
            type : 'POST',
            data : data,
            url : url,
            success: function(responce){
                $.growlUI('', 'Отредактировано');
            }
        });
        $.unblockUI();
    });

    $(document).on("click", ".deleteAjax", function(){

        var obj = $(this);
        var form = obj.parent().parent();
        var url = obj.attr('href');
        $.blockUI();
        $.ajax({
            type : 'POST',
//            data : data,
            url : url,
            success: function(responce){
                $.growlUI('', 'Удалено');
                form.hide('slow');
            }
        });
        $.unblockUI();
    });

    $(document).on("click", ".deleteImage", function(){

        var obj = $(this);
        var url = obj.attr('href');

        $.blockUI();
        $.ajax({
            type : 'POST',
            url : url,
            success: function(responce){
                $.growlUI('', 'Изображение удалено');
                obj.parent().parent().parent().fadeOut(500);
            }
        });
        $.unblockUI();
        return false;
    });

});// end document ready
