@extends('layouts.main')

@section('content')
<div id="main-content-wp" class="clearfix detail-product-page">
    @if (session('success'))
            <div class="alert-message"
                style="position: fixed; top: 20px; right: 20px; background-color: #25d64d; color: white; padding: 15px; border-radius: 5px; z-index: 1000;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert-message"
                style="position: fixed; top: 20px; right: 20px; background-color: #dc3545; color: white; padding: 15px; border-radius: 5px; z-index: 1000;">
                {{ session('error') }}
            </div>
        @endif
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{{url("/")}}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">{{ $product->category ? $product->category->name : 'No category' }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img class="image-detail-product" id="zoom" src="{{asset($product->images->first()->url)}}"/>
                        </a>
                        <div id="list-thumb">
                            @foreach ($product->images as $image)
                            <a class="image-zoom-detail" href="#" data-image="{{asset($image->url)}}">
                                <img id="zoom" src="{{asset($image->url)}}" />
                            </a>
                            @endforeach
                            
                        </div>
                    </div>
                    
                    <div class="info fl-right">
                        <h3 class="product-name">{{$product->name}}</h3>
                        <div class="desc">
                            <p>{{$product->desc}}</p>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">{{$product->stock_quantity > 0 ? "Còn hàng" : "Hết hàng"}}</span>
                        </div>
                        <p class="price">{{number_format($product->price, 0, ',', '.')}} VND</p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="{{ route('cart.add', ['id' => $product->id]) }}" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    {!! $product->details !!}
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
                                <a href="{{ route('cart.add', ['id' => $relateProduct->id]) }}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="{{ route('cart.checkout', ['id' => $relateProduct->id]) }}" title="" class="buy-now fl-right">Mua ngay</a>
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
                                <a href={{ route('product.detail', ['slug' => $featuredProduct->slug]) }} title="" class="thumb fl-left">
                                    <img src={{ asset($featuredProduct->images->first()->url) }} alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href={{ route('product.detail', ['slug' => $featuredProduct->slug]) }} title=""class="product-name">
                                        {{ \Illuminate\Support\Str::limit($featuredProduct->name, 30, '...') }}
                                    </a>
                                    <div class="price">
                                        <span class="new">{{ number_format($featuredProduct->price, 0, ',', '.') }}
                                            VND</span>
                                    </div>
                                    <a href={{ route('cart.add', $featuredProduct->id) }} title="" class="buy-now">Mua ngay</a>
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