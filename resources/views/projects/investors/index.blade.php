@extends('layouts.app')
@section('title', 'Chủ đầu tư')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Chủ đầu tư</h3>
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
                                @can('create', \App\Models\TypeProject::class)
                                <a href="{{route('investors.create')}}" class="btn btn-primary btn-fw float-end">Thêm mới</a>
                                @endcan
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col">Thông tin</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col" class="text-center">Ngày tạo</th>
                                    <th scope="col" class="text-center">Ngôn ngữ</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($investors as $item)
                                    <tr role="row">
                                        <td role="cell" class="text-center">{{$loop->iteration}}</td>
                                        <td role="cell" class="">
                                            <p><i class="mdi mdi-houzz-box"></i>{{$item->name_company}}</p>
                                            @if($item->email)
                                                <p><i class="mdi mdi mdi-email"></i>  {{$item->email}}</p>
                                            @endif
                                            @if($item->phone)
                                                <p><i class="mdi mdi-cellphone-iphone"></i>  {{$item->phone}}</p>
                                            @endif
                                            @if($item->address)
                                                <p><i class="mdi mdi-map-marker-radius"></i>  {{$item->address}}</p>
                                            @endif
                                        </td>
                                        <td role="cell" class="text-center"><img src="{{$item['avatar'] ? $item['avatar'] : '/assets/images/team.png'}}" alt=""></td>
                                        <td role="cell" class="text-center">{{date('H:i d/m/Y', strtotime($item->created_at))}}</td>
                                        <td role="cell" class="text-center"><img src="{{$item->langs->icon}}" alt="icon"></td>
                                        <td role="cell" class="text-center">
                                            <div class="form-check form-switch" style="display: inline-block">
                                                <input name="my-checkbox" type="checkbox" class="form-check-input css-switch" data-id="{{$item['id']}}"
                                                       data-api="{{route('enable-column')}}" data-table="investors" data-column="status"
                                                    {{ $item['status'] ? 'checked="checked"' : '' }}>
                                            </div>

                                        </td>
                                        <td class="text-center">
                                            @can('update', $item)
                                                <a href="{{route('investors.edit', $item['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend icon-mr"></i> Sửa</a>
                                            @endcan
                                            @can('delete', $item)
                                                <form class="d-inline-block" action="{{ route('investors.destroy', $item['id']) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>
                                            </form>
                                            @endcan
                                            @can('create', $item)
                                            @if(!$item['parent_lang'])
                                                @if(\App\Helpers\FunctionHelpers::checkLangInvestorExist('en', $item['id']))
                                                    <a href="{{route('investors-create.lang',['lang'=> 'en', 'item_id' => $item['id']])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-flag icon-mr"></i> Ngôn ngữ</a>
                                                @endif
                                            @endif
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($investors))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $investors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
