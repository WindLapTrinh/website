@extends('layouts.admin')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h1 class="page-title fw-medium fs-18 mb-2">Grid Js</h1>
                    <div class="">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Grid Js</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="btn-list">
                    <button class="btn btn-primary-light btn-wave me-2">
                        <i class="bx bx-crown align-middle"></i> Plan Upgrade
                    </button>
                    <button class="btn btn-secondary-light btn-wave me-0">
                        <i class="ri-upload-cloud-line align-middle"></i> Export Report
                    </button>
                </div>
            </div>
            <!-- Page Header Close -->

            <!--Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Table Sorting
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal"
                                    data-bs-target="#create-task"><i class="ri-add-line fw-medium align-middle me-1"></i>
                                    Create Task</button>
                                <!-- Start::add task modal -->
                                <div class="modal fade" id="create-task" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Add Task</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-4">
                                                <div class="row gy-2">
                                                    <div class="col-xl-6">
                                                        <label for="task-name" class="form-label">Task Name</label>
                                                        <input type="text" class="form-control" id="task-name"
                                                            placeholder="Task Name">
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label for="task-id" class="form-label">Task ID</label>
                                                        <input type="text" class="form-control" id="task-id"
                                                            placeholder="Task ID">
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label class="form-label">Assigned Date</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-text text-muted"> <i
                                                                        class="ri-calendar-line"></i> </div>
                                                                <input type="text" class="form-control" id="assignedDate"
                                                                    placeholder="Choose date and time">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label class="form-label">Due Date</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-text text-muted"> <i
                                                                        class="ri-calendar-line"></i> </div>
                                                                <input type="text" class="form-control" id="dueDate"
                                                                    placeholder="Choose date and time">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-control" data-trigger
                                                            name="choices-single-default" id="choices-single-default">
                                                            <option value="New">New</option>
                                                            <option value="Completed">Completed</option>
                                                            <option value="Inprogress">Inprogress</option>
                                                            <option value="Pending">Pending</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <label class="form-label">Priority</label>
                                                        <select class="form-control" data-trigger
                                                            name="choices-single-default" id="choices-single-default1">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label class="form-label">Assigned To</label>
                                                        <select class="form-control" name="choices-multiple-remove-button1"
                                                            id="choices-multiple-remove-button1" multiple>
                                                            <option value="Choice 1">Angelina May</option>
                                                            <option value="Choice 2">Kiara advain</option>
                                                            <option value="Choice 3">Hercules Jhon</option>
                                                            <option value="Choice 4">Mayor Kim</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary">Add Task</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add task modal -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                #0007
                                            </th>
                                            <td>
                                                <span class="badge bg-light text-dark">26-04-2022</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                        <img src={{ asset('assets/images/faces/3.jpg') }} alt="img">
                                                    </span>Mayor Kelly
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown ms-2">
                                                    <button
                                                        class="btn btn-icon btn-secondary-light btn-sm btn-wave waves-light"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);"> Sửa </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);"> Xóa </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                #0008
                                            </th>
                                            <td>
                                                <span class="badge bg-light text-dark">15-02-2022</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                        <img src={{ asset('assets/images/faces/6.jpg') }} alt="img">
                                                    </span>Wicky Kross
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown ms-2">
                                                    <button
                                                        class="btn btn-icon btn-secondary-light btn-sm btn-wave waves-light"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);"> Sửa </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);"> Xóa </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                #0009
                                            </th>
                                            <td>
                                                <span class="badge bg-light text-dark">23-05-2022</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                        <img src={{ asset('assets/images/faces/1.jpg') }} alt="img">
                                                    </span>Julia Cam
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown ms-2">
                                                    <button
                                                        class="btn btn-icon btn-secondary-light btn-sm btn-wave waves-light"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);"> Sửa </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);"> Xóa </a>
                                                        </li>
                                                    </ul>
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
    <!-- End::app-content -->
@endsection
