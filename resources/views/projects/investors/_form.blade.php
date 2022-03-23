<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin chung</h5>
                <hr>
                <input type="hidden" name="lang" value="{{$lang}}">
                <input type="hidden" name="parent_lang" value="{{$parent_lang}}">
                <div class="form-group row mb-3">
                    <label for="name_company" class="col-sm-3 col-form-label">Tên công ty</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name_company" placeholder="" name="name_company"
                               value="{{old('name_company', $investor['name_company'])}}">
                        @if ($errors->has('name_company'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('name_company')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="" name="phone"
                               value="{{old('phone', $investor['phone'])}}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="fax" class="col-sm-3 col-form-label">Máy FAX</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fax" placeholder="" name="fax"
                               value="{{old('fax', $investor['fax'])}}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" placeholder="" name="email"
                               value="{{old('email', $investor['email'])}}">

                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" placeholder="" name="address"
                               value="{{old('address', $investor['address'])}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Mô tả</h5>
                <hr>
                <div class="form-group">
                    <textarea id="content" class="form-control"
                              name="description">{!! $investor['description'] !!}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chức năng</h5>
                <hr>

                <div class="form-check form-check-flat form-check-primary mb-4">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$investor['status'] ? "checked" : ''}} value="{{$investor['status']}}" name="status"> Kích hoạt <i class="input-helper"></i></label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2" name="submit" value="save&exit">Lưu và Thoát</button>
                    <button type="submit" class="btn btn-danger me-2" name="submit" value="save&continue">Lưu và Tiếp tục</button>
                    <a href="{{route('investors.index')}}" class="btn btn-dark mt-4">Quay lại</a>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Ảnh đại diện</h5>
                <hr>
                <div class="form-group">
                    <div class="upload_image" data-name="avatar">
                        <input type="hidden" class="avatar" name="avatar" value="">
                        <img src="/assets/images/department.jpg" width="180px" alt="" class="image-avatar">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
