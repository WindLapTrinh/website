@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="cart-page">
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
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            @if (count($cart) > 0)
                <div class="section" id="info-cart-wp">
                    <div class="section-detail table-responsive">
                        <form action={{ route('cart.update') }} method="post">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Ảnh sản phẩm</td>
                                        <td>Tên sản phẩm</td>
                                        <td>Giá sản phẩm</td>
                                        <td>Số lượng</td>
                                        <td colspan="2">Thành tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td>
                                                <a href="" title="" class="thumb">
                                                    <img src={{ asset($item['image']) }} alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" title=""
                                                    class="name-product">{{ $item['name'] }}</a>
                                            </td>
                                            <td>{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                                            <td>
                                                <input type="number" name="items[{{ $item['product_id'] }}]"
                                                    value="{{ $item['quantity'] }}" min="1" class="num-order">
                                            </td>
                                            <td>{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                                            <td>
                                                <button type="submit" formaction="{{ route('cart.delete') }}" formmethod="POST" name="product_id" value="{{ $item['product_id'] }}" class="del-product btn-delete-cart">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="clearfix">
                                                <p id="total-price" class="fl-right">Tổng giá:
                                                    <span>{{ number_format($totalPrice, 0, ',', '.') }}đ</span>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div class="clearfix">
                                                <div class="fl-right">
                                                    <button type="submit" id="update-cart" class="btn btn-primary">Cập nhật
                                                        giỏ hàng</button>
                                                    <a href={{ route('cart.checkout') }} title=""
                                                        id="checkout-cart">Thanh toán</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </form>
                    </div>
                </div>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng
                            <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.
                        </p>
                        <a href={{asset(url("/"))}} title="" id="buy-more">Mua tiếp</a><br />
                        <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-clear-cart">Xóa giỏ hàng</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="box-order-cart">
                    <img class="image-order-cart" src={{ asset('./images/update/order-cart.png') }} alt="">
                    <p class="desc-order-cart">Hiện tại bạn chưa có sản phẩm nào trong giỏ hàng, hãy tiếp tục mua sắm nào !
                    </p>
                    <a href={{ url('/') }} title="" id="buy-more">Mua sắm</a><br />
                </div>
            @endif

        </div>
    </div>
@endsection
