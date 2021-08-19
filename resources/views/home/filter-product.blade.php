<div class="container">
    <select name="products" class="select-filter mb-3 form-control" onchange="filterAjaxCategory()" style="width: 100%;" class="form-control mb-3">
        <option value="date" {{ Request::get('products') == 'date'? "selected" : "" }}>
            Mới nhất
        </option>
        <option value="price"  {{ Request::get('products') == 'price'? "selected" : "" }}>
            Giá thấp đến cao
        </option>
        <option value="price-desc"  {{ Request::get('products') == 'price-desc'? "selected" : "" }}>
            Giá cao xuống thấp
        </option>
    </select>
    {{-- <input type="hidden" name="categories_id" id="category-js" value="{{ isset($categories) ? $categories->id : '' }}"> --}}

    {{-- <div class="pro-list-content-filter mb-2">
        <div class="pro-list-content-filter-title">Sắp xếp theo</div>
        <div class="pro-list-content-filter-select list-sort sort" name="price">
            <a href="javascript:;" class="sort product-list-content-filter-select-item active" value="default">Mặc
                định</a>
            <a href="javascript:;" class="sort product-list-content-filter-select-item" value="price">Thấp đến cao</a>
            <a href="javascript:;" class="sort product-list-content-filter-select-item" value="price-desc">Cao xuống
                thấp</a>

        </div>
    </div> --}}
    <div class="row">
        @foreach ($products as $p)
            <div class="col-md-4">
                <div class="item_product_main">
                    <div class="product-thumbnail">
                        <a class="image_thumb scale_hover" href="{{ route('details.show', ['id' => $p->id]) }}"
                            title="{{ $p->name }}" tabindex="0">
                            <img class="lazyload loaded"
                                src="{{ asset('storage' . str_replace('public', '', $p->image)) }}"
                                alt="{{ $p->name }}    " data-was-processed="true">
                        </a>
                        <div class="action1">
                            <input type="hidden" name="variantId" value="39972961" tabindex="0">
                            <button class="hidden-xs btn-buy btn-cart btn btn-views left-to add_to_cart active"
                                data-id="{{ $p->id }}" title="Thêm vào giỏ hàng">
                                <a href="{{ route('add-cart', [$p->id]) }}" style="color:white;">Thêm vào giỏ hàng</a>
                            </button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><a href="{{ URL::to('/details') }}" title="Bông lan cuộn trà xanh"
                                tabindex="0">{{ $p->name }}</a></h3>
                        <div class="price-box">
                            <span class="gia">Giá: </span>{{ number_format($p->price) }} VNĐ
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{-- <div class="section pagenav">
        <nav class="nav_pagi">
            {!! $products->render() !!}
        </nav>
    </div> --}}
</div>
