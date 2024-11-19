@extends('layouts.main')

@section('content')
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="section" id="breadcrumb-wp">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li><a href={{asset("/")}} title="">Trang chủ</a></li>
                    <li><a href="#" title="">{{ $category->name }}</a></li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">{{ $category->name }}</h3>
                </div>
                <div class="section-detail">
                    @if($products->isEmpty())
                        <p>Không có sản phẩm nào trong danh mục này.</p>
                    @else
                        <ul class="list-item clearfix">
                            @foreach($products as $product)
                            <li>
                                <a href="{{ route('product.detail', $product->slug) }}" class="thumb">
                                    <img src="{{ asset($product->images->first()->url) }}" alt="{{ $product->name }}">
                                </a>
                                <a href="{{ route('product.detail', $product->id) }}" class="product-name">{{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}</a>
                                <div class="price">
                                    <span class="new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="{{ route('cart.add', $product->id) }}" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="{{ route('cart.checkout', $product->id) }}" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($relateProducts as $relateProduct)
                        <li>
                            <a href="{{route('product.detail', ['slug' => $relateProduct->slug])}}" title="" class="thumb">
                                <img src="{{asset($relateProduct->images->first()->url)}}">
                            </a>
                            <a href="{{route('product.detail', ['slug' => $relateProduct->slug]) }}" title="" class="product-name">{{ \Illuminate\Support\Str::limit($relateProduct->name, 30, '...') }}</a>
                            <div class="price">
                                <span class="new">{{number_format($relateProduct->price, 0, ',' , '.')}} VND</span>
                                <span class="old">{{number_format($relateProduct->price, 0, ',' , '.')}} VND</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>  
                        @endforeach                   
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        @foreach ($categories as $category)
                            @include('partials.category-menu', ['category' => $category])
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($featuredProducts as $featuredProduct)
                            <li class="clearfix">
                                <a href="{{route('product.detail', ['slug' => $featuredProduct->slug])}}" title="" class="thumb fl-left">
                                    <img src={{ asset($featuredProduct->images->first()->url) }} alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="{{route('product.detail', ['slug' => $featuredProduct->slug])}}" title=""class="product-name">
                                        {{ \Illuminate\Support\Str::limit($featuredProduct->name, 30, '...') }}
                                    </a>
                                    <div class="price">
                                        <span class="new">{{ number_format($featuredProduct->price, 0, ',', '.') }}
                                            VND</span>
                                    </div>
                                    <a href="" title="" class="buy-now">Mua ngay</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="{{ asset('images/banner/banner-2.jpg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection