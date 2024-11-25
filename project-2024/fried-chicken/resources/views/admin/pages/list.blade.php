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
                <h5 class="m-0 ">Danh sách bài viết</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" name="keyword"
                            value="{{ $request->input('keyword') }}" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary btn-search">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ $request->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Kích hoạt <span
                            class="text-muted">({{ $count['active'] }})</span></a>
                    <a href="{{ $request->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Vô hiệu hóa <span
                            class="text-muted">({{ $count['trash'] }})</span></a>
                </div>
                <form action="{{ url('/admin/page/action') }}" method="GET">
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
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addPageModal">Thêm mới</button>
                        </div>
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Đường dẫn</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pages->total() > 0)
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $page->id }}">
                                        </td>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        
                                        <td class="text-setting">{{ $page->title }}</td>
                                        <td>{{ $page->slug }}</td>
                                        <td>{{ $page->content }}</td>
                                        <td>{{ $page->status == "pending" ? "Chờ phê duyệt" : "Hoạt động"}}</td>
                                        <td>
                                            <button
                                                class="btn btn-success btn-submit btn-sm rounded-0 text-white btn-edit-page"
                                                data-id="{{ $page->id }}" data-title="{{ $page->title }}"
                                                data-content="{{ $page->content }}"
                                                data-status="{{ (string) $page->status }}"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i> 
                                            </button>

                                            <a href="{{ route('page.delete', $page->id) }}"
                                                onclick="return confirm('Bạn có chắc chắn xóa bài viết này không')"
                                                class="btn btn-danger btn-sm rounded-0 text-white btn-submit" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">Hiện tại chưa có thông tin bài viết nào !</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
                <div class="d-flex justify-content-center">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="container-fluid">
        <div class="modal fade" id="addPageModal" tabindex="-1" aria-labelledby="addPageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPageModalLabel">Thêm mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action={{route('page.add')}} method="POST">
                        @csrf
                        <div class="modal-body row p-0 m-0">
                            <div class="form-group col-12">
                                <label for="title">Tiều đề</label>
                                <input class="form-control" type="text" name="title" id="title">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="active">Hoạt động</option>
                                    <option value="pending">Đang xử lý</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="content">Nội dung</label>
                                <input class="form-control" type="text" name="content" id="content">
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (count($pages) > 0)
    <div class="modal fade" id="editPageModal" tabindex="-1" aria-labelledby="editPageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPageModalLabel">Chỉnh sửa bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editPageForm" action="{{ route('page.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="page_id" id="page_id">
                    <div class="modal-body row p-0 m-0">
                        <div class="form-group col-12">
                            <label for="editTitle">Tiêu đề</label>
                            <input class="form-control" type="text" name="title" id="editTitle">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control" id="status">
                                <option value="active" {{ $page->status == 'active' ? 'selected' : '' }}>Hoạt
                                    động</option>
                                <option value="pending" {{ $page->status == 'pending' ? 'selected' : '' }}>Chờ phê duyệt</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="editContent">Nội dung</label>
                            <input class="form-control" type="text" name="content" id="editContent"></input>
                           
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
