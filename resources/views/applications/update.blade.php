@extends('layouts.app')
@section('title', 'Cập nhập loại hình dự án')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Cập nhật</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('applications.index')}}">Danh sách</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                </ol>
            </nav>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="theme-form" method="POST" action="{{route('applications.update', $application['id'])}}">
                @csrf
                @method('PATCH')
                @include($view.'._form',['application'=> $application])
            </form>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
