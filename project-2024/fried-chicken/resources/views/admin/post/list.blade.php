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
                    <a href="{{ $request->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Kích hoạt<span
                            class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ $request->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Vô hiệu hóa<span
                            class="text-muted">({{ $count[1] }})</span></a>
                </div>
                <form action="{{ url('/admin/post/action') }}" method="GET">
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
                                data-target="#addPostModal">Thêm mới</button>
                        </div>
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($posts->total() > 0)
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $post->id }}">
                                        </td>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($post->image)
                                                <img src="{{ asset($post->image->url) }}" alt="" width="80"
                                                    height="80">
                                            @else
                                                <img src="http://via.placeholder.com/80X80" alt="">
                                            @endif
                                        </td>
                                        <td><a href="" class="title-post">{{ $post->title }}</a></td>
                                        <td>{{ $post->category->name ?? 'Không có' }}</td>
                                        <td>{{ $post->status == 'pending' ? 'Chờ duyệt' : 'Hoạt động' }}</td>
                                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <button
                                                class="btn btn-success btn-submit btn-sm rounded-0 text-white btn-edit-post"
                                                data-target="#editPostModal" data-id="{{ $post->id }}"
                                                data-title="{{ $post->title }}" data-category-id="{{ $post->category_id }}"
                                                 data-note="{{ $post->note }}"
                                                data-content="{{ $post->content }}"
                                                data-image="{{ $post->image ? asset($post->image->url) : '' }}"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="{{ route('post.delete', $post->id) }}"
                                                onclick="return confirm('Bạn có chắc chắn xóa bài viết này không')"
                                                class="btn btn-danger btn-sm rounded-0 text-white btn-submit" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
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
                </form>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="addPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPostModalLabel">Thêm mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row p-0 m-0">
                        <!-- Title Input -->
                        <div class="form-group col-lg-6 col-md-12">
                            <label for="title">Tiêu đề bài viết</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                            
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Category Selection -->
                        <div class="form-group col-lg-6 col-md-12">
                            <label for="category_id">Danh mục</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $category)
                                    @include('admin.partials.category-option', [
                                        'category' => $category,
                                        'prefix' => '',
                                    ])
                                @endforeach
                            </select>

                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="note">Mô tả</label>
                            <input type="text" class="form-control" name="note" id="note"></input>

                            @error('note')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Content Input -->
                        <div class="form-group col-12">
                            <label for="content">Nội dung bài viết</label>
                            <textarea class="form-control" name="content" id="content"></textarea>

                            @error('content')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending">Chờ duyệt</option>
                                <option value="published">Công khai</option>
                            </select>
                            @error('status')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group col-12">
                            <label for="image">Ảnh đại diện</label>
                            <input type="file" name="image" id="image" class="form-control-file">

                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Modal Footer with Submit Button -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($posts->total() > 0)
        <div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="editPostForm" action="{{ route('post.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_id" id="post_id">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPostModalLabel">Chỉnh sửa bài viết</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row p-0 m-0 ">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="title">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" id="title" required>
                               
                                @error('title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="category_id">Danh mục</label>
                                <select name="category_id" class="form-control" id="category_id">
                                    <option value="0">Không có</option>
                                    @foreach ($categories as $category)
                                        @include('admin.partials.category-option', [
                                            'category' => $category,
                                            'prefix' => '',
                                        ])
                                    @endforeach
                                </select>
                               
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="note">Mô tả</label>
                                <input type="text" class="form-control" name="note" id="note"></input>
    
                                @error('note')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <label for="content">Nội dung bài viết</label>
                                <textarea class="form-control" name="content" id="mytextareaEditPost"></textarea>
                              
                                @error('content')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <!-- Hiển thị ảnh hiện tại nếu có -->
                                <div class="mt-2">
                                    <img src="" alt="Ảnh hiện tại" class="img-thumbnail" id="current_image"
                                        width="150" style="display: none;">
                                </div>
                                <label for="image">Chọn ảnh mới</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                                
                                @error('file')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="pending" {{ $post->status == 'pending' ? 'selected' : '' }}>Chờ duyệt
                                    </option>
                                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Công
                                        khai</option>
                                </select>
                                @error('status')
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
    @endif
@endsection
