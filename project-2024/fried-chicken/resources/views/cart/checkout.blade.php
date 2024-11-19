@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="checkout-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li><a href="?page=home" title="">Trang chủ</a></li>
                        <li><a href="" title="">Thanh toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <form method="POST" action="{{ route('order.store') }}" name="form-checkout">
                @csrf
                <div class="section" id="customer-info-wp">
                    <div class="section-head">
                        <h1 class="section-title">Thông tin khách hàng</h1>
                    </div>
                    <div class="section-detail">
                        <!-- Thông tin khách hàng -->
                        <div class="row">
                            <div class="col-12">
                                <label for="fullname">Họ tên</label>
                                <input type="text" class="form-control" name="fullname" id="fullname" required>
                            </div>
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" required>
                            </div>
                            <div class="col-12">
                                <label for="phone_number">Số điện thoại</label>
                                <input type="tel" class="form-control" name="phone_number" id="phone_number" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thông tin đơn hàng -->
                <div class="section" id="order-review-wp">
                    <div class="section-head">
                        <h1 class="section-title">Thông tin đơn hàng</h1>
                    </div>
                    <div class="section-detail">
                        <!-- Cart Items -->
                        <table class="table-striped">
                            <thead>
                                <tr class="row p-0 m-0">
                                    <th class="col-3">Ảnh</th>
                                    <th class="col-5">Sản phẩm</th>
                                    <th class="col-2">Số lượng</th>
                                    <th class="col-2">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr class="cart-item row p-0 m-0">
                                        <td class="col-3">
                                            <img class="product-image" src="{{ asset($item['image']) }}" alt="">
                                        </td>
                                        <td class="product-name col-5">
                                            <span> {{ $item['name'] }}</span>
                                        </td>
                                        <td class="col-2">
                                            <strong class="product-quantity">x {{ $item['quantity'] }}</strong>
                                        </td>
                                        <td class="product-total col-2">
                                            {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} đ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total row p-0 m-0 pt-2 text-right">
                                    <td class="col-9"><span>Tổng đơn hàng:</span></td>
                                    <td class="col-3"><strong
                                            class="total-price">{{ number_format($totalPrice, 0, ',', '.') }} đ</strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Phương thức thanh toán -->
                        <div id="payment-checkout-wp" class="row p-0 m-0">
                            <div class="col-6 p-0 m-0">
                                <ul id="payment_methods">
                                    <li>
                                        <input type="radio" id="direct-payment" name="payment_method" value="COD" required>
                                        <label for="direct-payment">Thanh toán tại cửa hàng</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="payment-home" name="payment_method" value="Online Payment">
                                        <label for="payment-home">Thanh toán tại nhà</label>
                                    </li>
                                </ul>
                            </div>

                            <!-- Đặt hàng -->
                            <div class="place-order-wp clearfix col-6">
                                <button type="submit" id="order-now" class="btn-order-store">
                                    Đặt hàng
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
