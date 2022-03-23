$("[name='my-checkbox']").on('change', function () {
    $.ajax({
        url: $(this).data('api'),
        type: 'post',
        data: {
            id: $(this).data('id'),
            table: $(this).data('table'),
            column: $(this).data('column'),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            console.log(response);
            if (response.success) {
                'use strict';
                var notify = $.notify('Chuyển trạng thái thành công', 'success', {
                    type: 'theme',
                    allow_dismiss: true,
                    delay: 30000,
                    showProgressbar: true,
                    timer: 30000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });

            }
        }
    });
});

function show_alert() {
    if (!confirm("Do you really want to do this?")) {
        return false;
    }
    this.form.submit();
}

setTimeout(function () {
    $('.notification-submit').fadeOut('fast');
}, 5000); // <-- time in milliseconds
// Crop-image
$(document).ready(function () {
    $('.upload_image').on('click', function () {
        const name = $(this).attr('data-name');
        const domain = window.location.protocol + '//' + window.location.host;
        CKFinder.popup({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    const source = file.getUrl().replace(domain, "");
                    $('.' + name).val(source);
                    $(".image-" + name).attr("src", source);
                    finder.request('closePopup');

                });
            }
        });
    });

    // $('.remove-image').click(function (e) {
    //     e.preventDefault();
    //     var id = $(this).data('id');
    //     let id_delete = $('.image_delete').val();
    //     let r = confirm('Bạn có muốn xóa ảnh này')
    //     if (r) {
    //         $('.image-' + id).attr('src', '/back-end/images/department.jpg');
    //         $('.remove-' + id).css('display', 'none');
    //         $('.image-value-' + id).val('');
    //
    //         if (!id_delete) {
    //             id_delete = id;
    //             $('.image_delete').val(id_delete)
    //         } else {
    //             id_delete = id_delete + ',' + id;
    //             $('.image_delete').val(id_delete)
    //         }
    //     }
    // });
    $('.upload_image_general').change(function () {
        let id = $(this).data('id');
        readURL(this, id);
    });
    $('.multiple_images').on('click', '.box-image', function (event) {
        const domain = window.location.protocol + '//' + window.location.host;
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    const source = file.getUrl().replace(domain, "");
                    const html = `
                        <div class="img col-md-2 col-sm-6 col-xs-6">
                            <div class="box-image-show">
                                <img src="${source}" width="100%" alt="">
                                <a href="javascript:;" class="remove-image">
                                   <i class="mdi mdi-delete btn-icon-prepend"></i>
                                </a>
                                <input type="hidden" name="gallery[]" value="${source}">
                            </div>
                        </div>
                    `
                    $('.multiple_images').prepend(html);
                    finder.request('closePopup');
                });
            }
        });
    });
    $('.multiple_images').on('click','.remove-image',function(event){
        $(this).closest('.img').remove();
    });
});
