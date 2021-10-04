$(function () {


    //input data service 
    $("#inputService").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url : $(this).attr('action') ,
            method : $(this).attr('method') ,
            data : new FormData(this) ,
            processData : false ,
            contentType : false ,
            beforeSend : function(){
                $(".btn").attr('disabled',true);
                $(document).find('span.error-text').text('');
            },
            success : function(data){
                if(data.status == 0){
                    $.each(data.error ,function(prefix , val){
                        $('span.' + prefix + '_error').text(val[0]);
                    })
                }else {
                    console.log(data.pesan);
                    $("#inputService")[0].reset();
                }
            },
            complete : function(){
                $(".btn").attr('disabled',false);
            }
        })
    })
})