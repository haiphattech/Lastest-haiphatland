<div class="row">
    <div class="col-md-8 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin chung</h5>
                <hr>
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tên danh mục</label>
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
                        <label for="username" class="col-sm-3 col-form-label">Thể loại</label>
                        <div class="col-sm-9">
                            <select name="" id="" class="form-control">
                                <option value="">Chọn</option>
                            </select>
                            @if ($errors->has('username'))
                                <div class="mt-1 notification-error">
                                    {{$errors->first('username')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Danh mục cha</label>
                        <div class="col-sm-9">
                            <select name="" id="" class="form-control">
                                <option value="">Chọn</option>
                            </select>
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
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Mô tả</h5>
                <hr>
                <div class="form-group">
                    <textarea id="content"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hình ảnh</h5>
                <hr>
            </div>
        </div>
    </div>

</div>

