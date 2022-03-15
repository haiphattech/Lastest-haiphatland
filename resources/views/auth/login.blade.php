@extends('layouts.guest')
@section('title', 'Đăng nhập')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <center>
                    <div class="login-heading"><p>ĐĂNG NHẬP HỆ THỐNG</p></div>
                    <div class="middle">
                        <div id="login">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <fieldset class="clearfix">
                                    <p style="color: #fd7e14;">
                                        <span class="fa fa-user"></span>
                                        <input type="text" Placeholder="Tên đăng nhập" name="username" value="{{old('username')}}" required>
                                    </p>
                                    <!-- JS because of IE support; better: placeholder="Username" -->
                                    <p>
                                        <span class="fa fa-lock"></span>
                                        <input type="password" Placeholder="Mật khẩu" name="password" required>
                                    </p>
                                    <div>
                                  <span style="width:48%; text-align:left;  display: inline-block;">
                                      <a class="small-text" href="#">Quên mật khẩu?</a>
                                  </span>
                                        <span style="width:50%; text-align:right;  display: inline-block;">
                                    <input type="submit" value="Đăng nhập"></span>
                                    </div>
                                </fieldset>
                                <div class="clearfix"></div>
                            </form>

                            <div class="clearfix"></div>

                        </div> <!-- end login -->
                        <div class="logo">
                            <img src="/assets/images/login/logo.png" height="150px" alt="logo"/>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </center>

            </div>

        </div>
    </div>
@endsection
