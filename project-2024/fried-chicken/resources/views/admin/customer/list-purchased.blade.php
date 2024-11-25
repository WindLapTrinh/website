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
                <h5 class="m-0 ">Khách hàng đã mua hàng</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" name="keyword"
                            value="{{ $request->input('keyword') }}" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary btn-search">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($customers->total() > 0)
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="{{ $customer->id }}">
                                    </td>
                                    <td scope="row">{{ $loop->iteration }}</td>

                                    <td class="text-setting">{{ $customer->fullname }}</td>
                                    <td>{{ $customer->phone_number }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        <span class="badge badge-primary">
                                            {{ $customer->status == 'potential' ? 'Tiềm năng' : 'Đã mua hàng' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-submit btn-sm rounded-0 text-white btn-edit-customer"
                                            data-id="{{ $customer->id }}" data-fullname="{{ $customer->fullname }}"
                                            data-phone="{{ $customer->phone_number }}" data-email="{{ $customer->email }}"
                                            data-status="{{ $customer->status }}" data-address="{{ $customer->address }}"
                                            type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                            Cập nhập
                                        </button>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Hiện tại chưa có thông tin khách hàng nào !</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>

    @if (count($customers) > 0)
        <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCustomerModalLabel">Chỉnh sửa thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editCustomerForm" action="{{ route('customer.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" id="customer_id">
                        <div class="modal-body row p-0 m-0">
                            <div class="form-group col-12">
                                <label for="fullname">Họ và tên</label>
                                <input class="form-control" type="text" name="fullname" id="fullname">
                                @error('fullname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="phone_number">Số điện thoại</label>
                                <input class="form-control" type="text" name="phone_number" id="phone_number">
                                @error('phone_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" id="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="address">Địa chỉ</label>
                                <input class="form-control" type="text" name="address" id="address">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="potential" {{ $customer->status == 'potential' ? 'selected' : '' }}>Tiềm
                                        năng</option>
                                    <option value="purchased" {{ $customer->status == 'purchased' ? 'selected' : '' }}>Đã
                                        mua hàng</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

@endsection
