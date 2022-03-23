@extends('layouts.app')
@section('title', 'Loại hình dự án')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Thông tin chung</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success notification-submit">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title">
                                Danh sách
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col">Thông tin</th>
                                    <th scope="col">logo</th>
                                    <th scope="col">favicon</th>
                                    <th scope="col">thumbnail</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($aboutUs as $item)
                                    <tr role="row">
                                        <td role="cell" class="text-center">{{$loop->iteration}}</td>
                                        <td role="cell" class="">
                                            <p><i class="mdi mdi-account"></i> {{$item->company}}</p>
                                            <p><i class="mdi mdi-email"></i> {{$item->email}}</p>
                                            @if($item->phone)
                                                <p><i class="mdi mdi-cellphone-iphone"></i>  {{$item->phone}}</p>
                                            @endif
                                            @if($item->address)
                                                <p><i class="mdi mdi-map-marker-radius"></i>  {{$item->address}}</p>
                                            @endif
                                        </td>
                                        <td><img class="img-customer" src="{{$item['logo']}}" alt="logo"></td>
                                        <td><img class="img-customer" src="{{$item['favicon']}}" alt="favicon"></td>
                                        <td><img class="img-customer" src="{{$item['thumbnail']}}" alt="thumbnail"></td>
                                        <td role="cell" class="text-center">{{date('H:i d/m/Y', strtotime($item->created_at))}}</td>
                                        <td role="cell" class="text-center"><img src="{{$item->langs->icon}}" alt="icon"></td>
                                        <td class="text-center">
                                            @can('update', $item)
                                                <a href="{{route('aboutUs.edit', $item['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($aboutUs))
                            @include('components.data-empty')
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
