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
                    <label for="name" class="col-sm-3 col-form-label">Tên sự kiện</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="" name="name"
                               value="{{old('name', $event['name'])}}">
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
                            @php \App\Helpers\FunctionHelpers::showCategorySelect($categories,  $event['category_id']) @endphp
                        </select>
                        @if ($errors->has('parent_id'))
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
                <h5 class="card-title">Thông tin sự kiện</h5>
                <hr>
                <div class="form-group row mb-3">
                    <label for="place" class="col-sm-3 col-form-label">Địa điểm</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="place" placeholder="" name="place"
                               value="{{old('place', $event['place'])}}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" placeholder="" name="address"
                               value="{{old('address', $event['address'])}}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="start_time" class="col-sm-3 col-form-label">Thời gian bắt đầu</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" id="start_time" placeholder="" name="start_time"
                               value="{{old('start_time', $event['start_time'] ? date('Y-m-d\TH:i:s', strtotime($event['start_time'])) : $event['start_time'])}}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="end_time" class="col-sm-3 col-form-label">Thời gian kết thúc</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" id="end_time" placeholder="" name="end_time"
                               value="{{old('end_time', $event['start_time'] ? date('Y-m-d\TH:i:s', strtotime($event['end_time'])) : $event['end_time'])}}">
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
                              name="description">{!! $event['description'] !!}</textarea>
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

                <div class="form-check form-check-flat form-check-primary mb-4">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$event['status'] ? "checked" : ''}} value="{{$event['status']}}" name="status"> Trạng thái <i class="input-helper"></i></label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2" value="save&exit">Lưu</button>
                    <a href="{{route('events.index')}}" class="btn btn-dark">Quay lại</a>
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
                        <input type="hidden" class="avatar" name="avatar" value="{{old('avatar', $event['avatar'])}}">
                        <img src="{{$event['avatar'] ? $event['avatar'] : '/assets/images/department.jpg'}}" width="180px" alt="" class="image-avatar">
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
                        <input type="hidden" class="cover" name="cover" value="{{old('avatar', $event['cover'])}}">
                        <img src="{{$event['cover'] ? $event['cover'] : '/assets/images/department.jpg'}}" width="180px" alt="" class="image-cover">
                    </div>
                    @if ($errors->has('cover'))
                        <div class="mt-1 notification-error">
                            {{$errors->first('cover')}}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
