
$(document).ready(function(event){
    $('#uploadFile').ajaxForm({beforeSend: function() {
        $('#upload_status').empty();
        var percentVal = '0%';
        $('.bar').width(percentVal)
        $('.percent').html(percentVal);

    },uploadProgress:function(event, position, total, percentComplete){
        var percentVal = percentComplete + '%';
        $('.bar').width(percentVal)
        $('.percent').html(percentVal);

    },success:function(o){
        var percentVal = '100%';
        $('.bar').width(percentVal);
        $('.percent').html(percentVal);

    }, complete: function(xhr) {

        var info=xhr.responseText.split(':');
        if(info[0]!='Error'){
         $('#upload_status').html("File"+xhr.responseText+"uploaded");
        $("#uploadedFiles").append("<div>"+xhr.responseText+'<a class="delFile" rel="public/upload/'+xhr.responseText.replace(/\s+/g, '')+'" href="#">X</a></div>');
        }else{
            $('#upload_status').html('<div>'+xhr.responseText+'</div>');
        }
    }  })

});



$(function(){
    $.get('CV/listDir',function(o){

        for(var i=0;i< o.length;i++)
        {
            var name=o[i].split('/').pop();

            $("#uploadedFiles").append('<div>'+name+'<a class="delFile" rel="'+ o[i]+'" href="#">X</a></div>');

        }


    },'json');

})

$(document).on("click",".delFile",function(){
    target=$(this)
    var dir= $(this).attr('rel');
    //alert(id);
    $.post('CV/deleteFile',{'dir':dir},function(o){
//        console.log(o);
        target.parent().remove();
    });

    return false;
})

$(function(){

    $.get('CV/xhrGetListing',function(o){
        for(var i=0;i< o.length;i++)
        {
            $("#listInsert").append('<div>'+o[i].text+'<a class="del" rel="'+o[i].id+'" href="#">X</a></div>');

        }


    },'json');



    $("#randomInsert").submit(function(){
        var url=$(this).attr('action');
        var data=$(this).serialize();

        $.post(url,data,function(o){
            //console.log(o.text);
            $("#listInsert").append('<div>'+ o.text+'<a class="del" rel="'+ o.id+'" href="#">X</a></div>');
        },'json');

        return false;
    })


})

$(document).on("click",".del",function(){
    target=$(this)
    var id= $(this).attr('rel');
    //alert(id);
    $.post('CV/xhrDeleteListing',{'id':id},function(o){
        target.parent().remove();
    });

    return false;
})