<div class="row">
    <div class="col-md-7 col-xxl-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin chung</h5>
                <hr>
                <input type="hidden" name="lang" value="{{$lang}}">
                <input type="hidden" name="parent_lang" value="{{$parent_lang}}">
                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Tên dự án <span
                            class="text-danger">(*)</span></label>
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
                    <label for="parent_id" class="col-sm-3 col-form-label">Loại hình dự án</label>
                    <div class="col-sm-9">
                        <select name="category_id" id="category_id" class="form-control">
                            @php \App\Helpers\FunctionHelpers::showCategorySelect($categories,  $project['category_id']) @endphp
                        </select>

                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="status_project_id" class="col-sm-3 col-form-label">Trạng thái</label>
                    <div class="col-sm-9">
                        <select name="status_project_id" id="status_project_id" class="form-control">
                            <option value="">--Chọn--</option>
                            @foreach($statusProjects as $statusProject)
                                <option
                                    {{$statusProject['id'] == old('status_project_id', $project['status_project_id']) ? 'selected="selected"' : ''}} value="{{$statusProject['id']}}">{{$statusProject['name']}}</option>
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
                        <img width="30px"
                             src="{{$lang == 'en' ? '/assets/images/English.png' : '/assets/images/vietnam.png'}}"
                             alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Thông tin liên hệ</h5>
                <hr>
                <div class="form-group row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label">Số điện thoại </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="" name="phone"
                               value="{{old('phone', $project['phone'])}}">
                        @if ($errors->has('phone'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('phone')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email </label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" placeholder="" name="email"
                               value="{{old('email', $project['email'])}}">
                        @if ($errors->has('email'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="province" class="col-sm-3 col-form-label">Khu vực </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="province" placeholder="" name="province"
                               value="{{old('province', $project['province'])}}">
                        @if ($errors->has('province'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('province')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label">Vị trí </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" placeholder="" name="address"
                               value="{{old('address', $project['address'])}}">
                        @if ($errors->has('address'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('address')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Thông tin dự án</h5>
                <hr>
                <div class="form-group row mb-3">
                    <label for="investor_id" class="col-sm-3 col-form-label">Chủ đầu tư </label>
                    <div class="col-sm-9">
                        <select name="investor_id" id="investor_id" class="form-control">
                            <option value="">--Chọn--</option>
                            @foreach($investors as $investor)
                                <option
                                    {{$investor['id'] == old('investor_id', $project['investor_id']) ? 'selected="selected"' : ''}} value="{{$investor['id']}}">{{$investor['name_company']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('investor_id'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('investor_id')}}
                            </div>
                        @endif
                    </div>
                </div>
{{--                <div class="form-group row mb-3">--}}
{{--                    <label for="manager_id" class="col-sm-3 col-form-label">Quản lý dự án</label>--}}
{{--                    <div class="col-sm-9">--}}
{{--                        <select name="manager_id" id="manager_id" class="form-control">--}}
{{--                            <option value="">--Chọn--</option>--}}
{{--                            @foreach($managers as $manager)--}}
{{--                                <option value="{{$manager['id']}}">{{$manager['fullname']}} - {{$manager['position']}}--}}
{{--                                    - {{$manager['phone']}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}

{{--                    </div>--}}
{{--                </div>--}}
                <div class="form-group row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label">Quy mô dự án </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="" name="quy_mo"
                               value="{{old('quy_mo', $project['quy_mo'])}}">
                        @if ($errors->has('quy_mo'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('quy_mo')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label">Tin dự án</label>
                    <div class="col-sm-9">
                        @if(isset($list_news))
                            <select class="js-example-basic-multiple select2-hidden-accessible" multiple=""
                                    name="list_news[]"
                                    style="width:100%" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                @foreach($news as $post)
                                    <option
                                        {{ (in_array($post['id'], $list_news)) ? 'selected' : '' }} value="{{$post['id']}}">{{$post['name']}}</option>
                                @endforeach
                            </select>
                        @else
                            <select class="js-example-basic-multiple select2-hidden-accessible" multiple=""
                                    name="list_news[]"
                                    style="width:100%" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                @foreach($news as $post)
                                    <option
                                        {{ (collect(old('list_news'))->contains($post['id'])) ? 'selected':'' }} value="{{$post['id']}}">{{$post['name']}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label">Mô tả</label>
                    <div class="col-sm-9">
                        <textarea rows="9" cols="70" id="description" class="form-control"
                                  name="description">{!! $project['description'] !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body" style="padding: 1rem 1rem!important;">
                <ul class="nav nav-tabs tab-custom" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab"
                           aria-controls="overview" aria-selected="false">Tổng quan dự án</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="design-tab" data-bs-toggle="tab" href="#design" role="tab"
                           aria-controls="design" aria-selected="true">Thiết kế dự án</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sale-tab" data-bs-toggle="tab" href="#sale" role="tab"
                           aria-controls="sale" aria-selected="true">Chính sách bán hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="video-tab" data-bs-toggle="tab" href="#video" role="tab"
                           aria-controls="video" aria-selected="true">Video</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <input type="hidden" name="list_id_remove_project_details" class="list_id_remove_project_details">
                        @if(isset($news_projects) && count($news_projects)>0)
                            <input type="hidden" class="stt" value="{{count($news_projects)}}">
                            <div class="overview">
                                @foreach($news_projects as $key => $value)
                                    <div class="overview-one position-relative">
                                        <input type="hidden" name="news_projects[0][id]" value="{{$value['id']}}">
                                        <div class="form-group row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="phone" placeholder=""
                                                       name="news_projects[0][title]"
                                                       value="{{$value['title']}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Icon</label>
                                            <div class="col-sm-10">
                                                <div class="upload_image" data-name="icon-0">
                                                    <input type="hidden" class="icon-0" name="news_projects[0][icon]"
                                                           value="{{$value['icon']}}">
                                                    <img src="{{$value['icon']}}" width="80px" alt=""
                                                         class="image-icon-0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <textarea rows="9" cols="70" id="content" class="form-control content"
                                                          name="news_projects[0][content]">{!! $value['content'] !!}</textarea>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-danger remove-overview-one" data-id="{{$value['id']}}"><i class="mdi mdi-delete"></i> Xóa</button>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <input type="hidden" class="stt" value="1">
                            <div class="overview">
                                <div class="overview-one">
                                    <input type="hidden" name="news_projects[0][id]" value="0">
                                    <div class="form-group row mb-3">
                                        <label for="phone" class="col-sm-2 col-form-label">Tiêu đề</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" placeholder=""
                                                   name="news_projects[0][title]"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="" class="col-sm-2 col-form-label">Icon</label>
                                        <div class="col-sm-10">
                                            <div class="upload_image" data-name="icon-0">
                                                <input type="hidden" class="icon-0" name="news_projects[0][icon]"
                                                       value="">
                                                <img src="/assets/images/department.jpg" width="80px" alt=""
                                                     class="image-icon-0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="phone" class="col-sm-2 col-form-label">Nội dung</label>
                                        <div class="col-sm-10">
                                    <textarea rows="9" cols="70" id="content" class="form-control content"
                                              name="news_projects[0][content]"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger remove-overview-one" data-id="0"><i class="mdi mdi-delete"></i> Xóa</button>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        <div class="text-center">
                            <button class="btn btn-success" type="button" onclick="addForm()">Thêm</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="design" role="tabpanel" aria-labelledby="design-tab">
                        <div class="form-group row mb-3">
                            <div class="col-sm-12">
                                  <textarea rows="9" cols="70" class="form-control content"
                                            name="design">{!! old('design', $project['design']) !!}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="sale" role="tabpanel" aria-labelledby="sale-tab">
                        <div class="col-sm-12">
                                  <textarea rows="9" cols="70" class="form-control content"
                                            name="sales_policy">{!! old('sales_policy', $project['sales_policy']) !!}</textarea>

                        </div>
                    </div>
                    <div class="tab-pane fade " id="video" role="tabpanel" aria-labelledby="video-tab">
                        <div class="col-sm-12">
                                  <textarea rows="9" cols="70" class="form-control content"
                                            name="list_video">{!! old('list_video', $project['list_video']) !!}</textarea>

                        </div>
                    </div>
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
                        <input type="checkbox" class="form-check-input"
                               {{$project['display_home'] ? "checked" : ''}} value="{{$project['display_home']}}"
                               name="display_home"> Hiển thị trang chủ <i class="input-helper"></i></label>
                </div>
                <div class="form-check form-check-flat form-check-primary mb-1">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"
                               {{$project['tien_phong'] ? "checked" : ''}} value="{{$project['tien_phong']}}"
                               name="tien_phong"> Tiên phong <i class="input-helper"></i></label>
                </div>
                <div class="form-check form-check-flat form-check-primary mb-1">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"
                               {{$project['tieu_bieu'] ? "checked" : ''}} value="{{$project['tieu_bieu']}}"
                               name="tieu_bieu"> Tiêu biểu <i class="input-helper"></i></label>
                </div>
                <div class="form-check form-check-flat form-check-primary mb-4">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"
                               {{$project['status'] ? "checked" : ''}} value="{{$project['status']}}" name="status">
                        Trạng thái <i class="input-helper"></i></label>
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
                        <input type="hidden" class="avatar" name="avatar" value="{{old('avatar', $project['avatar'])}}">
                        <img
                            src="{{$project['avatar'] ? old('avatar', $project['avatar']) : old('avatar', '/assets/images/department.jpg')}}"
                            width="180px" alt="" class="image-avatar">
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
                        <input type="hidden" class="cover" name="cover" value="{{old('cover', $project['cover'])}}">
                        <img
                            src="{{$project['cover'] ? old('cover', $project['cover']) : old('cover', '/assets/images/department.jpg')}}"
                            width="180px" alt="" class="image-cover">
                    </div>
                    @if ($errors->has('cover'))
                        <div class="mt-1 notification-error">
                            {{$errors->first('cover')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="video">Link video hiển thị trang chủ</label>
                    <input type="text" class="form-control" id="video" placeholder="video"
                           value="{{$project['video']}}">
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function addForm() {
            let stt = $('.stt').val();
            let html = `
                <div class='overview-one'>
                    <input type="hidden" name="pro[${stt}][id]" value="0">
                    <div class="form-group row mb-3">
                        <label for="phone" class="col-sm-2 col-form-label">Tiêu đề</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="" name="news_projects[${stt}][title]"
                            value="">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                             <div class="upload_image" onclick="addImage(${stt})" data-name="icon-${stt}">
                                <input type="hidden" class="icon-${stt}" name="news_projects[${stt}][icon]" value="">
                                <img src="/assets/images/department.jpg" width="80px" alt="" class="image-icon-${stt}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="phone" class="col-sm-2 col-form-label">Nội dung</label>
                        <div class="col-sm-10">
                                  <textarea rows="9" cols="70" class="form-control content-${stt}"
                                            name="news_projects[${stt}][content]"></textarea>

                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-danger remove-overview-one" data-id="0"><i class="mdi mdi-delete"></i> Xóa</button>
                    <hr>
                <div>
            `;

            $('.stt').val(parseInt(stt) + 1);
            $('.overview').append(html);
            CKEDITOR.replaceAll('content-' + stt, {
                filebrowserBrowseUrl: '{{route('ckfinder_browser')}}'
            })
        }

        function addImage(stt) {
            const domain = window.location.protocol + '//' + window.location.host;
            CKFinder.popup({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files.first();
                        const source = file.getUrl().replace(domain, "");
                        $('.icon-' + stt).val(source);
                        $(".image-icon-" + stt).attr("src", source);
                        finder.request('closePopup');

                    });
                }
            });
        }
        jQuery(document).on('click', '.remove-overview-one', function (e) {
            let r = confirm('Bạn có muốn xóa cái này')
            if(r){
                var id_project_detail = $(this).data("id");
                var list_id_remove_project_details = $('.list_id_remove_project_details').val();
                if(id_project_detail > 0){
                    if(!list_id_remove_project_details){
                        $('.list_id_remove_project_details').val(id_project_detail)
                    }else{
                        $('.list_id_remove_project_details').val(list_id_remove_project_details+','+id_project_detail)
                    }
                }
                var $this = jQuery(this);
                var $parent = $this.parent('.overview-one');
                $parent.remove();
            }
        });
    </script>
@endpush
