@extends('layouts.app')
@section('title', 'Phân quyền')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">TÊN MENU</h3>
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
                                <a href="{{route('menus.create')}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên</th>
                                    <th scope="col" class="text-center">Mã</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menus as $menu)
                                    <tr role="row" class="text-center">
                                        <td role="cell" class="">{{$loop->iteration}}</td>
                                        <td role="cell" class="">{{$menu->name}}</td>
                                        <td role="cell" class="">{{$menu->key}}</td>
                                        <td role="cell">{{date('H:i d/m/Y', strtotime($menu->created_at))}}</td>
                                        <td role="cell" class="">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$menu['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="menus" data-column="status"
                                                    {{ $menu['status'] ? 'checked="checked"' : '' }}>
                                            </div>

                                        </td>
                                        <td>
                                            <a href="{{route('menus.edit', $menu['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            <form class="d-inline-block" action="{{ route('permissions.destroy', $menu['id']) }}" method="POST" >
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
                        @if(!count($menus))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $menus->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
