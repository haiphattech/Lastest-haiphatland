@extends('layouts.app')
@section('title', 'Cập nhập loại hình dự án')
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
            <form class="theme-form" method="POST" action="{{route('candidates.update', $candidate['id'])}}">
                @csrf
                @method('PATCH')
                @include($view.'._form',['candidate'=> $candidate])
            </form>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
