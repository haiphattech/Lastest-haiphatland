<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 grid-margin">
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
                <h5 class="card-title">Hình ảnh</h5>
                <hr>
                <div class="form-group">
                    <label for="firstname">Ảnh bìa</label>
                    <div class="upload_image" data-name="avatar">
                        <input type="hidden" class="avatar" name="avatar">
                        <img src="/assets/images/department.jpg" width="180px" alt=""
                             class="image-avatar">
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname">Ảnh khác</label>
                    <div class="upload_image" data-name="avatar">
                        <input type="hidden" class="avatar" name="avatar">
                        <img src="/assets/images/department.jpg" width="180px" alt=""
                             class="image-avatar">
                    </div>
                    <div class="img col-md-3 col-sm-6 col-xs-6">
                        <span class="thumb choose_image" data-input="gallery[]" data-name="article_images">
                            <img src="/assets/images/image_upload.png">
                        </span>
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

        <div class="card mt-4">
            <div class="card-body text-center">
                <button type="submit" class="btn btn-primary me-2">Lưu</button>
                <a href="{{route('users.index')}}" class="btn btn-dark">Quay lại</a>
            </div>
        </div>
    </div>

</div>

