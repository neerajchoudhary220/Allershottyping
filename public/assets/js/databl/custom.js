// window.data_Tbl;
function convertArrayToJson(SerializeArray){
    const data ={};
    $.each(SerializeArray,function(){
        data[this.name]=this.value;
    })
    return data;

}
