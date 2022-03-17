@extends('layouts.app')
@section('title', 'Danh mục')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Danh mục</h3>
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
                                @can('create', \App\Models\Category::class)
                                <a href="{{route('categories.create')}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                                @endcan
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Danh mục cha</th>
                                    <th scope="col" class="text-center">Ngôn ngữ</th>
                                    <th scope="col" class="text-center">Ngôn ngữ cha</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr role="row" >
                                        <td role="cell">{{$loop->iteration}}</td>
                                        <td role="cell">{{$category->name}}</td>
                                        <td role="cell">{{$category->parent_id ? $category->parent->name : '' }}</td>
                                        <td role="cell" class="text-center">
                                            <img src="{{$category->langs->icon}}" alt="">
                                        </td>
                                        <td role="cell" class="text-center">{{$category->parent_lang ? $category->parentLanguage->name : '' }}</td>
                                        <td role="cell" class="text-center">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$category['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="categories" data-column="status"
                                                    {{ $category['status'] ? 'checked="checked"' : '' }}>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @can('update', $category)
                                            <a href="{{route('categories.edit', $category['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            @endcan
                                            @can('delete', $category)
                                            <form class="d-inline-block" action="{{ route('categories.destroy', $category['id']) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>
                                            </form>
                                            @endcan
                                            @can('create', $category)
                                            @if(!$category['parent_lang'])
                                                @if(\App\Helpers\FunctionHelpers::checkLangCategoryExist('en', $category['id']))
                                                    <a href="{{route('categories-create.lang',['lang'=> 'en', 'category_id' => $category['id']])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-flag icon-mr"></i> Ngôn ngữ</a>
                                                @endif
                                            @endif
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($categories))
                            @include('components.data-empty')
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
