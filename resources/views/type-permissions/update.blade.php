@extends('layouts.app')
@section('title', 'Cập nhật loại quyền')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Thêm mới</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('type-permissions.index')}}">Danh sách</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                </ol>
            </nav>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="theme-form" method="POST" action="{{route('type-permissions.update', $typePermission['id'])}}">
                @csrf
                @method('PATCH')
                @include('type-permissions._form',['$typePermission'=> $typePermission])
            </form>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
