@extends('layouts.app')
@section('title', 'Tạo chức vụ')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Thêm mới chức vụ</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('permissions.index')}}">Danh sách</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                </ol>
            </nav>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="theme-form" method="POST" action="{{route('authorization-user-post')}}" enctype="multipart/form-data">
                @csrf
                <input name="user_id" type="hidden" value="{{$user->id}}">
                @include('roles._form',['user'=>$user, 'role' => $role])
            </form>
        </div>
    </div>
@endsection
