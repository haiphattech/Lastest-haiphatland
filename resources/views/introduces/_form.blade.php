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
                    <label for="parent_id" class="col-sm-3 col-form-label">Danh mục</label>
                    <div class="col-sm-9">
                        <select name="category_id" id="category_id" class="form-control">
                            @php \App\Helpers\FunctionHelpers::showCategorySelect($categories,  $introduce['category_id']) @endphp
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('category_id')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="title_font" class="col-sm-3 col-form-label">Tiêu đề font</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title_font" placeholder="" name="title_font"
                               value="{{old('title_font', $introduce['title_font'])}}">
                        @if ($errors->has('title_font'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('title_font')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="title" class="col-sm-3 col-form-label">Tiêu đề</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" placeholder="" name="title"
                               value="{{old('title', $introduce['title'])}}">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="serial" class="col-sm-3 col-form-label">Thứ tự</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="serial" placeholder="" name="serial"
                               value="{{old('serial', $introduce['serial'])}}">
                        @if ($errors->has('serial'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('serial')}}
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
                    <textarea  rows="9" cols="70" id="description" class="form-control"
                               name="description">{!! $introduce['description'] !!}</textarea>

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
                        <input type="checkbox" class="form-check-input" {{$introduce['status'] ? "checked" : ''}} value="{{$introduce['status']}}" name="status"> Trạng thái <i class="input-helper"></i></label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2" value="save&exit">Lưu</button>
                    <a href="{{route('introduces.index')}}" class="btn btn-dark">Quay lại</a>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Ảnh đại diện</h5>
                <hr>
                <div class="form-group">
                    <div class="upload_image" data-name="avatar">
                        <input type="hidden" class="avatar" name="avatar" value="{{old('avatar', $introduce['avatar'])}}">
                        <img src="{{$introduce['avatar'] ? old('avatar', $introduce['avatar']) : old('avatar', '/assets/images/department.jpg')}}" width="180px" alt="" class="image-avatar">
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
