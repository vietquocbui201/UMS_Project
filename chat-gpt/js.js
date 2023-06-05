$(document).ready(function(){

    get_chat=function(){
        $.ajax({
            url: 'chat-gpt/function.php?action=get_chat',
            success: function (data) {
                obj = JSON.parse(data);
                for(i=0;i<obj.length;i++){
                    role=obj[i].role;
                    message=obj[i].message;
                    t=0
                    if(role=='user') t=1;
                    chat_2=$('.box-chat').children().eq(t).clone().removeClass('d-none').attr('data-role',role);
                    chat_2.children().html(string_handling(message));
                    $('.box-chat').append(chat_2);
                    $("#box-chat-gpt").scrollTop($("#box-chat-gpt")[0].scrollHeight);
                }
            }
        });
        
    }
    get_chat();

    $('#myForm').on("click", ".max",function() {
        $('.s-size').addClass('x-size').removeClass('s-size');
        $(this).hide().next().show();
    });
    $('#myForm').on("click", ".min",function() {
        $('.x-size').addClass('s-size').removeClass('x-size');
        $(this).hide().prev().show();
    });
    // ---------set up data---------------------
    send=$.ajax();
    status_chat=false;
    
    // -----------------------------------------
    $('#form-chat').submit(function(e){
        e.preventDefault();
        praent=$(this);
        message=$(this).find('input');
        if (status_chat === true)return;
        if(message.val().length<1)return;
        box_chat=$('.box-chat');
        chat_1=box_chat.children().eq(1).clone().removeClass('d-none').attr('data-role','user');
        chat_1.children().text(message.val());
        box_chat.append(chat_1);
        $("#box-chat-gpt").scrollTop($("#box-chat-gpt")[0].scrollHeight);
        form=$(this)[0];
        data=new FormData(form);
        message.attr('readonly',true);
        n=$('#box-chat-gpt').children().length;
        data_arr=[];
        if(n>2){
            if(n>22){
                num=n-20;
                for(i=num;i<n;i++){
                    o=$('#box-chat-gpt').children().eq(i);
                    data_push = 
                    {
                        "role": o.attr('data-role'),
                        "content":o.children('p').text()
                    };
                    data_arr.push(data_push);
                }
            }else{
                for(i=2;i<n;i++){
                    o=$('#box-chat-gpt').children().eq(i);
                    data_push = 
                    {
                        "role": o.attr('data-role'),
                        "content":o.children('p').text()
                    };
                    data_arr.push(data_push);
                }
            }
        }
        data.append('data', JSON.stringify(data_arr));
        status_chat=true;
        send= $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                obj = JSON.parse(data);
                try {
                    mes=obj.choices[0].message.content;
                    role=obj.choices[0].message.role;
                    message.val('');
                    message.attr('readonly',false);
                    chat_2=box_chat.children().eq(0).clone().removeClass('d-none').attr('data-role',role);
                    chat_2.children().html(string_handling(mes));
                    box_chat.append(chat_2);
                    $("#box-chat-gpt").scrollTop($("#box-chat-gpt")[0].scrollHeight);
                } catch (error) {

                    $('.noti_successfully').removeClass('alert-success').addClass('alert-danger').html('Đã xảy ra lỗi vui lòng thử lại sao 10 giây.<br>Hoặc xoá nội dung chat và thử lại sau 10 giây!').show(500).delay(2000).hide(500);
                    index_chat=$('.box-chat').children().length-1;
                    $('.box-chat').children().eq(index_chat).remove();
                    message.attr('readonly',false);
                }
                status_chat=false;
            }
            });
    });
    $('#btn-clear').click(function(){
       
        send.abort();
        status_chat=false;
        $('#box-chat-gpt').children().siblings().not('.d-none').remove();
        $('#form-chat').find('input').val('');
        $('#form-chat').find('input').attr('readonly',false);
        $.ajax({
            url: 'chat-gpt/function.php?action=clear&id=1'
        });
    });
    

    $('#box-dialog').on('click','.btn-dialog',function(){
     
        form =$(this).parent().prev().children('textarea').val().trim();
        if (form == "") return;
        if (form.length < 10) return;
        text = $(this).prev().val().trim();
        if (text == "") return;
        if (text.length < 2) return;
        $("#form-chat input").val(form.replace('[key]',text)).promise().done(function() {
            $("#form-chat").submit();
        });
        $(this).prev().val('');

    });

    $(document).on('click','.btn-last',function(){

        index_chat=$('.box-chat').children().length-1;
        form =$(this).prev().text().trim();
        if (form == "") return;
        if (form.length < 10) return;
        text = $('.box-chat').children().eq(index_chat).children('p').text().trim();
        if (text == "") return;
        if (text.length < 2) return;
        $("#form-chat input").val(form.replace('[key]',text)).promise().done(function() {
            $("#form-chat").submit();
        });
        $(this).prev().val('');
       
        return false;

    });



    $("#box-dialog").on('click','.btn-save',function(){
        content=$(this).prev().val();
        avatar=$(this).attr('data-img');
        if(content=="") return;
        if(content.length<10) return;
        $.ajax({
                url: 'chat-gpt/function.php?action=add_private',
                type: 'POST',
                dataType: 'text',
                data: {
                content: content
                }
            }).done(function (data) {
                html='<div class="d-flex box-children">';
                html+=' <div class="position-relative callout callout-danger mt-1 w-100" data-id="'+data+'">';
                html+='<p class="copy-private" style="cursor:pointer">'+content+'</p><button class="btn btn-del d-none"><i class="fa-solid fa-trash text-danger"></i></button>';
                html+=' <div class="d-flex align-items-center justify-content-between"><label data-img="'+avatar+'" class="switch btn-status" data-status="0" data-id="'+data+'"><input type="checkbox"><span class="slider round"></span></label><p class="d-none">'+content+'</p><button class="btn btn-danger text-center btn-sm ms-1 mt-1 btn-last">Last</button></div>';
                html+='</div>';
                $('#box-private').prepend(html);
            });
    });
    $(document).on('click','.copy-private',function(){
        
        html=$('#box-dialog').children().eq(0).clone().removeClass('d-none');
        html.children().eq(0).children('textarea').val($(this).text());
        $('#box-dialog').append(html);
        delete_dialog();


    });

    $("#box-private").on('click','.btn-status',function(){
       avatar=$(this).attr('data-img');
        o=$(this);
        content=$(this).next().text();
       
        id=$(this).attr('data-id');
        if($(this).attr('data-status')==0){
            console.log(content);
            if(content=="") return;
            if(content.length<10) return;
            if(add_public(id)){
                html='<div class="callout callout-warning mt-1" data-id="'+$(this).attr('data-id')+'"><div class="row"><div class="col-2">';
                html+='<img src="assets/images/'+avatar+'" alt="Product Image" class="img-size-32 profile-user-img img-circle"></div><div class="col-8">';
                html+='<p class="copy-private" style="cursor:pointer">'+content+'</p></div>';
                html+='<div class="col-2 ps-0"><p class="d-none" style="cursor:pointer">'+content+'</p><button class="btn btn-warning text-end btn-sm btn-last">Last</button></div></div></div>';
                $('#box-public').prepend(html);
            }
            o.children('input').attr('checked',true);
        }else{
            delete_public(id);
            o.children('input').removeAttr('checked');
        }
        $.ajax({
            url: 'chat-gpt/function.php?action=change_status&status='+$(this).attr('data-status')+'&id='+$(this).attr('data-id'),
            success: function (data) {
                o.attr('data-status',data);
            }
        });
        return false;

    });


    delete_public=function(id){
        $('#box-public').children().each(function(){
             if($(this).attr('data-id')==id){
                $(this).remove();
             }
        });
    }

    add_public=function(id){
        check=true;
        $('#box-public').children().each(function(){
             if($(this).attr('data-id')==id){
                check=false
             }
        });

        return check;
    }

    delete_dialog=function(){
        if($('#box-dialog').children().length>5){
            $('#box-dialog').children().eq(1).remove();
        }
    }

    $("#box-private").on('click','.btn-del',function(){
            o=$(this);
            id=$(this).parent().attr('data-id');
            $.ajax({
                url: 'chat-gpt/function.php?action=delete_private&id='+id,
                success: function (data) {
                   if(data==1){
                        o.parent().parent().remove();
                        delete_public(id);
                   }
                }
            });
            return false;
    });


    $("#box-private").on('mouseenter', '.box-children', function () {
        $(this).find('.btn-del').removeClass('d-none').hide().show(500);
      });
    
      $("#box-private").on('mouseleave', '.box-children', function () {
        $(this).find('.btn-del').hide(500).addClass('d-none');
    });


    $("#box-chat-gpt").on('click','.copy-chat',function(){

        navigator.clipboard.writeText($(this).text());
        notification= $('.noti_successfully').removeClass('alert-danger').addClass('alert-success').html('Đã sao chép văn bản thành công!').clone().removeClass('noti_successfully').show(500);
        $('#notifications').append(notification);
        $('#notifications').children().each(function(){
            o = $(this);
            if (o.attr("style") == 'z-index: 9999; width: fit-content; display: none;') {
                o.remove();
                return;
            }
            o.delay(2000).hide(500).promise().done(function() {
                o.remove();
            });

        });
      

        return false;

    })
    
    var ajax=$.ajax();
    var key="";
    find_key= function(this_input){
     ajax.abort();
     setTimeout(function(){
       o=this_input;
       key=this_input.val();
       $("#box-public").children().remove();
        ajax=$.ajax({
            url: 'chat-gpt/function.php?action=filter',
            type:'POST',
            dataType: 'text',
            data: {
            key: key
            },
            success: function (data) {
                if(data!=0){
                    html="";
                    data_obj = JSON.parse(data);
                    for(i=0;i<data_obj.length;i++){

                        html+='<div class="callout callout-warning mt-1" data-id="'+data_obj[i].id+'"><div class="row"><div class="col-2">';
                        html+='<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHnrABEsWBUqpaP-SWEILb5oj2kebuiUbN2g&amp;usqp=CAU" alt="Product Image" class="img-size-32 profile-user-img img-circle"></div><div class="col-8">';
                        html+='<p class="copy-private" style="cursor:pointer">'+data_obj[i].content+'</p></div>';
                        html+='<div class="col-2 ps-0"><p class="d-none" style="cursor:pointer">'+data_obj[i].content+'</p><button class="btn btn-warning text-end btn-sm btn-last">Last</button></div></div></div>';
                    }
                    console.log(html);
                    $("#box-public").html(html).show(500);
                }else{
                    $("#box-public").children().remove();
                }
                }
            });
       },500);
    }


    $("#search_public").keyup(function(){
        find_key($(this));
    });

});








function string_handling(result){

  if(result!=null){
    while(result.endsWith('\n')){
        result = result.replace(new RegExp('\n' + '$'), '');
    }
    while(result.startsWith('\n')){
        result = result.replace('\n','');
    }
    // result = result.replace('"""','<i class="text-danger">');
    // result = result.replace('"""','</i>');
    result = result.replaceAll('  ',' &nbsp;');
    result = result.replaceAll('\n','<br>');
    // result = result.replace('```','<div class="box-shadow p-2 bg-white"><span></span>');
    // result = result.replace('```','</div>');
    // sub="";
    // c="`";
    // index=result.indexOf('```');
    // while(c!='<'){
    //     sub+=c;
    //     index++;
    //     c=result.charAt(index);
    // }
    // console.log(sub);
    return result
  }
}
function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}
  