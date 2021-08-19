@extends('layouts.main')
@section('content')
    @include('home.script')
    <style>
        .filter-title {
            background-size: 100% 100%;
            width: 100%;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            background: cadetblue;
        }

        a.filter-c.active {
            border: #fc0000 solid 1px;
        }
        a.filter-price-c.active {
            border: #fc0000 solid 1px;
        }

        .product-list-menu-child-link-icon {
            position: absolute;
            right: 2px;
            top: 4px;
            z-index: 10;
            color: #fff;
            visibility: hidden;
            font-size: 0.9rem;
        }

        a.filter-c.active .product-list-menu-child-link-overlay::after,
        a.filter-c.active .product-list-menu-child-link-icon {
            visibility: unset;
        }
        a.filter-price-c.active  .product-list-menu-child-link-overlay::after,
        a.filter-price-c.active  .product-list-menu-child-link-icon {
            visibility: unset;
        }

        .product-list-menu-child-link-overlay::after {
            content: "";
            border-top: 25px solid transparent;
            border-bottom: 25px solid transparent;
            border-left: 25px solid #fc0000;
            position: absolute;
            right: -4px;
            top: -16px;
            z-index: 10;
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            visibility: hidden;
        }

        .product-filter-price-button.text-right button {
            padding: 6px 16px;
            color: #fff;
            background-color: #1aa7fd;
            border: #1aa7fd;
            border-radius: 5px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .product-filter-price-button.text-right button:hover {
            background-color: #1695e4;

        }

        a.sort.product-list-content-filter-select-item {
            display: block;
            color: var(--text-color);
            border-radius: 5px;
            border: solid 1px #dfdddd;
            background-color: #ffffff;
            margin: 0 12px;
            padding: 8px 12px;
            flex-shrink: 0;
        }

        input.form-control.input-filter {
            border-radius: 10px;
            border: solid 1px #b0daf3;
            background-color: #ffffff;
            width: 50%;
            margin: 10px 10px 6px 10px;
            padding: 6px 8px;
        }

        .filter-input {
            display: flex;
        }

        a.sort.product-list-content-filter-select-item.active {
            background-color: #1aa7fd;
            color: #fff;
        }

        a.sort.product-list-content-filter-select-item:hover {
            background-color: #1aa7fd;
        }

        .pro-list-content-filter-select.list-sort {
            display: flex;
            max-width: 100%;
            overflow-x: auto;
        }

        .pro-list-content-filter {
            display: flex;
            align-items: center;
            padding: 12px;
            background-color: #f6f6f6;
        }

        .pro-list-content-filter-title {
            font-weight: bold;
        }

        a.filter-c {
            display: flex;
            padding: 12px;
            background-color: #b0daf3;
            border-radius: 10px;
            margin-bottom: 12px;
            color: var(--text-color);
            align-items: center;
            border: transparent solid 1px;
            position: relative;
            overflow: hidden;
            font-size: 0.9rem;
        }

        a.filter-c:hover {
            border: #fc0000 solid 1px;
            color: var(--text-color-1);
        }

        a.filter-price-c {
            display: flex;
            padding: 12px;
            background-color: #b0daf3;
            border-radius: 10px;
            margin-bottom: 12px;
            color: var(--text-color);
            align-items: center;
            border: transparent solid 1px;
            position: relative;
            overflow: hidden;
            font-size: 0.9rem;
        }

        a.filter-price-c:hover {
            border: #fc0000 solid 1px;
            color: var(--text-color-1);
        }

        .product-list-filter {
            /* border: 1px solid; */
            border-radius: 5px;
            box-shadow: 0 3px 6px 0 rgb(0 0 0 / 16%);
            background-color: #fff;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .filter-cate-tile {
            padding: 12px;
            font-weight: 700;
            border-bottom: #eee dashed 1px;
            margin-bottom: 10px;
        }

        li.filter-cate-item {
            padding: 0 10px;
        }

    </style>
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
                            <li><strong> <a href="/products"><span style="color:red">Tất cả sản phẩm</span></a></strong>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>
        <div class="section wrap_background">
            <div class="bg_collection section">
                <div class="container">
                    <div class="category-products">
                        <section class="product-view">
                            @include('flash-message')

                            <div class="row product_data">
                                <div class="col-md-3">
                                    <div class="product-list-filter">
                                        <div class="filter-title"> Lọc sản phẩm</div>
                                        <div class="filter-cate mb-5">
                                            <div class="filter-cate-tile">Danh mục sản phẩm</div>
                                            <ul class="filter-cate-ul">
                                                @foreach (App\Model\Category::all() as $item)
                                                    <li class="filter-cate-item" data-id="{{ $item->id }}">
                                                        <a href="javascript:void(0)" title="{{ $item->name }}"
                                                            class="filter-c" data-id="{{ $item->id }}">
                                                            <div class="item-text">{{ $item->name }}</div>
                                                            <div class="product-list-menu-child-link-overlay">
                                                            </div>
                                                            <i class="fas fa-check product-list-menu-child-link-icon">

                                                            </i>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="filter-price mb-4">
                                            <div class="filter-cate-tile">Giá thành</div>
                                            {{-- <div class="product-filter-price-chil">
                                                <div class="filter-input">
                                                    <input type="text" class="form-control input-filter" placeholder="To">
                                                    <input type="text"class="form-control input-filter" placeholder="From">
                                                </div>
                                                <div class="product-filter-price-button text-right ">
                                                    <button id="btnSubmitFilter mb-3">Đồng ý</button>
                                                </div>
                                            </div> --}}
                                            {{-- <ul class="filter-cate-ul">
                                                <li class="filter-cate-item" data="30000">
                                                    <a href="javascript:void(0)" class="filter-price-c"
                                                    value="30000">
                                                        <div class="item-text">Dưới {{ number_format(30000) }} đ
                                                        </div>
                                                        <div class="product-list-menu-child-link-overlay">
                                                        </div>
                                                        <i class="fas fa-check product-list-menu-child-link-icon">
                                                        </i>
                                                    </a>
                                                </li>
                                                <li class="filter-cate-item" data-range="30000-50000">
                                                    <a href="javascript:void(0)" class="filter-price-c"
                                                        data-range="30000-50000">
                                                        <div class="item-text">{{ number_format(30000) }} đ -
                                                            {{ number_format(50000) }} đ</div>
                                                        <div class="product-list-menu-child-link-overlay">
                                                        </div>
                                                        <i class="fas fa-check product-list-menu-child-link-icon">

                                                        </i>
                                                    </a>
                                                </li>
                                                <li class="filter-cate-item" data-range="50000-100000">
                                                    <a href="javascript:void(0)" class="filter-price-c"
                                                    data-range="50000-100000">
                                                        <div class="item-text">{{ number_format(50000) }} đ -
                                                            {{ number_format(100000) }} đ</div>
                                                        <div class="product-list-menu-child-link-overlay">
                                                        </div>
                                                        <i class="fas fa-check product-list-menu-child-link-icon">

                                                        </i>
                                                    </a>
                                                </li>
                                                <li class="filter-cate-item" data-range="100000-200000">
                                                    <a href="javascript:void(0)" class="filter-price-c"
                                                    data-range="100000-200000">
                                                        <div class="item-text">{{ number_format(100000) }} đ -
                                                            {{ number_format(200000) }} đ</div>
                                                        <div class="product-list-menu-child-link-overlay">
                                                        </div>
                                                        <i class="fas fa-check product-list-menu-child-link-icon">

                                                        </i>
                                                    </a>
                                                </li>
                                            </ul> --}}
                                            <select name="price" class="select-filter mb-3 form-control" onchange="filterAjaxPrice()" style="width: 100%;" class="form-control mb-3">
                                                <option value="=30k">
                                                   {{number_format(30000)}}đ 
                                                </option>
                                                <option value="30-50">
                                                    {{number_format(30000)}}đ - {{number_format(50000)}}đ
                                                </option>
                                                <option value="50-100"  >
                                                    {{number_format(50000)}}đ - {{number_format(100000)}}đ
                                                </option>
                                                <option value="100-200" >
                                                    {{number_format(100000)}}đ - {{number_format(200000)}}đ
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-9" id="productData">

                                    <div class="container">

                                        {{-- <div class="pro-list-content-filter mb-2">
                                            <div class="pro-list-content-filter-title">Sắp xếp theo</div>
                                            <div class="pro-list-content-filter-select list-sort sort" name="price">
                                                <a href="javascript:;" class="sort product-list-content-filter-select-item active"
                                                data-value="3">Mặc định</a>
                                                <a href="javascript:;" class="sort product-list-content-filter-select-item"
                                                data-value="2" >Thấp đến cao</a>
                                                <a href="javascript:;" class="sort product-list-content-filter-select-item"
                                                data-value="1" >Cao xuống thấp</a>
                                                
                                            </div>
                                        </div> --}}

                                        <div class="row">
                                            @include('home.filter-product')
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
    </div>

@endsection
