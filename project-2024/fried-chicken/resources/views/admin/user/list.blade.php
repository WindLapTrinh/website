@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0">Danh sách thành viên</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" class="form-control form-search" name="keyword"
                            value="{{ $request->input('keyword') }}" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary btn-search">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <!-- Nội dung trang hiện tại -->
                <div class="analytic">
                    <a href="{{ $request->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Kích hoạt<span
                            class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ $request->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Vô hiệu hóa<span
                            class="text-muted">({{ $count[1] }})</span></a>
                </div>

                <form action="{{ url('/admin/user/action') }}" method="GET">
                    <div class="form-action form-inline py-3 row m-0 p-0">
                        <div class="col-lg-6 text-left p-0 m-0">
                            <select class="form-control mr-1" name="act">
                                <option>Chọn</option>
                                @foreach ($list_act as $k => $act)
                                    <option value="{{ $k }}">{{ $act }}</option>
                                @endforeach
                            </select>
                            <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                        </div>

                        <div class="col-lg-6 text-right p-0 m-0">
                            <!-- Nút Thêm người dùng mở modal -->
                            <button type="button" class="btn btn-primary btn-search" data-toggle="modal"
                                data-target="#addUserModal">Thêm mới</button>
                        </div>
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th>#</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Ngày tạo</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->total() > 0)
                                @php $t = 0; @endphp
                                @foreach ($users as $user)
                                    @php $t++; @endphp
                                    <tr>
                                        <td><input type="checkbox" name="list_check[]" value="{{ $user->id }}"></td>
                                        <th scope="row">{{ $t }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-warning">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <button type="button"
                                                class="btn btn-success btn-sm rounded-0 text-white btn-edit-user btn-submit"
                                                data-toggle="modal" data-target="#editUserModal"
                                                data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                data-email="{{ $user->email }}"
                                                data-roles="{{ $user->roles->pluck('id') }}" title="Edit"><i
                                                    class="fa fa-edit"></i></button>
                                            @if (Auth::id() != $user->id)
                                                <a href="{{ route('delete-user', $user->id) }}"
                                                    onclick="return confirm('Bạn có chắc xóa thành viên này không')"
                                                    class="btn btn-danger btn-sm rounded-0 text-white btn-submit"
                                                    data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">Không có nhân sự nào</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm người dùng -->
    <div id="content" class="container-fluid">
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Thêm người dùng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('admin/user/store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input class="form-control" type="text" name="name" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" id="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input class="form-control" type="password" name="password" id="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Xác nhận mật khẩu</label>
                                <input class="form-control" type="password" name="password_confirmation"
                                    id="password-confirm">
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role_id">Nhóm quyền</label>
                                <select class="form-control" name="role_id[]" id="role_id" multiple>
                                    <option value="">Chọn quyền</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Chỉnh sửa người dùng -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Chỉnh sửa người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editUserForm" action={{ route('user.update') }} method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Nhóm quyền</label>
                            <select class="form-control" name="role_id[]" id="role_id" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#addUserForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn form gửi theo cách truyền thống

                // Xóa các thông báo lỗi cũ
                $('.text-danger').remove();

                // Lấy dữ liệu form
                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        // Nếu thêm thành công
                        if (response.success) {
                            $('#addUserModal').modal('hide'); // Đóng modal
                            alert(response.message); // Hiển thị thông báo thành công
                            location.reload(); // Reload lại trang nếu cần
                        }
                    },
                    error: function(xhr) {
                        // Xử lý lỗi xác thực
                        if (xhr.status === 422) { // Lỗi xác thực
                            var errors = xhr.responseJSON.errors;
                            // Hiển thị các lỗi phía dưới từng trường
                            $.each(errors, function(key, messages) {
                                $('#' + key).after('<small class="text-danger">' +
                                    messages[0] + '</small>');
                            });
                            // Modal vẫn mở vì không có `$('#addUserModal').modal('hide')`
                        } else {
                            alert("Đã xảy ra lỗi, vui lòng thử lại.");
                        }
                    }
                });
            });
        });
    </script>
@endsection
