<script src="{{asset('fontend/js/jquery-3.3.1.min.js')}}"></script>

    {{-- <script>
       $('body').on('click', '.filter-c', function() {
                var categorie_id = $(this).data("id");
                $(this).addClass('active');
                var url = location.href;
            console.log(url);
            $('.filter-c').not(this).removeClass("active");
            $( ".filter-c" ).dblclick(function() {
                $(this).removeClass('active');
                window.location.reload(1);
            });
                $.ajax({
                    url: "{{url('products/filters')}}",
                    method:"GET",
                    dataType:"html",
                    data: 'categories_id=' + categorie_id,
                    success:function(res){
                        $("#productData").html(res).fadeIn();
                    }
                })
                    .catch((error) => {
                        console.log(error);
                    })
            });
   
    </script> --}}


{{-- <script>
    $('body').on('click', '.product-list-content-filter-select-item', function() {
        var sort = $(this).data('value');
        console.log(sort);
        $(this).addClass('active');
            $('.product-list-content-filter-select-item').not(this).removeClass("active");
                $.ajax({
                        url: "{{url('products/sort')}}",
                        method:"GET",
                        dataType:"html",
                        success:function(res){
                            $("#productData").html(res).fa;
                        }
                    })
                        .catch((error) => {
                            console.log(error);
                        })
         });
 </script> --}}

 {{-- <script>
    function filterAjaxCategory() {
        var products = $('select[name="products"] option:selected').val();
             $(this).addClass('active');
         $('.product-list-content-filter-select-item').not(this).removeClass("active");
        $.ajax({
                        url: "{{url('products/filters')}}",
                        method:"GET",
                        dataType:"html",
                        data: 'products' + products,
                        success:function(res){
                            $("#productData").html(res);
                        }
                    })
                        .catch((error) => {
                            console.log(error);
                        })
        }
 </script> --}}


<script>
        $(function () {
        $('body').on('click', '.filter-c', function (e) {
            e.preventDefault();
         
            $(this).addClass('active');
                var url = location.href;
            console.log(url);
            $('.filter-c').not(this).removeClass("active");
            $( ".filter-c" ).dblclick(function() {
                $(this).removeClass('active');
                window.location.reload(1);
            });
            let page = $(this).attr('href').split('page=')[1];
            let categorie_id = $(this).data("id");
            filterAjaxProduct(categorie_id,page);
        });

        // $('body').on('click', '.filter-price-c', function (e) {
        //     e.preventDefault();
        //     $(this).addClass('active');
        //         var url = location.href;
        //     $('.filter-price-c').not(this).removeClass("active");
        //     $( ".filter-price-c" ).dblclick(function() {
        //         $(this).removeClass('active');
        //         window.location.reload(1);
        //     });
        //     let page = $(this).attr('href').split('page=')[1];
        //     let price = $(this).data('range');
        //     filterAjaxProduct(price,page);
        // });
    });
    function filterAjaxCategory() {
        var products = $('select[name="products"] option:selected').val();
        var category_id = $('#category-js').val();
        filterAjaxProduct(category_id,products);
    }
    function filterAjaxPrice() {
        var products = $('select[name="price"] option:selected').val();
        var category_id = $('#category-js').val();
        filterAjaxProduct(category_id,products);
    }

     function filterAjaxProduct(categorie_id,products,page) {
        if(!page) page=1;
        var url = location.href;
        window.history.pushState("", "", url);
        $.ajax({
            type: 'GET',
            url: '{{ url('/products/filters') }}',
            data: {
                categories_id: categorie_id,
                products: products,
                page: page,
               
            },
            success: function (res) {
                $('html, body').animate({
                    scrollTop: $("#productData").offset().top-50
                });
                $('#productData').html(res).fadeIn();
               
            },
            error: function () {
                alert('Có lỗi xảy ra, vui lòng kiểm tra lại!');
            }
        });
    }
</script>