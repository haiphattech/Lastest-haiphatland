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
                                @can('create', \App\Models\Event::class)
                                <a href="{{route('events.create')}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                                @endcan
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên sự kiện</th>
                                    <th scope="col" class="text-center">Thời gian</th>
                                    <th scope="col" class="text-center">Địa điểm</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Ngôn ngữ</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $item)
                                    <tr role="row" class="text-center">
                                        <td role="cell" class="text-center">{{$loop->iteration}}</td>
                                        <td role="cell" class="">
                                            <p>{{$item->name}}</p>
                                        </td>
                                        <td>
                                            <p>Bắt đầu: {{date('H:i d-m-Y', strtotime($item['start_time']))}}</p>
                                            <p>Kết thúc: {{date('H:i d-m-Y', strtotime($item['end_time']))}}</p>
                                        </td>
                                        <td>
                                            <p>{{$item['place']}}</p>
                                            <p>{{$item['address']}}</p>
                                        </td>
                                        <td role="cell" class="text-center">{{date('H:i d/m/Y', strtotime($item->created_at))}}</td>
                                        <td role="cell" class="text-center"><img src="{{$item->langs->icon}}" alt="icon"></td>
                                        <td role="cell" class="text-center">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$item['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="events" data-column="status"
                                                    {{ $item['status'] ? 'checked="checked"' : '' }}>
                                            </div>

                                        </td>
                                        <td class="text-center">
                                            @can('update', $item)
                                                <a href="{{route('events.edit', $item['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            @endcan
                                            @can('delete', $item)
                                                <form class="d-inline-block" action="{{ route('events.destroy', $item['id']) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>
                                            </form>
                                            @endcan
                                            @can('create', $item)
                                            @if(!$item['parent_lang'])
                                                @if(\App\Helpers\FunctionHelpers::checkLangEventExist('en', $item['id']))
                                                    <a href="{{route('events-create.lang',['lang'=> 'en', 'item_id' => $item['id']])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-flag icon-mr"></i> Ngôn ngữ</a>
                                                @endif
                                            @endif
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($events))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $events->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
