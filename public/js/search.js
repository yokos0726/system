$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#search_form').on('click', function(){
        
        
       
        let product_name = $('#search_text').val();
        let company_id = $('[name=company]').val(); 
        let price_min = $('#price_min').val();
        let price_max = $('#price_max').val();
        let stock_min = $('#stock_min').val();
        let stock_max = $('#stock_max').val();

       
        
         $.ajax({
            url: '/search/'+ product_name + '/' + company_id + '/' + price_min + '/' + price_max + '/' + stock_min + '/' + stock_max ,
            type: 'get',
            data: {
                'product_name': product_name,
                'company_id':company_id,
                'price_min':price_min,
                'price_max':price_max,
                'stock_min':stock_min,
                'stock_max':stock_max,
            }, 
            datatype: 'json',
              
        })
            .done(function (data) { //ajaxが成功したときの処
                
                $('#list').find("tr:gt(0)").remove();
                $.each(data,function(_index,value){

                   
                
                $('#list').append("<tr><td>" + value.id + "</td><td>" + value.product_name + "</td><td>" + value.price + "</td><td>" + value.stock + "</td><td>" + value.company_name + "</td><td>" +  "<img src='http://localhost:8888/uploads/" + value.image + "' width='50px'>" +  "</td></tr>");
                });
                
            }).fail(function () {
            //ajax通信がエラーのときの処理
                console.log('データなし');
            })
        return false;
    });

    $('.delete_product').on('click', function(){
        var deleteConfirm = confirm('削除してよろしいですか？');

        if(deleteConfirm == true) {
            var clickEle = $(this)
            var id = clickEle.data("id");

            $.ajax({
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                url: '/products/delete/' + id,
                type: 'POST',
                data: {'id': id,
                // '_method':'DELETE'
                },
            })
            .done(function () { //ajaxが成功したときの処理
            
                clickEle.parents('tr').remove();
           
            })
            .fail(function () {
            //ajax通信がエラーのときの処理
                alert('データなし');
                // console.log("jqXHR  :"+ jqXHR.status);
                // console.log("textStatus  :"+ textStatus);
                // console.log("errorThrown  :"+ errorThrown.message);
                // console.log("URL  :"+ url);


            });

        }else {
            (function(e) {
                e.preventDefault()

            });
        };

    });
});

