@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="home-page clearfix">
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
            <div class="main-content fl-right">
                <div class="section" id="slider-wp">
                    <div class="section-detail">
                        <div class="item">
                            <img src={{ asset('images/banner/sans-titre-19.jpg') }} alt="">
                        </div>
                        <div class="item">
                            <img src={{ asset('images/banner/labubu.png') }} alt="">
                        </div>
                        <div class="item">
                            <img src={{ asset('images/banner/banner-demo.avif') }} alt="">
                        </div>
                    </div>
                </div>
                <div class="section" id="support-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <div class="thumb">
                                    <img src={{ asset('images/icon-1.png') }}>
                                </div>
                                <h3 class="title">Miễn phí vận chuyển</h3>
                                <p class="desc">Tới tận tay khách hàng</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src={{ asset('images/icon-2.png') }}>
                                </div>
                                <h3 class="title">Tư vấn 24/7</h3>
                                <p class="desc">1900.9999</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src={{ asset('images/icon-3.png') }}>
                                </div>
                                <h3 class="title">Tiết kiệm hơn</h3>
                                <p class="desc">Với nhiều ưu đãi cực lớn</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src={{ asset('images/icon-4.png') }}>
                                </div>
                                <h3 class="title">Thanh toán nhanh</h3>
                                <p class="desc">Hỗ trợ nhiều hình thức</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src={{ asset('images/icon-5.png') }}>
                                </div>
                                <h3 class="title">Đặt hàng online</h3>
                                <p class="desc">Thao tác đơn giản</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section" id="feature-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm nổi bật</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @if ($featuredProducts->count() > 0)
                                <!-- Đúng ở đây -->
                                @foreach ($featuredProducts as $product)
                                    <!-- Sử dụng $featuredProducts -->
                                    <li class="item-featured">
                                        <a href={{ route('product.detail', ['slug' => $product->slug]) }} title=""
                                            class="thumb">
                                            <img class="image-item-product" src="{{ asset($product->images[0]->url) }}"
                                                alt="{{ $product->name }}"> <!-- Giả sử images là quan hệ -->
                                        </a>
                                        <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" title=""
                                            class="product-name">{{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}</a>
                                        <div class="price">
                                            <span class="new">{{ number_format($product->price, 0, ',', '.') }}
                                                VND</span> <!-- Định dạng giá -->
                                        </div>
                                        <div class="action clearfix">
                                            <a href="{{ route('cart.add', ['id' => $product->id]) }}" title="Thêm giỏ hàng"
                                                class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="{{ route('cart.checkout', ['id' => $product->id]) }}" title="Mua ngay"
                                                class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li>Không có sản phẩm nổi bật nào.</li> <!-- Thông báo nếu không có sản phẩm -->
                            @endif
                        </ul>
                    </div>
                </div>
                @foreach ($categoryByProducts as $categoryByProduct)
                    <div class="section" id="list-product-wp">
                        <div class="section-head">
                            <h3 class="section-title">{{ $categoryByProduct->name }}</h3>
                        </div>
                        <div class="section-detail">
                            <ul class="list-item clearfix">
                                @forelse ($categoryByProduct->products as $productByCategory)
                                    <li>
                                        <a href={{ route('product.detail', ['slug' => $productByCategory->slug]) }} title="" class="thumb">
                                            <img src={{ asset($productByCategory->images->first()->url) }}>
                                        </a>
                                        <a href={{ route('product.detail', ['slug' => $productByCategory->slug]) }} title="" class="product-name">
                                            {{ \Illuminate\Support\Str::limit($productByCategory->name, 30, '...') }}
                                        </a>
                                        <div class="price">
                                            <span
                                                class="new">{{ number_format($productByCategory->price, 0, ',', '.') }}
                                                VND</span>
                                        </div>
                                        <div class="action clearfix">
                                            <a href={{ route('cart.add', $productByCategory->id) }} title="Thêm giỏ hàng"
                                                class="add-cart fl-left">Thêm giỏ
                                                hàng</a>
                                            <a href={{ route('cart.add', $productByCategory->id) }} title="Mua ngay"
                                                class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>
                                @empty
                                    <p>Không có sản phẩm trong danh mục này.</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                @endforeach

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
