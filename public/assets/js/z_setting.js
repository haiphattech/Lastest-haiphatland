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
    if(!confirm("Do you really want to do this?")) {
        return false;
    }
    this.form.submit();
}
setTimeout(function() {
    $('.notification-submit').fadeOut('fast');
}, 5000); // <-- time in milliseconds
// Crop-image
$(document).ready(function () {
    var height = $('.height_image').val();
    var width = $('.with_image').val();
    if(width)
        $('.modal-lg').css('max-width', '1300px');

    let $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            height: height ? height : 450,
            width: width ? width : 450,
            type: 'square' //circle
        },
        boundary: {
            width: width ? 1200 : 500,
            height: 500
        }
    });
    $('.upload_image').on('change', function () {
        $('.stt').val($(this).data('id'));
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function (event) {
        let stt = $('.stt').val();
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            $('#uploadimageModal').modal('hide');
            $('.image-value-' + stt).val(response);
            $('.image-' + stt).attr('src', response);
            $('.remove-'+stt).css('display', 'block');
        })
    });

    $('.delete-permission').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Bạn có muốn xóa quyền của người này?",
            text: "Sau khi xóa, bạn sẽ không thể khôi phục tệp tin này!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "/admin/roles/delete",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data) {
                            swal("Thành công! Dữ liệu đã được xóa an toàn!", {
                                icon: "success",
                            });
                            window.location.reload();
                        }else{
                            swal("Dữ liệu được chọn tạm thời không xóa được!");
                        }
                    }
                });
            }
        });
    });
    $('.delete-record').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Bạn có muốn thực hiện thao tác này?",
            text: "Sau khi xóa, bạn sẽ không thể khôi phục tệp tin này!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: $(this).data('api'),
                        data: {
                            id: $(this).data('id'),
                            table: $(this).data('table'),
                            column: $(this).data('column'),
                            _token: $('meta[name="csrf-token"]').attr('content')

                        },
                        success: function (res) {
                            console.log(res);
                            if (res) {
                                window.location.reload();
                            }else{
                                swal("Dữ liệu được chọn tạm thời không xóa được!");
                            }
                        }
                    });
                }
            });
    });
    $('.remove-image').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        let id_delete = $('.image_delete').val();
        let r = confirm('Bạn có muốn xóa ảnh này')
        if(r){
            $('.image-'+id).attr('src','/back-end/images/department.jpg');
            $('.remove-'+id).css('display', 'none');
            $('.image-value-'+id).val('');

            if(!id_delete){
                id_delete = id;
                $('.image_delete').val(id_delete)
            }else{
                id_delete = id_delete+','+id;
                $('.image_delete').val(id_delete)
            }
        }
    });
    $('.upload_image_general').change(function(){
        let id = $(this).data('id');
        readURL(this, id);
    });
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.image-'+id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
});

function dataURLtoFile(dataurl, filename) {

    var arr = dataurl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }

    return new File([u8arr], filename, {type: mime});
}
