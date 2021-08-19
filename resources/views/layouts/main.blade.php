<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tea House</title>
    <link rel="icon" href="//bizweb.dktcdn.net/100/415/010/themes/806477/assets/favicon.png?1612509872226" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('fontend/css/bootstrap.min.css')}}" />
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    <link rel="stylesheet" href="{{asset('fontend/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/css/teahouse.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/css/detail.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/css/cart.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/css/introduce.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/css/news.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/css/account.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/css/responsive.css')}}" />
    {{--    <link rel="stylesheet" href="{{asset('fontend/css/vieworders.css')}}" />--}}

</head>

<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js " integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW " crossorigin="anonymous "></script>
<script src="{{asset('fontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('fontend/js/main.js')}}"></script>
<script src="{{asset('fontend/slick/slick.js')}}"></script>
<script src="{{asset('fontend/js/owl.carousel.min.js')}}"></script>

{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">--}}
{{--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>--}}
<script>
    $(document).ready(function() {
        $(".nav-tabs a").click(function() {
            $(this).tab('show');
        });
    })
  
       //Change Cart Ajax
       function changeCartAjax(id, quantity) {
        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: id, quantity: quantity},
            success: function (res) {
                var arr = res.data;
                $.each(arr, function (index, item) {
                    var itemTotal = item.price * item.quantity;
                    $('.itemPrice' + index).html(number_format(itemTotal) + '&nbsp;₫');
                });
                $('.totals_price').html(number_format(res.total) + '&nbsp;₫');
                $('.cart-quantity').html(res.amount);
            }
        });
    }

    //Update cart
    $(".update-cart").click(function (e) {
        var id = $(this).data('id');
        var quantity = $(this).val();
        changeCartAjax(id, quantity);
    });

    //Update cart keyup
    function updateCart(ob, id) {
        var quantity = ob.value;
        if (quantity < 1) return alert('Vui lòng nhập số lượng lớn hơn 0!');
        changeCartAjax(id, quantity);
    }
</script>
{{-- <script>
    $(function () {
        $("#list li").click(function (e) {
            e.preventDefault();
            var category_id = $(this).data('id');
            $('#category-js').attr('value', category_id);
            var order = $('select[name="order"] option:selected').val();
            filterAjaxProduct(category_id,order);
        });
        $('#list-filter').on('click', 'a.page-link', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let category_id = $('#category-js').val();
            var order = $('select[name="order"] option:selected').val();
            filterAjaxProduct(category_id,order,page);
        });
    });
    function filterAjaxCategory() {
        var order = $('select[name="price"] option:selected').val();
        var category_id = $('#category-js').val();
        filterAjaxProduct(category_id,order);
    }
    function filterAjaxProduct(id,order,page) {
        $.ajax({
            type: 'GET',
            url: '{{ url('/products/filter') }}',
            data: {
                category_id: id,
            },
            success: function (res) {
                $('html, body').animate({
                    scrollTop: $("#list-filter").offset().top-50
                });
                $('#list-filter').html(res).fadeIn();
               
            },
            error: function () {
                alert('Có lỗi xảy ra, vui lòng kiểm tra lại!');
            }
        });
    }

</script> --}}

</html>
