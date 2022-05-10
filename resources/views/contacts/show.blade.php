@extends('layouts.app')
@section('title', 'Chi tiết liên hệ')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Thông tin liên hệ</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('contacts.index')}}">Danh sách</a>
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
                                        <p class="editable editable-click mb-0">{{$contact['name']}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">Địa chỉ Email</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <a href="mailto:{{$contact['email']}}" class="editable editable-click editable-empty">{{$contact['email']}}</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">Số điện thoại</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <a href="tel:{{$contact['phone']}}"  class="editable editable-click">{{$contact['phone']}}</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-lg-4 col-form-label">Ngày gửi</label>
                                    <div class="col-6 col-lg-8 d-flex align-items-center">
                                        <p class="editable editable-click mb-0">{{date('H:i d/m/Y', strtotime($contact['created_at']))}}</p>
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
                            <h4 class="card-title">Nội dung</h4>
                            <hr>
                            <p class="editable editable-click">{{$contact['content']}}</p>
                        </div>
                    </div>
                    <!--form mask ends-->
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
