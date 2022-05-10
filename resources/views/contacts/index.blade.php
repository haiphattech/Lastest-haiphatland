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
                                    <th scope="col">Nội dung</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $item)
                                    <tr role="row">
                                        <td role="cell" class="text-center">{{$loop->iteration}}</td>
                                        <td role="cell" class="">
                                            <p><i class="mdi mdi-account"></i> {{$item->fullname}}</p>
                                            <p><i class="mdi mdi-email"></i> {{$item->email}}</p>
                                            <p><i class="mdi mdi-cellphone-iphone"></i>  {{$item->phone}}</p>
                                            <p title="Thời gian"><i class="mdi mdi-timer"></i>  {{date('H:i d/m/Y', strtotime($item['created_at']))}}</p>
                                        </td>
                                        <td>{{$item['content']}}</td>
                                        <td class="text-center">
                                            @can('update', $item)
                                                <a href="{{route('contacts.show', $item['id'])}}" class="btn btn-primary btn-icon-text"><i class="mdi mdi-eye icon-mr"></i> Chi tiết</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(!count($contacts))
                            @include('components.data-empty')
                        @endif
                        <div class="text-center mt-3 float-end">
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
