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
                        <input type="text" class="form-control" id="name" required placeholder="" name="name"
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
                <input type="hidden" name="list_id_remove_pages" class="list_id_remove_pages">
                <div class="row mt-4 list-pages">
                    @if(isset($image_pages) && count($image_pages) > 0)
                    <input type="hidden" class="stt" value="{{count($image_pages)}}">
                    @foreach($image_pages as $page)
                    <div class="col-md-4 mb-4 one-page position-relative">
                        <input type="hidden" name="list_pages[{{$page['id']}}][id]" value="{{$page['id']}}">
                        <a href="javascript:;" class="position-absolute remove-one-page" data-id="{{$page['id']}}" style="right: 14px; top: 1px; background: #f1f1f1; width: 25px; text-align: center; color: red; border-bottom-left-radius: 4px;">
                            <i class="mdi mdi-delete btn-icon-prepend"></i>
                        </a>
                        <div style="margin: 0 1px; border: 1px solid;padding: 10px; border-radius: 4px">
                            <div class="form-group">
                                <label for="">Page</label>
                                <div>
                                    <input type="text" class="form-control" name="list_pages[{{$page['id']}}][page]" value="{{$page['page']}}">
                                </div>
                            </div>
                            <div class="upload_image" data-name="icon-0">
                                <input type="hidden" class="icon-0" name="list_pages[{{$page['id']}}][url]"
                                       value="{{$page['url']}}">
                                <img src="{{$page['url'] ? $page['url'] : '/assets/images/department.jpg'}}" width="100%" alt="img"
                                     class="image-icon-0">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <input type="hidden" class="stt" value="1">
                        <div class="col-md-4 mb-4 one-page position-relative">
                            <a href="javascript:;" class="position-absolute remove-one-page" data-id="0" style="right: 14px; top: 1px; background: #f1f1f1; width: 25px; text-align: center; color: red; border-bottom-left-radius: 4px;">
                                <i class="mdi mdi-delete btn-icon-prepend"></i>
                            </a>
                            <div style="margin: 0 1px; border: 1px solid;padding: 10px; border-radius: 4px">
                                <div class="form-group">
                                    <label for="">Page</label>
                                    <div>
                                        <input type="text" class="form-control" name="list_pages[0][page]" >
                                    </div>
                                </div>
                                <div class="upload_image" data-name="icon-0">
                                    <input type="hidden" class="icon-0" name="list_pages[0][url]"
                                           value="">
                                    <img src="/assets/images/department.jpg" width="100%" alt="img"
                                         class="image-icon-0">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <button class="btn btn-success" type="button" onclick="addPage()">Thêm mới</button>
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
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Ảnh đại diện</h5>
                <hr>
                <div class="form-group">
                    <div class="upload_image" data-name="avatar">
                        <input type="hidden" class="avatar" name="avatar" value="{{old('avatar', $journal['avatar'])}}">
                        <img
                            src="{{$journal['avatar'] ? old('avatar', $journal['avatar']) : old('avatar', '/assets/images/department.jpg')}}"
                            width="180px" alt="" class="image-avatar">
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
<style>
    #name-error{
        padding-top: 10px;
        color: red;
        font-style: italic;
    }
    }
</style>
@push('scripts')
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <script>
        function addPage(){
            let stt = $('.stt').val();
            let html = `
                <div class="col-md-4 mb-4 one-page position-relative">
                    <a href="javascript:;" class="position-absolute remove-one-page" data-id="0" style="right: 14px; top: 1px; background: #f1f1f1; width: 25px; text-align: center; color: red; border-bottom-left-radius: 4px;">
                        <i class="mdi mdi-delete btn-icon-prepend"></i>
                    </a>
                    <div style="margin: 0 1px; border: 1px solid;padding: 10px; border-radius: 4px">
                        <div class="form-group">
                            <label for="">Page</label>
                            <div>
                                <input type="text" class="form-control" name="list_pages[${stt}][page]" >
                            </div>
                        </div>
                        <div class="upload_image" onclick="addImage(${stt})" data-name="icon-${stt}">
                            <input type="hidden" class="icon-${stt}" name="list_pages[${stt}][url]" value="">
                            <img class="image-icon-${stt}" src="/assets/images/department.jpg" width="100%" alt="image">
                        </div>
                    </div>
                </div>
            `;
            $('.stt').val(parseInt(stt) + 1);
            $('.list-pages').append(html);
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
        jQuery(document).on('click', '.remove-one-page', function (e) {
            let r = confirm('Bạn có muốn xóa cái này')
            if(r){
                var id_page = $(this).data("id");
                var list_id_remove_pages = $('.list_id_remove_pages').val();
                if(id_page > 0){
                    if(!list_id_remove_pages){
                        $('.list_id_remove_pages').val(id_page)
                    }else{
                        $('.list_id_remove_pages').val(list_id_remove_pages+','+id_page)
                    }
                }
                var $this = jQuery(this);
                var $parent = $this.parent('.one-page');
                $parent.remove();
            }
        });
        $(document).ready(function() {
            //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
            $("#journal-form").validate({
                rules: {
                    name: "required",
                    avatar: "required",
                },
                messages: {
                    name: "Tên không được để trống",
                    avatar: "Ảnh đại diện không được để trống",
                }
            });
        });
    </script>
@endpush
