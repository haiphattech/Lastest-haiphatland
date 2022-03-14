<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin cá nhân</h4>
                <hr>
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Họ tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="vd: Hải Phát Land" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <div class="mt-1 notification-error">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Tên đăng nhập</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" placeholder="vd: hpl2022" value="{{old('username')}}">
                            @if ($errors->has('username'))
                                <div class="mt-1 notification-error">
                                    {{$errors->first('username')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" placeholder="vd: hpl2022@haiphatland.com.vn" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <div class="mt-1 notification-error">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="vd: 0989 888 999" value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                                <div class="mt-1 notification-error">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary me-2">Lưu</button>
                        <a href="{{route('users.index')}}" class="btn btn-dark">Quay lại</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Hình ảnh</h4>
                <hr>
            </div>
        </div>
    </div>

</div>

