@extends('layouts.app')
@section('title', 'Loại hình dự án')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Dự án</h3>
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
                                @can('create', \App\Models\Application::class)
                                <a href="{{route('applications.create')}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                                @endcan
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col">Tên ứng dụng</th>
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Ngôn ngữ</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applications as $item)
                                    <tr role="row">
                                        <td role="cell" class="text-center">{{$loop->iteration}}</td>
                                        <td role="cell" class="">
                                            <p>{{$item->name}}</p>
    {{--                                            @if($item->email)--}}
    {{--                                                <p><i class="mdi mdi mdi-email"></i>  {{$item->email}}</p>--}}
    {{--                                            @endif--}}
    {{--                                            @if($item->phone)--}}
    {{--                                                <p><i class="mdi mdi-cellphone-iphone"></i>  {{$item->phone}}</p>--}}
    {{--                                            @endif--}}
    {{--                                            @if($item->address)--}}
    {{--                                                <p><i class="mdi mdi-map-marker-radius"></i>  {{$item->address}}</p>--}}
    {{--                                            @endif--}}
                                        </td>
                                        <td><a target="_blank" href="{{$item->url}}">{{$item->url}}</a></td>
                                        <td role="cell" class="text-center">{{date('H:i d/m/Y', strtotime($item->created_at))}}</td>
                                        <td role="cell" class="text-center"><img src="{{$item->langs->icon}}" alt="icon"></td>
                                        <td role="cell" class="text-center">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$item['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="applications" data-column="status"
                                                    {{ $item['status'] ? 'checked="checked"' : '' }}>
                                            </div>

                                        </td>
                                        <td class="text-center">
                                            @can('update', $item)
                                                <a href="{{route('applications.edit', $item['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            @endcan
                                            @can('delete', $item)
                                                <form class="d-inline-block" action="{{ route('applications.destroy', $item['id']) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>
                                            </form>
                                            @endcan
                                            @can('create', $item)
                                            @if(!$item['parent_lang'])
                                                @if(\App\Helpers\FunctionHelpers::checkLangApplicationExist('en', $item['id']))
                                                    <a href="{{route('applications-create.lang',['lang'=> 'en', 'item_id' => $item['id']])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-flag icon-mr"></i> Ngôn ngữ</a>
                                                @endif
                                            @endif
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($applications))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $applications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
