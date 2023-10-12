$(document).ready(function () {
    console.log(uRL)
    const columns = [
        {
            name: 'indx',
            data:'indx',
            width:'50%',

        },
        {
            name: 'name',
            data: 'name',
            width:'50%',



        },
        {
            name:'action',
            data:'action',
        }
    ];
    function dbTbl() {
        customDt('#dt-table', uRL,
        {},
        columns
        )
    }

    dbTbl();

});
