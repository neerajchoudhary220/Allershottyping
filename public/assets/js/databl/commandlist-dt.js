
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
    let updateUrl ='';

    $("#dt-table").on('click', '.modalBtn', function () {
        const command = $(this).parent().find('.commands').text();
        const titleName = $(this).attr('title');
        $("#commandModal").modal('show').find('#commandData').html(`<pre>${command}</pre>`);
        $("#commandModal").find("#modalTitle,#commandData").removeClass('d-none');
        $("#commandModal").find("#title,#titleName,#titleInput,#command,#modalUpdateBtn,#modalSaveBtn").addClass('d-none');
        $("#commandModal").find("#titleName").text('Title');

        $("#commandModal").find('#modalTitle').text(titleName)

    }).on('click', '.EdtBtn', function () {
        const id = $(this).attr('value');
        const title_ = $(this).attr('title');
        updateUrl = $(this).attr('url');
        const command = $(this).parent().parent().find('.commands').text();
        $("#commandModal").modal('show').find("#modalTitle,#commandData,#modalSaveBtn").addClass('d-none');
        $("#commandModal").find("#title,#titleName,#titleInput,#command,#modalUpdateBtn").removeClass('d-none')
            .find('#titleInput').val(title_);
        $("#commandModal").find('#command').val(command)
        $("#modalUpdateBtn").attr('value', id);
    });

    $("#AddNewBtn").click(function () {
        $("#commandModal").modal('show').find("#modalTitle,#commandData,#modalUpdateBtn").addClass('d-none');
        $("#commandModal").find("#title,#titleName,#titleInput,#command,#modalSaveBtn").removeClass('d-none');
        $("#commandModal").find("#titleInput,#command").val('');
        $("#commandModal").find("#titleName").text('Name');


    });
    //click to modal update button
    $("#modalUpdateBtn").click(function (e) {
        e.preventDefault();

        const formArray = $("#modalForm").serializeArray();
        const data = convertArrayToJson(formArray);
        updateCommandList(updateUrl, data);
    }
    )
    //click to  modal save btn
    $('#modalSaveBtn').click(function(e){
        e.preventDefault();
        const formArray = $("#modalForm").serializeArray();
        const data = convertArrayToJson(formArray);
        data.technique_id = $("#techniqueID").val();
        createCommandList(data);
    });

    function updateCommandList(url, data) {
        basicAjax(url, 'post', data,
            beforeSend = (res) => {
                showloader();
            },
            success = (res) => {
                hideloader();
                $("#commandModal").modal('hide');
                dbTblRefresh();

            },
            error = (err) => {
                hideloader();
            },
            complete = () => {
                hideloader();
            }
        )
    }

    function createCommandList(data) {
        ajx(creatCommandUrl,data);
    }


    function ajx(url,data){
        basicAjax(url, 'post', data,
        beforeSend = (res) => {
            showloader();
        },
        success = (res) => {
            hideloader();
            $("#commandModal").modal('hide');
            dbTblRefresh();

        },
        error = (err) => {
            hideloader();
        },
        complete = () => {
            hideloader();
        }
    )
    }


    function dbTblRefresh() {
        db_table.destroy();
        dbTbl();
    }

});

