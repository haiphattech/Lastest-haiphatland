@extends('layouts.app')
@section('title', 'Thông tin ứng viên')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Thông tin ứng viên</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('candidates.index')}}">Danh sách</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                </ol>
            </nav>
        </div>
        <!-- Container-fluid starts-->
        <div class="container">
            <div class="row">
                <div class="col-lg-7 grid-margin stretch-card">
                    <!--x-editable starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin chung</h4>
                            <hr>
                            <div class="template-demo">
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">Họ và tên</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <p class="editable editable-click mb-0">{{$candidate['fullname']}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">Địa chỉ Email</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <a href="mailto:{{$candidate['email']}}" class="editable editable-click editable-empty">{{$candidate['email']}}</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">Số điện thoại</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <a href="tel:{{$candidate['phone']}}"  class="editable editable-click">{{$candidate['phone']}}</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">Ngày ứng tuyển</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <p class="editable editable-click mb-0">{{date('H:i d/m/Y', strtotime($candidate['created_at']))}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">Vị trí ứng tuyển</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <a href="#" class="editable editable-pre-wrapped editable-click">{{$candidate->recruit->name}}</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">File Hồ sơ</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <a href="{{$candidate['url_cv']}}" class="editable editable-pre-wrapped editable-click"><i class="mdi mdi-download"></i> Tải xuống</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--x-editable ends-->
                </div>
                <div class="col-lg-5 grid-margin stretch-card">
                    <!--form mask starts-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Giới thiệu về bản thân của ứng viên</h4>
                            <hr>
                            <p class="editable editable-click">{{$candidate['introduce']}}</p>
                        </div>
                    </div>
                    <!--form mask ends-->
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
