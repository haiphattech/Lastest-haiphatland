<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin chung</h5>
                <hr>
                <div>
                    <input type="hidden" name="lang" value="{{$lang}}">
                    <input type="hidden" name="parent_lang" value="{{$category_parent_lang}}">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tên danh mục</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="Tin tức, Tuyển dụng,..." value="{{old('name', $category['name'])}}">
                            @if ($errors->has('name'))
                                <div class="mt-1 notification-error">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="parent_id" class="col-sm-3 col-form-label">Danh mục cha</label>
                        <div class="col-sm-9">
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">--ROOT--</option>
                                @php \App\Helpers\FunctionHelpers::showCategorySelect($categories,  $category['parent_id']) @endphp
                            </select>
                            @if ($errors->has('parent_id'))
                                <div class="mt-1 notification-error">
                                    {{$errors->first('parent_id')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-sm-3 col-form-label">Thể loại</label>
                        <div class="col-sm-9">
                            <select name="type" id="type" class="form-control">
                                <option value="">Chọn</option>
                                <option {{$category['type'] == 'news' ? 'selected' : ''}} value="news">Tin tức</option>
                                <option {{$category['type'] == 'activities' ? 'selected' : ''}} value="activities">Lĩnh
                                    vực hoạt động
                                </option>
                                <option {{$category['type'] == 'project' ? 'selected' : ''}} value="project">Dự án
                                </option>
                                <option {{$category['type'] == 'system' ? 'selected' : ''}} value="system">Hệ thống
                                    HPL
                                </option>
                                <option {{$category['type'] == 'introduces' ? 'selected' : ''}} value="introduces">Giới
                                    thiệu chung
                                </option>
                                <option {{$category['type'] == 'recruit' ? 'selected' : ''}} value="recruit">Tuyển
                                    dụng
                                </option>
                                <option {{$category['type'] == 'journal' ? 'selected' : ''}} value="journal">Tạp chí
                                </option>
                                <option {{$category['type'] == 'contact' ? 'selected' : ''}} value="contact">Liên hệ
                                </option>
                                <option {{$category['type'] == 'events' ? 'selected' : ''}} value="events">Sự kiện
                                </option>
                            </select>
                            @if ($errors->has('type'))
                                <div class="mt-1 notification-error">
                                    {{$errors->first('type')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Trạng thái</label>
                        <div class="col-sm-9">
                            <div class="form-check" style="margin-top: 5px;">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"
                                           {{isset($category['status']) ? "checked" : ''}} value="{{$category['status']}}"
                                           name="status">
                                    <i class="input-helper"></i>
                                </label>
                            </div>
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
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Hình ảnh</h5>
                <hr>
                <div class="form-group">
                    <label for="firstname">Ảnh bìa</label>
                    <div class="upload_image" data-name="cover">
                        <input type="hidden" class="cover" name="cover" value="{{$category['cover']}}">
                        <img
                            src="{{($category && $category['cover'])  ? $category['cover'] : '/assets/images/department.jpg'}}"
                            width="180px" alt=""
                            class="image-cover">
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="firstname">Ảnh khác</label>
                    <div class="multiple_images row">
                        @if(isset($images) && !empty($images))
                        @foreach($images as $image)
                            <div class="img col-md-2 col-sm-6 col-xs-6">
                                <div class="box-image-show">
                                    <img src="{{$image['url']}}" width="100%" alt="">
                                    <a href="javascript:;" class="remove-image">
                                        <i class="mdi mdi-delete btn-icon-prepend"></i>
                                    </a>
                                    <input type="hidden" name="gallery[]" value="{{$image['url']}}">
                                </div>
                            </div>
                        @endforeach
                        @endif
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <div class="box-image">
                                <i size="40" class="mdi mdi-plus"></i>
                            </div>
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
                    <textarea id="content" class="form-control"
                              name="description">{!! $category['description'] !!}</textarea>
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

