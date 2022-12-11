<script src="{{ asset('assets/backend/plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "#{{ $selector }}",
        images_upload_url: "{{ route('tinymce.image.upload') }}",
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'print', 'preview', 'hr', 'media',
            'anchor', 'pagebreak ', 'wordcount', 'code', 'fullscreen',
            'save', 'table', 'contextmenu', 'directionality', 'emoticons', 'template', 'paste', 'textcolor'
        ],
        toolbar: [
            'formatselect | fontsizeselect | bold | italic | underline |  bullist | numlist | alignleft | aligncenter | alignright | alignjustify  | blockquote | link | unlink |image | table |  forecolor | removeformat | charmap | copy | cut | paste | liquickimageneheight | redo | undo | spellchecker | imageoptions | code',
        ],
        height: 500,
        branding: false,
        menubar: false,
        image_class_list: [{
            title: 'Responsive',
            value: 'img-responsive'
        }],
        mobile: {
            resize: true
        }
    });
</script>
