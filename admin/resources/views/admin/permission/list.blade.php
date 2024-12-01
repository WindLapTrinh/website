@extends('layouts.admin')

@section('content')
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style2 mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="ti ti-settings me-1 fs-15"></i>Cài đặt</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Phân quyền</li>
                    </ol>
                    </nav>
            </div>
            
        </div>
        <!-- Page Header Close -->

        <!--Start:: row-4 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Danh Sách Quyền
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal"
                                data-bs-target="#create-task"><i class="ri-add-line fw-medium align-middle me-1"></i>
                                Quyền</button>
                            <!-- Start::add task modal -->
                            <div class="modal modal-lg fade" id="create-task" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header btn-primary">
                                            <h6 class="modal-title text-white">Thêm quyền</h6>
                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-4">
                                            <div class="row gy-2">
                                                <div class="col-xl-12">
                                                    <label for="name" class="form-label">Tên quyền</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="nhập tên quyền">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="description" class="form-label">Nội dung</label>
                                                    <textarea class="form-control" id="description" rows="5"></textarea>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-primary">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End::add task modal -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered border-primary table-checkall">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên quyền</th>
                                        <th scope="col">Thao tác</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <th scope="row">
                                            #0007
                                        </th>
                                        <td>
                                            <span class="badge bg-light text-dark">26-04-2022</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="hstack gap-2 fs-15">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary"><i class="ri-edit-line"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger"><i class="ri-delete-bin-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--End:: row-4 -->

    </div>
</div>
@endsection