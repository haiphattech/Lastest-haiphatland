@extends('layouts.app')
@section('title', 'Thay đổi mật khẩu')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Thay đổi mật khẩu</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Thay đổi mật khẩu</li>
                </ol>
            </nav>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body px-5 py-5">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            <form method="POST" action="{{ route('changePasswordPost') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Mật khẩu hiện tại</label>
                                    <input type="password" class="form-control p_input" name="current_password" value="{{old('current_password')}}">
                                    @if ($errors->has('current_password'))
                                        <div class="mt-1 notification-error">
                                            {{$errors->first('current_password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" class="form-control p_input" name="password" value="{{old('password')}}">
                                    @if ($errors->has('password'))
                                        <div class="mt-1 notification-error">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                    </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control p_input" name="confirm_password" value="{{old('confirm_password')}}">
                                    @if ($errors->has('confirm_password'))
                                        <div class="mt-1 notification-error">
                                            {{$errors->first('confirm_password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" id="check" class="form-check-input"> Hiển thị mật khẩu <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Xác nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type='text/javascript'>
        $(document).ready(function(){
            $('#check').click(function(){
                console.log(1);
                $(this).is(':checked') ? $('.p_input').attr('type', 'text') : $('.p_input').attr('type', 'password');
            });
        });
    </script>
@endpush
