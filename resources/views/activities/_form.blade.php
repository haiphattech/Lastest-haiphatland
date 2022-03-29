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
                    <label for="name" class="col-sm-3 col-form-label">Tên dự án</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="" name="name"
                               value="{{old('name_company', $activity['name'])}}">
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
                            @php \App\Helpers\FunctionHelpers::showCategorySelect($categories,  $activity['category_id']) @endphp
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('parent_id')}}
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
                <h5 class="card-title">Mô tả</h5>
                <hr>
                <div class="form-group">
                    <textarea  rows="9" cols="70" id="content" class="form-control"
                              name="description">{!! $activity['description'] !!}</textarea>
                    @if ($errors->has('description'))
                        <div class="mt-1 notification-error">
                            {{$errors->first('description')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chức năng</h5>
                <hr>
                <div class="form-check form-check-flat form-check-primary mb-1">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$activity['display_home'] ? "checked" : ''}} value="{{$activity['display_home']}}" name="display_home"> Hiển thị trang chủ <i class="input-helper"></i></label>
                </div>
                <div class="form-check form-check-flat form-check-primary mb-4">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$activity['status'] ? "checked" : ''}} value="{{$activity['status']}}" name="status"> Trạng thái <i class="input-helper"></i></label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2" value="save&exit">Lưu</button>
                    <a href="{{route('activities.index')}}" class="btn btn-dark">Quay lại</a>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Ảnh đại diện</h5>
                <hr>
                <div class="form-group">
                    <div class="upload_image" data-name="avatar">
                        <input type="hidden" class="avatar" name="avatar" value="{{$activity['avatar']}}">
                        <img src="{{$activity['avatar'] ? $activity['avatar'] : '/assets/images/department.jpg' }}" width="180px" alt="" class="image-avatar">
                    </div>
                    @if ($errors->has('avatar'))
                        <div class="mt-1 notification-error">
                            {{$errors->first('avatar')}}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
