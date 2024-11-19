@extends('layouts.main')

@section('content')
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">{{$post->title}}</h3>
                </div>
                <div class="section-detail">
                    <span class="create-date">{{$post->created_at->format('d/m/Y')}}</span>
                    <div class="detail">
                        {!! $post->content !!}
                    </div>
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