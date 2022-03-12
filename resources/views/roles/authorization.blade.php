@extends('back-end.layouts.main')
@section('title', 'Tạo chức vụ')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Thêm mới chức vụ</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin')}}">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('permissions.index')}}">
                                    Danh sách
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="theme-form" method="POST" action="{{route('authorization-staff-post')}}" enctype="multipart/form-data">
                @csrf
                <input name="staff_id" type="hidden" value="{{$staff->id}}">
                @include('back-end.roles._form',['staff'=>$staff, 'role' => $role])
            </form>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
