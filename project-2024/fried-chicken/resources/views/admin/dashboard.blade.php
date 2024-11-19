@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <!-- Successful Orders -->
            <div class="col m-0 pl-0">
                <div class="card func-dasboard-sales mb-3">
                    <div class="card-header func-title-sales">ĐƠN HÀNG THÀNH CÔNG</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $orders->where('status', 'delivered')->count() }}</h5>
                        <p class="card-text">Đơn hàng giao dịch thành công</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card func-dasboard-success mb-3">
                    <div class="card-header func-title-success">ĐANG XỬ LÝ</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $orders->where('status', 'processing')->count() }}</h5>
                        <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                    </div>
                </div>
            </div>

            <div class="col ">
                <div class="card func-dasboard-processing  mb-3">
                    <div class="card-header func-title-processing">ĐƠN HÀNG HỦY</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $orders->where('status', 'canceled')->count() }}</h5>
                        <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                    </div>
                </div>
            </div>

            <div class="col pr-0">
                <div class="card func-dasboard-cancel mb-3">
                    <div class="card-header func-title-cancel">DOANH SỐ</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($totalRevenue, 0, ',', '.') }} đ</h5>
                        <p class="card-text">Doanh số hệ thống</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="card">
            <div class="card-header font-weight-bold">
                ĐƠN HÀNG MỚI
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>#WIND{{ $order->id }}</td>
                                    <td>{{ $order->customer->fullname }} <br> {{ $order->customer->phone_number }}</td>
                                    <td>
                                        @foreach ($order->products as $product)
                                            <div>{{ $product->name }} (x{{ $product->pivot->quantity }})</div>
                                        @endforeach
                                    </td>
                                    <td class="text-danger fw-bold">{{ number_format($order->total_amount) }} ₫</td>
                                    <td>
                                        @php
                                            switch ($order->status) {
                                                case 'processing':
                                                    $badgeClass = 'primary';
                                                    $statusText = 'Đang xử lý';
                                                    break;
                                                case 'delivered':
                                                    $badgeClass = 'success';
                                                    $statusText = 'Đã giao';
                                                    break;
                                                default:
                                                    $badgeClass = 'danger';
                                                    $statusText = 'Đã hủy';
                                                    break;
                                            }
                                        @endphp
                                        <span class="badge badge-{{ $badgeClass }}">{{ $statusText }}</span>

                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-submit btn-edit-order btn-sm rounded-0 text-white"
                                            data-toggle="modal" data-target="#updateOrderModal"
                                            data-id="{{ $order->id }}" data-name="{{ $order->customer->fullname }}"
                                            data-phone="{{ $order->customer->phone_number }}"
                                            data-address="{{ $order->customer->address }}"
                                            data-status="{{ $order->status }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Hiện tại chưa có thông tin bài viết nào !</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateOrderModal" tabindex="-1" role="dialog" aria-labelledby="updateOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateOrderModalLabel">Cập nhật đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateOrderForm" action="{{ route('order.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" id="order_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fullname">Tên khách hàng</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input name="address" id="address" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái đơn hàng</label>
                            <select name="status" id="status" class="form-control">
                                <option value="processing">Đang xử lý</option>
                                <option value="delivered">Đã giao</option>
                                <option value="canceled">Đã hủy</option>

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
