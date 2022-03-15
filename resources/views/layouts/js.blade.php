<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script src="{{asset('assets/js/settings.js')}}"></script>
<script src="{{asset('assets/js/todolist.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/notify.min.js')}}"></script>
<script src="{{asset('assets/js/z_setting.js')}}"></script>
@stack('scripts')
<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('content', {
        filebrowserBrowseUrl: '{{route('ckfinder_browser')}}'
    })
    CKEDITOR.on('content', function(e) {
        e.editor.addCss( 'body { background-color: red; }' );
    });
</script>
@include('ckfinder::setup')
