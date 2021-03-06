@extends('layouts.main')
@section('title', 'Cart')
@section('content')


    <div class="bodywrap">
        <section class="bread-crumb">
            <span class="crumb-border"></span>
            <div class="container">
                <div class="rows">
                    <div class="col-xs-12 a-left">
                        <ul class="breadcrumb">
                            <li class="home">
                                <a href="/"><span>Trang chủ</span></a>
                                <span class="mr_lr">&nbsp;/&nbsp;</span>
                            </li>


                            <li><strong><span> Trà hoa quả</span></strong></li>


                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="signup page_customer_account">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                        <div class="block-account">
                            <h5 class="title-account">Trang tài khoản</h5>
                            <p>Xin chào, <span
                                    style="color:#4d8a54;">{{Auth::guard('loyal_customer')->user()->name}}</span>&nbsp;!
                            </p>
                            <ul>
                                <li class="account">
                                    <a disabled="disabled" class="title-info active" href="/account">Thông tin tài
                                        khoản</a>
                                </li>
                                <li class="account">
                                    <a class="title-info" href="/account/orders">Đơn hàng của bạn</a>
                                </li>

                                <li class="account">
                                    <a class="title-info" href="/account/address">Sổ địa chỉ (1)</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                        <h1 class="title-head margin-top-0">Đơn hàng của bạn</h1>
                        <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">

                            <div class="my-account">
                                <div class="dashboard">

                                    <div class="recent-orders">
                                        <div class="table-responsive-block tab-all" style="overflow-x:auto;">
                                            <table class="table table-cart table-order" id="my-orders-table">
                                                <thead class="thead-default">
                                                <tr>
                                                    <th>Đơn hàng</th>
                                                    <th>Ngày</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Giá trị đơn hàng</th>
                                                    <th>TT thanh toán</th>
                                                    <th>TT vận chuyển</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($orderDetail as $item)
                                                  @foreach($item['orders'] as $or)
{{--                                                @php(dd($orderDetail))--}}
                                                    <tr class="first odd">
                                                        <td>
                                                            <a href="{{URL::to('account/orders', ['id' => $item['id']])}}"
                                                               style="color: #2F80ED;">#{{$item['id']}}</a></td>
                                                        <td>{{$item['created_at']}}</td>
                                                        <td>


                                                        {{$item['address']}}
                                                        <!-- Yên Bái -->

                                                        </td>
                                                        <td>
                                                                @if(@empty($item['orders'][0]['total']))
                                                                <a href="">0</a>
                                                            @else <span class="price">{{ number_format($item['orders'][0]['total']) }} đ</span>
@endif
                                                        </td>
                                                        <td>

                                                            @if($or['status'] == 3)
                                                                <a href="">Đã thu tiền</a>
                                                            @else
                                                                <span class="span_pending "
                                                                  style="color: red">Chưa thu tiền</span>

                                                            @endif

                                                        </td>
                                                        <td>


                                                            @if($or['status'] == 1)
                                                                <a style="color: white;font-size: 10px"
                                                                   class="btn btn-info btn-xs"><i class="fas fa-hand-paper"></i> Tiếp nhận</a>
                                                            @elseif($or['status'] == 2)
                                                                <a style="color: white;font-size: 10px"
                                                                   class="btn btn-info btn-xs"><i class="fas fa-shipping-fast"></i> Đang giao ...</a>
                                                            @elseif($or['status'] == 3)
                                                                <a style="color: white;font-size: 10px"
                                                                   class="btn btn-success btn-xs"><i class="fas fa-check-circle"></i> Đã giao</a>
                                                            @else
                                                                <a style="color: white;font-size: 10px"
                                                                   class="btn btn-danger btn-xs"><i class="fas fa-ban"></i> Chưa tiếp nhận</a>
                                                            @endif



                                                        </td>
                                                        {{--                                                    <td>--}}
                                                        {{--                                                        @if($o->status == 1)--}}
                                                        {{--                                                            <span class="label label-primary">Tiếp nhận</span>--}}
                                                        {{--                                                        @elseif($o->status == 2 )--}}
                                                        {{--                                                            <span class="label label-info">Đang vận chuyện</span>--}}
                                                        {{--                                                        @elseif($o->status == 3 )--}}
                                                        {{--                                                            <span class="label label-success">Đã bàn giao</span>--}}
                                                        {{--                                                        @else--}}
                                                        {{--                                                            <span class="label label-danger">Hủy</span>--}}
                                                        {{--                                                        @endif--}}
                                                        {{--                                                    </td>--}}
                                                    </tr>
                                                  @endforeach
                                                @endforeach
                                                </tbody>


                                            </table>

                                        </div>

                                        <div
                                            class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
