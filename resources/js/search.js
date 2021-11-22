$(function(){
    $('#search_form').on('click', function(){

        $.ajax({
            url: '/search',
            type: 'post',
            datatype: 'json',
        })
        .done(function (data) { //ajaxが成功したときの処理
            
            $.each(data.products, function (key, value) { 
                $(".list_section").append($json);
            });

           
        }).fail(function () {
　　　//ajax通信がエラーのときの処理
            console.log('データなし');
        })


    })
})