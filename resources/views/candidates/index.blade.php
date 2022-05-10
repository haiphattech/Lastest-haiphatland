@extends('layouts.app')
@section('title', 'Ưng viên ứng tuyển')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Ứng viên ứng tuyển</h3>
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
                            </h4>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">STT</th>
                                    <th scope="col">Thông tin</th>
                                    <th scope="col" class="text-center">Vị trí ứng tuyển</th>
                                    <th scope="col" class="text-center">File ứng tuyển</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($candidates as $item)
                                    <tr role="row">
                                        <td role="cell" class="text-center">{{$loop->iteration}}</td>
                                        <td role="cell" class="">
                                            <p><i class="mdi mdi-account"></i> {{$item->fullname}}</p>
                                            <p><i class="mdi mdi-email"></i> {{$item->email}}</p>
                                            <p><i class="mdi mdi-cellphone-iphone"></i>  {{$item->phone}}</p>
                                            <p title="Thời gian"><i class="mdi mdi-timer"></i>  {{date('H:i d/m/Y', strtotime($item['created_at']))}}</p>
                                        </td>
                                        <td class="text-center">
                                            {{($item->recruit && isset($item->recruit->name)) ? $item->recruit->name : ''}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{$item['url_cv']}}">Tải xuống</a>
                                        </td>
                                        <td class="text-center">
                                            @can('update', $item)
                                                <a href="{{route('candidates.show', $item['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-eye icon-mr"></i> Chi tiết</a>
                                            @endcan
{{--                                            @can('delete', $item)--}}
{{--                                                <form class="d-inline-block" action="{{ route('candidates.destroy', $item['id']) }}" method="POST" >--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i class="mdi mdi-delete btn-icon-prepend icon-mr"></i> Xóa</button>--}}
{{--                                            </form>--}}
{{--                                            @endcan--}}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($candidates))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $candidates->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
