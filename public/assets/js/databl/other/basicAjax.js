
hideloader = (selector = '#loader') => {
    $(selector).addClass('d-none');
}
showloader = (selector = '#loader') => {
    $(selector).removeClass('d-none');
}
function basicAjax(uRL, method = 'post', data = null, beforeSend, success, error=null, complete=null) {
    ajxsetup();
    $.ajax({
        url: uRL,
        method: method,
        data: data,
        beforeSend: function () {
            beforeSend();

        },
        success: function (res) {
            success(res);
        },
        error: function (err) {
            error(err);
        },
        complete:function(res){
            complete(res);
        }

    });
}
