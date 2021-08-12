@extends('layouts.main')
@section('title', 'Cart')
@section('content')

<style>
    a.backdetail{
        color: black;
        font-size: 14px;
        font-weight:400 !important;
    }td{
      font-size: 15px;
       color: #4d8a54;
       font-weight: bold;
    }
    .table tbody+tbody{
        border-top: none !important;
    }
</style>
 @include('flash-message')
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
                        <li><strong><span>Giỏ hàng</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>

    <h1>{{ (session('message') ? session('message') : " ") }}</h1>
    <section class="main-cart-page main-container">
        <div class="container">
             {{-- @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['quantity'] @endphp
                        @endforeach
            <h1 class=" title_cart ">GIỎ HÀNG CỦA BẠN CÓ <strong style="color: red" >{{ $total }}</strong> SẢN PHẨM</h1>
         --}}
         
            <div class="error">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                    <table class="table ">
                 
                        <?php $count =1;?>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <tbody>
                            <tr data-id="{{$id}}">
                                <td data-th="Image" width="15%"><a class="backdetail" href="{{URL::to('/details',[$details['id']])}}"><img width="75px" src="{{$details['options'][0]}}" alt=""></a></td>
                                <td data-th="Product" width="25%"><a class="backdetail" href="{{URL::to('/details',[$details['id']])}}">{{$details['name']}}</a>
                                <p class="pt-3 ">
                                    {{number_format($details['price'])}} đ
                                </p>
                                </td>
                                {{-- <td data-th="Quantity" width="15%">
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart text-center" />
                                </td> --}}
                                <td >
                                    <div class="item-qty">
                                        <div class="qty quantity-partent">
                                            <button type="button" class="qty-down qty-btn" onclick="qtyDown(this, {{ $id }})" id="qtyDown">-</button>
                                            <input type="text" data-id="{{ $id }}" value="{{ $details['quantity'] }}" class="form-control quantity update-cart input-number itemQty{{$details['id']}}" min="1" onkeyup="updateCart(this,{{ $id }})" onchange="validInputQty(this)" onkeypress="if(isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                                            <button type="button" class="qty-up qty-btn" onclick="qtyUp(this, {{ $id }})"id="qtyUp">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center itemPrice{{$details['id']}}" data-th="Subtotal"width="20%">{{ number_format($details['price']*$details['quantity']) }} đ</td>
                                <td width="20%" class="text-center" data-th="remove">
                                    <a  class="remove-itemx"  href="{{url('/cart/remove',[$details['id']])}}"><i class="fa fa-times"></i></a>
                                </td>

                            </tr>
                            @endforeach
                            @else
                            <p class="no-item">Không có sản phẩm nào. Quay lại cửa hàng để tiếp tục mua sắm.</p>
                            
                            <style>
                                table.table.table-hover {
                                    display: none;
                                }
                                .bg_cart.shopping-cart-table-total {
                                    display: none;
                                }
                                h1.title_cart {
                                        display: none !important;
                                    }
                                p.no-item {
                                    margin-bottom: 200px;
                                }
                                
                            </style>
                  @endif
                            <?php $count++;?>
                            </tbody>

                    </table>
                </div>
                </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section continued">

                        <div class="bg_cart shopping-cart-table-total">
                            <div class="table-total">
                                <table class="table">
                                    <tbody>
                                         @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total +=  $details['price'] * $details['quantity'] @endphp
                        @endforeach
                                    <tr>
                                        <td class="total-text f-left">Tổng tiền :</td>
                                        <td class="txt-right totals_price price_end f-right ">{{ number_format($total) }} đ</td>
                                    </tr>

                                    </tbody></table>
                            </div>

                            <a href="{{URL::to('products')}}" class="form-cart-continue"><i class="fas fa-reply"></i>Tiếp tục mua hàng</a>


                            @if(Auth::guard('loyal_customer')->user() != NULL )
                                <a href="/checkout" class="btn-checkout-cart button_checkfor_buy"><i class="fas fa-check"></i>Tiến hành thanh toán</a>

                            @else
                                <a href="/login/customer" class="btn-checkout-cart button_checkfor_buy"><i class="fas fa-check"></i>Tiến hành thanh toán</a>

                            @endif
                        </div>
                    </div>

                </div>

            </div>


        </div>




@endsection
