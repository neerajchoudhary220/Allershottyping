$(document).ready(function () {

    const columns = [
        {
            name: 'indx',
            data: 'indx',
            width: '25%',
            orderable: false,


        },
        {
            name: 'name',
            data: 'name',
            width: '25%',

        },
        {
            name: 'command',
            data: 'command',
            width: '50%',

        },

        {
            name: 'action',
            data: 'action',
            orderable: false,

        }
    ];
    function dbTbl() {
        customDt('#dt-table', uRL,
            {},
            columns,
            1
        )
    }

    dbTbl();
    // alert('working');
    $("#dt-table").on('click', '.modalBtn', function () {
        const command = $(this).parent().find('.commands').text();
        const titleName = $(this).attr('title');
        $("#commandModal").modal('show').find('#commandData').html(`<pre>${command}</pre>`);
        $("#commandModal").find("#modalTitle,#commandData").removeClass('d-none');
        $("#commandModal").find("#title,#titleName,#titleInput,#command,#modalUpdateBtn").addClass('d-none');


        $("#commandModal").find('#modalTitle').text(titleName)

    }).on('click','.EdtBtn',function(){
        const id = $(this).attr('value');
        const title_ = $(this).attr('title');
        const command = $(this).parent().parent().find('.commands').text();
        $("#commandModal").modal('show').find("#modalTitle,#commandData").addClass('d-none');
        $("#commandModal").find("#title,#titleName,#titleInput,#command,#modalUpdateBtn").removeClass('d-none')
        .find('#titleInput').val(title_);
        $("#commandModal").find('#command').val(command)


    });

});
