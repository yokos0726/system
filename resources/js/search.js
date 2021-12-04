$(function(){
    $('#search_form').on('click', function(){
        $('.list_section').empty();
        let productsList = $('#search_form').val();
            if(!productsList){
                return false;
            }

       
            $.ajax({
                url: '/search',
                type: 'get',
                data: {
                    'search_form': productsList,
                },
                datatype: 'json',
            })
            .done(function (data) { //ajaxが成功したときの処理
                let html = '';

                $.each(data,function(index,value){
                    let id = value.id;
                    let product_name = value.product_name;
                    let price = value.price;
                    let stock = value.stock;
                    let company_name = value.company_name;
                    let image = value.image;

                
            html = `
                <tr>
                    <td>${id}</td>
                    <td>${product_name}</td>
                    <td>${price}</td>
                    <td>${stock}</td>
                    <td>${company_name}</td>
                    <td><img src="${image}" width="50px"></td>
                    <td><a href="/product/${id}">詳細表示</a></td>
                    <form>
                    <td><button id="delete_product" type="submit" class="btn btn-primary">削除</button></td>
                    </form>
                </tr>
            `
        })
                
             $('#return').append(html);
        }).fail(function () {
    　　　
            //ajax通信がエラーのときの処理
                console.log('データなし');
            })
      

    })

    $('#delete_product').on('click', function(){
        var deleteConfirm = confirm('削除してよろしいですか？');

        if(deleteConfirm == true) {
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'ProductsController.php',
                type: 'POST',
                data: {'product_id': '{{ $product->id }}',
                '_method':'DELETE'},
            })
            .done(function () { //ajaxが成功したときの処理
            
                clickEle.parent('tr').remove();
           
            })
            .fail(function (jqXHR,textStatus,errorThrown) {
　　　      //ajax通信がエラーのときの処理
            alert('データなし');
            console.log("jqXHR  :"+ jqXHR.status);
            console.log("textStatus  :"+ textStatus);
            console.log("errorThrown  :"+ errorThrown.message);
            console.log("URL  :"+ url);


            });

        }else {
            (function(e) {
                e.preventDefault()

            });
        };

    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token]').attr('content')
    }
});

