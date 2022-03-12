@extends('back-end.layouts.main')
@section('title', 'Trang chủ')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Danh sách loại quyền</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin')}}">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Danh sách loại quyền</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="d-inline-block pt-2">Danh sách</h5>
                            <div class="pull-right">
                                <a href="{{route('type-permissions.create')}}" id="default-sm-primary" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive  mb-0">
                            <table role="table" aria-busy="false" aria-colcount="6"
                                   class="table b-table table-striped table-hover" id="__BVID__548"><!----><!---->
                                <thead role="rowgroup" class=""><!---->
                                <tr role="row" class="">
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên loại quyền</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody role="rowgroup"><!---->
                                @foreach($typePermissions as $typePermission)
                                    <tr role="row" class="text-center">
                                    <td role="cell" class="">{{$loop->iteration}}</td>
                                    <td role="cell" class="">{{$typePermission->name}}</td>
                                    <td role="cell" class="">
                                        <div class="form-check form-switch" style="display: inline-block">
                                            <input name="my-checkbox" type="checkbox" class="form-check-input" data-id="{{$typePermission['id']}}"
                                                   data-api="{{route('enable-column')}}" data-table="type_permissions" data-column="status"
                                            {{ $typePermission['status'] ? 'checked="checked"' : '' }}>
                                        </div>

                                    </td>
                                    <td aria-colindex="5" role="cell" class="">
                                        <button class="btn btn-primary btn-xs" type="button"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-success btn-xs" type="button"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger btn-xs" type="button"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody><!---->
                            </table>
                        </div>
                        @if(!count($typePermissions))
                            @include('back-end.components.data-empty')
                        @endif

                        <div class="text-center my-3">
                            {{ $typePermissions->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
