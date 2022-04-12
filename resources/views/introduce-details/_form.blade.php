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
                    <label for="parent_id" class="col-sm-3 col-form-label">Giới thiệu cha</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{$introduce->title_font}} {{$introduce->title}}">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="title" class="col-sm-3 col-form-label">Tiêu đề</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" placeholder="" name="title"
                               value="{{old('title', $introduceDetail['title'])}}">
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
                               name="description">{!! $introduceDetail['description'] !!}</textarea>

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
                        <input type="checkbox" class="form-check-input" {{$introduceDetail['status'] ? "checked" : ''}} value="{{$introduceDetail['status']}}" name="status"> Trạng thái <i class="input-helper"></i></label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2" value="save&exit">Lưu</button>
                    <a href="{{route('introduce_detail_list', $introduce['id'])}}" class="btn btn-dark">Quay lại</a>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Ảnh đại diện</h5>
                <hr>
                <div class="form-group">
                    <div class="upload_image" data-name="avatar">
                        <input type="hidden" class="avatar" name="avatar" value="{{old('avatar', $introduceDetail['avatar'])}}">
                        <img src="{{$introduceDetail['avatar'] ? old('avatar', $introduceDetail['avatar']) : old('avatar', '/assets/images/department.jpg')}}" width="180px" alt="" class="image-avatar">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
