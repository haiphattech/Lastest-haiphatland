@extends('layouts.app')
@section('title', 'Hệ thống Hải Phát Land')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Chi tiết giới thiệu Hải Phát Land</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('introduces.index')}}">Danh sách cha</a></li>
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
                                <a href="{{route('introduce_detail_create', $introduce)}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" >Tiêu đề</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    <th scope="col" class="text-center">Giới thiệu cha</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Ngôn ngữ</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($introduceDetails as $item)
                                    <tr role="row">
                                        <td role="cell" class="text-center">{{$loop->iteration}}</td>
                                        <td>
                                            <div class="text-break">{{$item->title_font}} {{$item->title}}</div>
                                        </td>
                                        <td class="text-center">
                                            <img style="width: 100px; height: 100px" class="img-customer" src="{{$item['avatar']}}" alt="">
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-outline-success">{{$item->introduce->title_font}} {{isset($item->introduce->title) ? $item->introduce->title : ''}}</div>
                                        </td>

                                        <td role="cell" class="text-center">{{date('H:i d/m/Y', strtotime($item->created_at))}}</td>
                                        <td role="cell" class="text-center"><img src="{{$item->langs->icon}}" alt="icon"></td>
                                        <td role="cell" class="text-center">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$item['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="introduce_details" data-column="status"
                                                    {{ $item['status'] ? 'checked="checked"' : '' }}>
                                            </div>

                                        </td>

                                        <td class="text-center">
                                                <a href="{{route('introduce_detail_edit', ['introduce'=> $introduce, 'introduceDetail'=> $item['id']])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                                <form class="d-inline-block" action="{{ route('introduce_detail_destroy',['introduce'=> $introduce, 'introduceDetail'=> $item['id']]) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($introduceDetails))
                            @include('components.data-empty')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
