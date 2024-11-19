@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                        <span>Danh sách danh mục con của "{{ $parentCategory->name }}"</span>
                        <div class="form-search form-inline">
                            <form action="#">
                                <input type="text" class="form-control form-search" name="keyword"
                                    value="{{ $request->input('keyword') }}" placeholder="Tìm kiếm">
                                <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary btn-search">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="analytic">
                            <a href="{{ $request->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Kích
                                hoạt<span class="text-muted">({{ $count[0] }})</span></a>
                            <a href="{{ $request->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Vô hiệu
                                hóa<span class="text-muted">({{ $count[1] }})</span></a>
                        </div>
                        <form action="{{ url('/category/post/action') }}" method="GET">
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
                                        data-target="#addCategoryModal">Thêm mới</button>
                                </div>
                            </div>
                            <table class="table table-striped table-checkall">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <input name="checkall" type="checkbox">
                                        </th>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $subcategory)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="list_check[]" value="{{ $subcategory->id }}">
                                            </td>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <a class="text-setting"
                                                    href="{{ $subcategory->children->count() > 0 ? route('category.post.subcategories', $subcategory->id) : '#' }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </td>
                                            <td>{{ $subcategory->slug }}</td>
                                            <td>{!! $subcategory->desc !!}</td>
                                            <td>
                                                <button
                                                    class="btn btn-success btn-sm rounded-0 text-white btn-edit-category-post btn-submit"
                                                    type="button" data-id="{{ $subcategory->id }}"
                                                    data-name="{{ $subcategory->name }}"
                                                    data-desc="{{ $subcategory->desc }}"
                                                    data-parent_id="{{ $subcategory->parent_id }}" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <a href="{{ route('category.post.delete', $subcategory->id) }}"
                                                    onclick="return confirm('Bạn có chắc xóa danh mục này không?')"
                                                    class="btn btn-danger btn-sm rounded-0 text-white btn-submit"
                                                    type="button" data-toggle="tooltip" data-placement="top"
                                                    title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Thêm mới danh mục -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Thêm mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="close-model">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('category.post.store') }}" method="POST">
                        @csrf
                        <div class="modal-body row p-0 m-0">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="name">Tên danh mục</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Nhập tên danh mục" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="parent_id">Danh mục cha</label>
                                <select name="parent_id" class="form-control" id="parent_id">
                                    <option value="0">Không có</option>
                                    <!-- Gọi hàm đệ quy để hiển thị danh mục phân cấp -->
                                    @foreach ($categories as $category)
                                        @include('admin.partials.category-option', [
                                            'category' => $category,
                                            'prefix' => '',
                                        ])
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="desc">Mô tả danh mục</label>
                                <textarea name="desc" class="form-control" id="desc" placeholder="Nhập mô tả danh mục"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-right">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Cập nhật danh mục -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog"
            aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Cập nhật thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="close-model">&times;</span>
                        </button>
                    </div>
                    <form id="editCategoryForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body row p-0 m-0">
                            <input type="hidden" name="category_id" id="category_id">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="edit_name">Tên danh mục</label>
                                <input type="text" name="name" class="form-control" id="edit_name"
                                    placeholder="Nhập tên danh mục" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="edit_parent_id">Danh mục</label>
                                <select name="parent_id" class="form-control" id="edit_parent_id">
                                    <option value="0">Không có</option>
                                    @foreach ($allCategories as $category)
                                        @include('admin.partials.category-option', [
                                            'category' => $category,
                                            'prefix' => '',
                                        ])
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="desc">Mô tả danh mục</label>
                                <textarea name="desc" class="form-control" id="mytextarea" placeholder="Nhập mô tả danh mục"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-right">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
