@extends('back-end.layouts.main')
@section('title', 'Thêm mới loại quyền')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Thêm mới loại quyền</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin')}}">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('type-permissions.index')}}">
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
            <form class="theme-form" method="POST" action="{{route('type-permissions.store')}}">
                @csrf
                @include('back-end.type-permissions._form')
            </form>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
