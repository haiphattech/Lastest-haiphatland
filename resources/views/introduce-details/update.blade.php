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
                        <a href="{{route('introduce_detail_list', $introduce['id'])}}">Danh sách</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                </ol>
            </nav>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="theme-form" method="POST" action="{{route('introduce_detail_update', ['introduce' => $introduce['id'], 'introduceDetail' => $introduceDetail['id']])}}">
                @csrf
                @method('PATCH')
                @include($view.'._form',['introduceDetail'=> $introduceDetail])
            </form>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
