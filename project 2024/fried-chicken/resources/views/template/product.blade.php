@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="clearfix category-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li><a href="/" title="">Trang chủ</a></li>
                        <li><a href="" title="">Sản phẩm</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="list-product-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title fl-left">Sản phẩm</h3>
                        <div class="filter-wp fl-right">
                            <p class="desc">Hiển thị {{ $products->count() }} trên tổng số {{ $products->total() }} sản
                                phẩm</p>
                            <div class="form-filter">
                                <form method="GET" action="{{ route('product.all') }}">
                                    <select name="soft">
                                        <option value="0">Sắp xếp</option>
                                        <option value="1" {{ request('soft') == 1 ? 'selected' : '' }}>Từ A-Z</option>
                                        <option value="2" {{ request('soft') == 2 ? 'selected' : '' }}>Từ Z-A</option>
                                        <option value="3" {{ request('soft') == 3 ? 'selected' : '' }}>Giá cao xuống
                                            thấp</option>
                                        <option value="4" {{ request('soft') == 4 ? 'selected' : '' }}>Giá thấp lên cao
                                        </option>
                                    </select>
                                    <button type="submit">Lọc</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="section-detail">
                        @if (count($products) > 0)
                            <ul class="list-item clearfix">
                                @foreach ($products as $product)
                                    <li>
                                        <a href="{{ route('product.detail', $product->id) }}" title="" class="thumb">
                                            <img src="{{ asset($product->images[0]->url) }}" alt="{{ $product->name }}">
                                        </a>
                                        <a href="{{ route('product.detail', $product->id) }}" title=""
                                            class="product-name">
                                            {{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}
                                        </a>
                                        <div class="price">
                                            <span class="new">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                            @if ($product->old_price)
                                                <span
                                                    class="old">{{ number_format($product->old_price, 0, ',', '.') }}đ</span>
                                            @endif
                                        </div>
                                        <div class="action clearfix">
                                            <a href="{{ route('cart.add', ['id' => $product->id]) }}" title="Thêm giỏ hàng"
                                                class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="{{ route('cart.checkout', ['id' => $product->id]) }}" title="Mua ngay"
                                                class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                         <p>Hiện tại không có sản phẩm nào theo bộ lọc này</p>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-2">
                    {{ $products->links() }}
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
                <div class="section" id="filter-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Bộ lọc</h3>
                    </div>
                    <div class="section-detail">
                        <form method="GET" action="{{ route('product.all') }}" id="filterProductForm">
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Giá</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="price" value="under_500"></td>
                                        <td>Dưới 500.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="500_1000"></td>
                                        <td>500.000đ - 1.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="1000_5000"></td>
                                        <td>1.000.000đ - 5.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="5000_10000"></td>
                                        <td>5.000.000đ - 10.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="above_10000"></td>
                                        <td>Trên 10.000.000đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
