@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="checkout-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li><a href="?page=home" title="">Trang chủ</a></li>
                        <li><a href="" title="">Đặt bàn</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <form method="POST" action="{{ route('order.store') }}" name="form-checkout">
                @csrf
                <div class="row p-0 m-0">
                    <div class="section infomation-book-customer col-12 col-md-7" id="customer-info-wp">
                        <div class="section-head">
                            <h1 class="section-title">Thông tin người đặt</h1>
                        </div>
                        <div class="section-detail">
                            <!-- Thông tin khách hàng -->
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="fullname" class="mb-2">Tên liên hệ</label>
                                    <input type="text" class="form-control" name="fullname"
                                        placeholder="nhập tên liên hệ..." id="fullname" required>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-12 col-md-6">
                                    <label for="phone_number" class="mb-2">Số điện thoại</label>
                                    <input type="tel" class="form-control" name="phone_number" id="phone_number"
                                        placeholder="nhập số điện thoại..." required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="mb-2">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="nhập emai..." required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label for="note" class="mb-2">Ghi chú</label>
                                    <textarea class="form-control" name="note" rows="5"></textarea>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Thông tin đơn hàng -->
                    <div class="section infomation-book-reservation col-12 col-md-4" id="order-review-wp">
                        <div class="section-head">
                            <h1 class="section-title">Thông tin đặt chỗ</h1>
                        </div>
                        <div class="section-detail">

                            <div class="row mt-2">
                                <div class="col-12 col-md-6">
                                    <label for="fullname" class="mb-2">Người lớn</label>
                                    <select class="form-control text-center" aria-label="Default select example">
                                        <option selected>1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="fullname" class="mb-2">Trẻ em</label>
                                    <select class="form-control text-center" aria-label="Default select example">
                                        <option selected>1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <label for="datepicker" class="mb-2 col-12">Thời gian đến</label>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="date" id="datepicker"
                                        placeholder="chọn ngày" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="time" id="timepicker"
                                        placeholder="chọn giờ" required>
                                </div>
                            </div>


                            <div id="payment-checkout-wp" class="row p-0 m-0">
                                <!-- Đặt hàng -->
                                <div class="place-order-wp clearfix col-12">
                                    <button type="submit" id="order-now" class="btn-order-store">
                                        Đặt hàng
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css">

        <!-- Flatpickr CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <!-- Flatpickr JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- Ngôn ngữ tiếng Việt -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vi.js"></script>

        <script>

            document.addEventListener("DOMContentLoaded", function() {
                // Date Picker
                flatpickr("#datepicker", {
                    dateFormat: "d/m/Y",
                    minDate: "today",
                    locale: "vn", // Sử dụng bản dịch tiếng Việt
                });

                // Time Picker
                flatpickr("#timepicker", {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    minTime: "07:00",
                    maxTime: "22:00",
                });
            });
        </script>
    </div>
@endsection
