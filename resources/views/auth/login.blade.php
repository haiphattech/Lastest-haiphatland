@extends('layouts.guest')
@section('title', 'Đăng nhập')
@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-5">Đăng nhập</h3>
                        @if ($errors->has('username'))
                            <div class="alert alert-fill-danger" role="alert">
                                <i class="mdi mdi-alert-circle"></i> {{$errors->first('username')}}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Tên đăng nhập *</label>
                                <input type="text" class="form-control p_input" name="username" value="{{old('username')}}" required>
                            </div>
                            <div class="form-group mt-4">
                                <label>Mật khẩu *</label>
                                <input type="password" class="form-control p_input" name="password" required>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember"> Remember me </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-pass">Quên mật khẩu</a>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
@endsection
