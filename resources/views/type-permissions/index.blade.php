@extends('layouts.app')
@section('title', 'Phân quyền')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">LOẠI QUYỀN</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Loại quyền</li>
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
                        <h4 class="card-title position-relative">
                            Danh sách
                            <a href="{{route('type-permissions.create')}}" class="btn btn-primary btn-fw float-end position-absolute btn-add">Thêm mới</a>
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên</th>
                                    <th scope="col" class="text-center">Số lượng</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($typePermissions as $permission)
                                    <tr role="row" class="text-center">
                                        <td role="cell" class="">{{$loop->iteration}}</td>
                                        <td role="cell" class="">{{$permission->name}}</td>
                                        <td role="cell" class="">
                                            <div class="badge badge-pill badge-outline-primary">{{$permission->permissions()->count()}}</div>
                                        </td>
                                        <td role="cell">{{date('H:i d/m/Y', strtotime($permission->created_at))}}</td>
                                        <td role="cell" class="">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$permission['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="type_permissions" data-column="status"
                                                    {{ $permission['status'] ? 'checked="checked"' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('type-permissions.edit', $permission['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            <form class="d-inline-block" action="{{ route('type-permissions.destroy', $permission['id']) }}" method="POST" >
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
                        @if(!count($typePermissions))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $typePermissions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
