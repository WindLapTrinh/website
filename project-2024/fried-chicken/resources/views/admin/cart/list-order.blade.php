@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0">Danh sách đơn hàng</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic mb-4">
                    <a href="{{ route('order.list', ['status' => 'processing']) }}"
                        class="text-white bg-primary btn-status-cart">Đang xử lý<span
                            class="text-white">({{ $counts['processing'] }})</span></a>
                    <a href="{{ route('order.list', ['status' => 'delivered']) }}"
                        class="text-white bg-success btn-status-cart">Đã giao<span
                            class="text-white">({{ $counts['delivered'] }})</span></a>
                    <a href="{{ route('order.list', ['status' => 'canceled']) }}"
                        class="text-white bg-danger btn-status-cart">Đã hủy<span
                            class="text-white">({{ $counts['canceled'] }})</span></a>
                </div>

                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã</th>
                            <th>Khách hàng</th>
                            <th>Sản phẩm</th>
                            <th>Giá trị</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>#WIND{{ $order->id }}</td>
                                    <td>{{ $order->customer->fullname }}<br>{{ $order->customer->phone_number }}</td>
                                    <td>
                                        @foreach ($order->products as $product)
                                            <div>{{ $product->name }} (x{{ $product->pivot->quantity }})</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($order->products as $product)
                                            <div>
                                                {{ number_format($product->price * $product->pivot->quantity, 0, ',', '.') }}₫
                                            </div>
                                        @endforeach
                                    </td>
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

    <!-- Update Order Modal -->
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
