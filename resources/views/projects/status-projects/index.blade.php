@extends('layouts.app')
@section('title', 'Trạng thái dự án')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Trạng thái dự án</h3>
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
                                @can('create', \App\Models\StatusProject::class)
                                <a href="{{route('status-projects.create')}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                                @endcan
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col" class="text-center">Tên</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Ngôn ngữ</th>
                                    <th scope="col" class="text-center">Ngôn ngữ cha</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($statusProjects as $item)
                                    <tr role="row" class="text-center">
                                        <td role="cell" class="">{{$loop->iteration}}</td>
                                        <td role="cell" class="">{{$item->name}}</td>
                                        <td role="cell">{{date('H:i d/m/Y', strtotime($item->created_at))}}</td>
                                        <td role="cell"><img src="{{$item->langs->icon}}" alt="icon"></td>
                                        <td role="cell" class="text-center">{{$item->parent_lang ? $item->parentLanguage->name : '' }}</td>
                                        <td role="cell" class="">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$item['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="status-projects" data-column="status"
                                                    {{ $item['status'] ? 'checked="checked"' : '' }}>
                                            </div>

                                        </td>
                                        <td>
                                            @can('update', $item)
                                                <a href="{{route('status-projects.edit', $item['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            @endcan
                                            @can('delete', $item)
                                                <form class="d-inline-block" action="{{ route('status-projects.destroy', $item['id']) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>
                                            </form>
                                            @endcan
                                            @can('create', $item)
                                            @if(!$item['parent_lang'])
                                                @if(\App\Helpers\FunctionHelpers::checkLangStatusProjectExist('en', $item['id']))
                                                    <a href="{{route('status-projects-create.lang',['lang'=> 'en', 'item_id' => $item['id']])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-flag icon-mr"></i> Ngôn ngữ</a>
                                                @endif
                                            @endif
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($statusProjects))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $statusProjects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
