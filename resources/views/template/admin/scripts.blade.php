<!-- plugins:js -->
<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('assets/admin/js/off-canvas.js')}}"></script>
<script src="{{ asset('assets/admin/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('assets/admin/js/misc.js')}}"></script>
<script src="{{ asset('assets/admin/js/settings.js')}}"></script>
<script src="{{ asset('assets/admin/js/todolist.js')}}"></script>
<script src="{{ asset('assets/admin/js/data-table.js')}}"></script>
<script src="{{ asset('assets/admin/js/formpickers.js')}}"></script>
<script src="{{ asset('assets/admin/js/form-repeater.js')}}"></script>
<script src="{{ asset('assets/admin/js/tooltips.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/editorDemo.js')}}"></script>
{{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>  --}}
<!-- endinject -->

<script src="{{ asset('assets/admin/vendors/tinymce/tinymce.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.texteditor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };
  editor_config.height = 500;

  tinymce.init(editor_config);
</script>

