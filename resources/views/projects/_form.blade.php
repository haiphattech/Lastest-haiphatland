<div class="row">
    <div class="col-md-7 col-xxl-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin chung</h5>
                <hr>
                <input type="hidden" name="lang" value="{{$lang}}">
                <input type="hidden" name="parent_lang" value="{{$parent_lang}}">
                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Tên dự án</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="" name="name"
                               value="{{old('name', $project['name'])}}">
                        @if ($errors->has('name'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="parent_id" class="col-sm-3 col-form-label">Danh mục</label>
                    <div class="col-sm-9">
                        <select name="category_id" id="category_id" class="form-control">
                            @php \App\Helpers\FunctionHelpers::showCategorySelect($categories,  $project['category_id']) @endphp
                        </select>
                        @if ($errors->has('parent_id'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('parent_id')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="status_project_id" class="col-sm-3 col-form-label">Trạng thái</label>
                    <div class="col-sm-9">
                        <select name="status_project_id" id="status_project_id" class="form-control">
                            <option value="">--Chọn--</option>
                            @foreach($statusProjects as $statusProject)
                                <option value="{{$statusProject['id']}}">{{$statusProject['name']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('status_project_id'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('status_project_id')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="parent_id" class="col-sm-3 col-form-label">Ngôn ngữ</label>
                    <div class="col-sm-9">
                        <img width="30px" src="{{$lang == 'en' ? '/assets/images/English.png' : '/assets/images/vietnam.png'}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Thông tin liên hệ</h5>
                <hr>
                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Số điện thoại</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" placeholder="" name=""
                               value="{{old('name_company', $project['name'])}}">

                    </div>
                </div>

            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Mô tả</h5>
                <hr>
                <div class="form-group">
                    <textarea  rows="9" cols="70" id="description" class="form-control"
                              name="description">{!! $project['description'] !!}</textarea>
                    @if ($errors->has('description'))
                        <div class="mt-1 notification-error">
                            {{$errors->first('description')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xxl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chức năng</h5>
                <hr>
                <div class="form-check form-check-flat form-check-primary mb-1">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$project['display_home'] ? "checked" : ''}} value="{{$project['display_home']}}" name="display_home"> Hiển thị trang chủ <i class="input-helper"></i></label>
                </div>
                <div class="form-check form-check-flat form-check-primary mb-1">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$project['tien_phong'] ? "checked" : ''}} value="{{$project['tien_phong']}}" name="tien_phong"> Tiên phong <i class="input-helper"></i></label>
                </div>
                <div class="form-check form-check-flat form-check-primary mb-1">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$project['tieu_bieu'] ? "checked" : ''}} value="{{$project['tieu_bieu']}}" name="tieu_bieu"> Tiêu biểu <i class="input-helper"></i></label>
                </div>
                <div class="form-check form-check-flat form-check-primary mb-4">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$project['status'] ? "checked" : ''}} value="{{$project['status']}}" name="status"> Trạng thái <i class="input-helper"></i></label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2" value="save&exit">Lưu</button>
                    <a href="{{route('projects.index')}}" class="btn btn-dark">Quay lại</a>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Media</h5>
                <hr>
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <div class="upload_image" data-name="avatar">
                        <input type="hidden" class="avatar" name="avatar" value="">
                        <img src="/assets/images/department.jpg" width="180px" alt="" class="image-avatar">
                    </div>
                    @if ($errors->has('avatar'))
                        <div class="mt-1 notification-error">
                            {{$errors->first('avatar')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Ảnh bìa</label>
                    <div class="upload_image" data-name="cover">
                        <input type="hidden" class="cover" name="cover" value="">
                        <img src="/assets/images/department.jpg" width="180px" alt="" class="image-cover">
                    </div>
                    @if ($errors->has('cover'))
                        <div class="mt-1 notification-error">
                            {{$errors->first('cover')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="video">Link video hiển thị trang chủ</label>
                    <input type="text" class="form-control" id="video" placeholder="video" value="{{$project['video']}}">
                </div>
            </div>
        </div>
    </div>
</div>
