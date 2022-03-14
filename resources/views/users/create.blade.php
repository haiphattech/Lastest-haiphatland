@extends('layouts.app')
@section('title', 'Thêm mới quyền')
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
                    <a href="{{route('permissions.index')}}">Danh sách</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </nav>
    </div>
        <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form class="theme-form" method="POST" action="{{route('users.store')}}">
            @csrf
            @include('users._form')
        </form>
    </div>
    </div>
        <!-- Container-fluid Ends-->
@endsection
