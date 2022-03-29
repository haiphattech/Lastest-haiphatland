@extends('layouts.app')
@section('title', 'Thêm mới')
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
                    <a href="{{route('systems.index')}}">Danh sách</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success notification-submit">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <form class="theme-form" method="POST" action="{{route('systems.store')}}">
            @csrf
            @include($view.'._form',['system'=> $system])
        </form>
    </div>
    </div>
@endsection
