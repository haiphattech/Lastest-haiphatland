@extends('layouts.app')
@section('title', 'Phân quyền')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">TÊN QUYỀN</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tên quyền</li>
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
                                @can('create', \App\Models\Permission::class)
                                <a href="{{route('permissions.create')}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                                @endcan
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên quyền</th>
                                    <th scope="col" class="text-center">Mã quyền</th>
                                    <th scope="col" class="text-center">Nhóm quyền</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr role="row" class="text-center">
                                        <td role="cell" class="">{{$loop->iteration}}</td>
                                        <td role="cell" class="">{{$permission->name}}</td>
                                        <td role="cell" class="">{{$permission->key}}</td>
                                        <td role="cell">{{$permission->typePermission->name}}</td>
                                        <td role="cell">{{date('H:i d/m/Y', strtotime($permission->created_at))}}</td>
                                        <td role="cell" class="">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$permission['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="permissions" data-column="status"
                                                    {{ $permission['status'] ? 'checked="checked"' : '' }}>
                                            </div>

                                        </td>
                                        <td>
                                            @can('update', $permission)
                                            <a href="{{route('permissions.edit', $permission['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            @endcan
                                                {{--                                            <form class="d-inline-block" action="{{ route('permissions.destroy', $permission['id']) }}" method="POST" >--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($permissions))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $permissions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
