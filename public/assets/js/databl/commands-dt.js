$(document).ready(function () {

    const columns = [
        {
            name: 'indx',
            data: 'indx',
            width: '50%',

        },
        {
            name: 'name',
            data: function (row) {
                return `<div class='techniqueName'>${row.name}</div>`;
            },
            width: '50%',



        },
        {
            name: 'action',
            data: 'action',
        }
    ];
    function dbTbl() {
        customDt('#dt-table', uRL,
            {},
            columns
        )
    }

    dbTbl();







    //Add new btn click

    $("#AddNewBtn").click(function () {
        $("#modalForm").find('#command').parent().parent().removeClass('d-none');
        $("#modalSaveBtn").show();
        $("#modalUpdateBtn").hide();
        $("#techniqueModal").modal('show');

        $("#technique").val('');

    })



    //click to edit button

    $("#dt-table").on('click', '.EdtBtn', function () {
        const uRL = $(this).attr('url');
        $("#updateurl").val(uRL);
        const techniqueName = $(this).parent().parent().find('.techniqueName').text();
        $("#modalForm").find('#command').parent().parent().addClass('d-none');
        $("#technique").val(techniqueName);
        $("#modalSaveBtn").hide();
        $("#modalUpdateBtn").show();
        $("#techniqueModal").modal('show');

    })

    $("#modalSaveBtn").click(function (e) {
        e.preventDefault();
        const formArray = $("#modalForm").serializeArray();
        const data = convertArrayToJson(formArray);
        CreateTechnique(data);
    })

    $("#modalUpdateBtn").click(function (e) {
        const uRL = $("#updateurl").val();
        e.preventDefault();
        const data = {
            'name':$("#technique").val()
        }
        UpdateTechnique(data,uRL);
    })


    function CreateTechnique(data) {
        basicAjax(techniqueCreate,
            'post',
            data,
            beforeSend = () => {
                showloader();
            },
            success = (res) => {
                hideloader();
                $("#techniqueModal").modal('hide');
                dbTblRefresh();
            }
        )
    }

    function UpdateTechnique(data,url){
        basicAjax(url,
            'patch',
            data,
            beforeSend = () => {
                showloader();
            },
            success = (res) => {
                hideloader();
                $("#techniqueModal").modal('hide');
                dbTblRefresh();
            }
        )
    }



    function dbTblRefresh() {
        db_table.destroy();
        dbTbl();
    }

});
