@extends('layouts.app')
@section('title', 'Danh mục')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Danh mục</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"Danh sách</li>
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
                                <a href="{{route('categories.create')}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col" >Thông tin</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    <th scope="col" class="text-center">Quyền</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach($users as $user)--}}
{{--                                    <tr role="row" >--}}
{{--                                        <td role="cell">{{$loop->iteration}}</td>--}}
{{--                                        <td role="cell">--}}
{{--                                            <p><i class="mdi mdi-account"></i> {{$user->name}}</p>--}}
{{--                                            <p><i class="mdi mdi-email"></i> {{$user->email}}</p>--}}
{{--                                            @if($user->phone)--}}
{{--                                            <p><i class="mdi mdi-cellphone-iphone"></i>  {{$user->phone}}</p>--}}
{{--                                            @endif--}}
{{--                                            <p><i class="mdi mdi-login"></i>  {{$user->username}}</p>--}}
{{--                                            @if($user->address)--}}
{{--                                            <p><i class="mdi mdi-map-marker-radius"></i>  {{$user->address}}</p>--}}
{{--                                            @endif--}}
{{--                                            <p title="Tham gia"><i class="mdi mdi-timer"></i>  {{date('H:i d/m/Y', strtotime($user['created_at']))}}</p>--}}
{{--                                        </td>--}}
{{--                                        <td role="cell" class="text-center">--}}
{{--                                            <img class="img-sm rounded-circle me-3" src="{{$user['avatar'] ? $user['avatar'] : '/assets/images/faces/man.png'}}" alt="">--}}
{{--                                        </td>--}}
{{--                                        <td role="cell" class="text-center">--}}
{{--                                            @if($user['is_admin'])--}}
{{--                                                <div class="badge badge-outline-danger badge-pill">Quyền Admin</div>--}}
{{--                                            @else--}}
{{--                                                <div class="badge badge-outline-success badge-pill">{{isset($user->role) ? $user->role->name : '..........'}}</div>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td role="cell" class="text-center">--}}
{{--                                            <div class="form-check form-switch" style="display: inline-block">--}}
{{--                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$user['id']}}"--}}
{{--                                                       data-api="{{route('enable-column')}}" data-table="users" data-column="status"--}}
{{--                                                    {{ $user['status'] ? 'checked="checked"' : '' }}>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            @if(!$user->isSuperAdmin())--}}
{{--                                            <div class="mb-2">--}}
{{--                                                @if(!count($user->roles))--}}
{{--                                                    <a href="{{route('authorization-user',['user_id'=> $user['id']])}}"--}}
{{--                                                       class="btn btn-primary btn-sm">--}}
{{--                                                        <i class="mdi mdi-key-plus icon-mr" aria-hidden="true"></i> Cấp quyền--}}
{{--                                                    </a>--}}
{{--                                                @else--}}
{{--                                                    @if(count($user->roles) && !empty($user->roles))--}}

{{--                                                        <a href="{{route('authorization-user-role',['user_id'=> $user['id'], 'role_id' => $user->roles[0]->id])}}"--}}
{{--                                                           class="btn btn-success btn-sm">--}}
{{--                                                            <i class="fa fa-balance-scale" aria-hidden="true"></i> Cập--}}
{{--                                                            nhật quyền--}}
{{--                                                        </a>--}}
{{--                                                        <button type="button" class="btn btn-danger btn-sm sweet-5 delete-permission" data-id="{{$user->roles[0]->id}}">--}}
{{--                                                            <i class="fa fa-trash-o"></i> Xóa quyền--}}
{{--                                                        </button>--}}
{{--                                                    @endif--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                            @endif--}}
{{--                                            <a href="{{route('users.edit', $user['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>--}}
{{--                                            <form class="d-inline-block" action="{{ route('users.destroy', $user['id']) }}" method="POST" >--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
{{--                        @if(!count($users))--}}
{{--                            @include('components.data-empty')--}}
{{--                        @endif--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
