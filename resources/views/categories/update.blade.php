@extends('layouts.app')
@section('title', 'Cập nhật')
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
                        <a href="{{route('categories.index')}}">Danh sách</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                </ol>
            </nav>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="theme-form" method="POST" action="{{route('categories.update', $category['id'])}}">
                @csrf
                @method('PATCH')
                @include('categories._form')
            </form>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
