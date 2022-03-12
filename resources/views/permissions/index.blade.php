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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title">
                                Danh sách
                                <a href="" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên quyền</th>
                                    <th scope="col" class="text-center">Mã quyền</th>
                                    <th scope="col" class="text-center">Nhóm quyền</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr role="row" class="text-center">
                                        <td role="cell" class="">{{$loop->iteration}}</td>
                                        <td role="cell" class="">{{$permission->title}}</td>
                                        <td role="cell" class="">{{$permission->name}}</td>
                                        <td role="cell">{{$permission->typePermission->name}}</td>
                                        <td role="cell" class="">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input" data-id="{{$permission['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="permissions" data-column="status"
                                                    {{ $permission['status'] ? 'checked="checked"' : '' }}>
                                            </div>

                                        </td>
                                        {{--                                    <td aria-colindex="5" role="cell" class="">--}}
                                        {{--                                        <button class="btn btn-primary btn-xs" type="button"--}}
                                        {{--                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">--}}
                                        {{--                                            <i class="fa fa-eye" aria-hidden="true"></i>--}}
                                        {{--                                        </button>--}}
                                        {{--                                        <button class="btn btn-success btn-xs" type="button"--}}
                                        {{--                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa">--}}
                                        {{--                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}
                                        {{--                                        </button>--}}
                                        {{--                                        <button class="btn btn-danger btn-xs" type="button"--}}
                                        {{--                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa">--}}
                                        {{--                                            <i class="fa fa-trash" aria-hidden="true"></i>--}}
                                        {{--                                        </button>--}}
                                        {{--                                    </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($permissions))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center my-3">
                            {{ $permissions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
