@extends('layouts.app')
@section('title', 'Cập nhập trạng thái dự án')
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
                        <a href="{{route('status-projects.index')}}">Danh sách</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                </ol>
            </nav>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="theme-form" method="POST" action="{{route('status-projects.update', $statusProject['id'])}}">
                @csrf
                @method('PATCH')
                @include('projects.status-projects._form',['statusProject'=> $statusProject])
            </form>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
