@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0">Danh sách sản phẩm</h5>
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

                <form action="{{ route('product.action') }}" method="GET">
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
                                data-target="#addProductModal">Thêm mới</button>
                        </div>
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 500px">Tên sản phẩm</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $product->id }}">
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-setting">{{ $product->name }}</td>
                                        <td>{{ $product->category->name ?? 'Không có' }}</td>
                                        <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                                        <td>{{ $product->stock_quantity }}</td>
                                        <td>{{ $product->product_status }}</td>
                                        <td>
                                            <button class="btn btn-success btn-submit btn-sm btn-edit-product"
                                                data-target="#editProductModal" data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}" data-desc="{{ $product->desc }}"
                                                data-details="{{ $product->details }}" data-price="{{ $product->price }}"
                                                data-stock-quantity="{{ $product->stock_quantity }}"
                                                data-is-featured="{{ $product->is_featured }}"
                                                data-product-status="{{ $product->product_status }}"
                                                data-image="{{ $product->image ? asset($product->image->url) : '' }}"
                                                data-category-id="{{ $product->category_id }}"
                                                data-images="{{ json_encode($product->images->pluck('url')) }}"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="{{ route('product.delete', $product->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này không?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">Hiện tại chưa có thông tin sản phẩm nào!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
                <!-- Phân trang -->
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add  --}}
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <!-- Các trường thông tin sản phẩm -->
                        <div class="form-group col-lg-6 col-md-12">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <label for="category_id">Danh mục</label>
                            <select name="category_id" class="form-control" id="category_id">
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
                            <label for="desc">Mô tả ngắn</label>
                            <input type="text" name="desc" class="form-control" id="desc">
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="details">Chi tiết sản phẩm</label>
                            <textarea type="text" name="details" class="form-control" id="details"placeholder="Nhập chi tiết sản phẩm"></textarea>
                            @error('details')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="price">Giá</label>
                            <input type="number" name="price" class="form-control" id="price" required>
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="stock_quantity">Số lượng kho</label>
                            <input type="number" name="stock_quantity" class="form-control" id="stock_quantity"
                                required>
                            @error('stock_quantity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="is_featured">Nổi bật</label>
                            <select name="is_featured" class="form-control" id="is_featured">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                            @error('is_featured')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="product_status">Trạng thái</label>
                            <select name="product_status" class="form-control" id="product_status">
                                <option value="active">Hoạt động</option>
                                <option value="inactive">Vô hiệu hóa</option>
                                <option value="out_of_stock">Hết hàng</option>
                            </select>
                            @error('product_status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="images">Ảnh sản phẩm</label>
                            <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                            <div id="image-preview" class="mt-3"></div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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

    <!-- Edit Product Modal -->
    @if ($products->count() > 0)
        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Chỉnh sửa thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body row">
                            <input type="hidden" name="id" id="product-id">
                            <div class="mb-3 col-lg-6 col-md-12">
                                <label for="name" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" required>
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
                            <div class="mb-3 col-12">
                                <label for="desc" class="form-label">Mô tả</label>
                                <input type="text" class="form-control" id="desc" name="desc">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="details" class="form-label">Chi tiết sản phẩm</label>
                                <textarea name="details" id="mytextareaEditProduct" placeholder="Nhập chi tiết sản phẩm"></textarea>
                                @error('details')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-md-12">
                                <label for="price" class="form-label">Giá</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3 col-lg-6 col-md-12">
                                <label for="stock_quantity" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                                    required>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="is_featured">Nổi bật</label>
                                <select name="is_featured" class="form-control" id="is_featured">
                                    <option value="0" {{ $product->is_featured == 0 ? 'selected' : '' }}>Không
                                    </option>
                                    <option value="1" {{ $product->is_featured == 1 ? 'selected' : '' }}>Có</option>
                                </select>
                                @error('is_featured')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="product_status">Trạng thái</label>
                                <select name="product_status" class="form-control" id="product_status">
                                    <option value="active" {{ $product->product_status == 'active' ? 'selected' : '' }}>
                                        Hoạt
                                        động</option>
                                    <option value="inactive"
                                        {{ $product->product_status == 'inactive' ? 'selected' : '' }}>Vô
                                        hiệu hóa</option>
                                    <option value="out_of_stock"
                                        {{ $product->product_status == 'out_of_stock' ? 'selected' : '' }}>Hết hàng
                                    </option>
                                </select>
                                @error('product_status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="image-container col-12" style="display: flex; flex-wrap: wrap;"></div>

                            <div class="form-group col-12">
                                <label for="images">Ảnh sản phẩm</label>
                                <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                                <div id="image-preview" class="mt-3"></div>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
    @endif

@endsection
