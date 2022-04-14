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
                    <label for="name" class="col-sm-3 col-form-label">Tên</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="" name="name"
                               value="{{old('name', $journal['name'])}}">
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
                            @php \App\Helpers\FunctionHelpers::showCategorySelect($categories,  $journal['category_id']) @endphp
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('category_id')}}
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
                <h5 class="card-title">Hình ảnh</h5>
                <hr>
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
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chức năng</h5>
                <hr>

                <div class="form-check form-check-flat form-check-primary mb-4">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" {{$journal['status'] ? "checked" : ''}} value="{{$journal['status']}}" name="status"> Trạng thái <i class="input-helper"></i></label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2" value="save&exit">Lưu</button>
                    <a href="{{route('journals.index')}}" class="btn btn-dark">Quay lại</a>
                </div>
            </div>
        </div>

        </div>
</div>
