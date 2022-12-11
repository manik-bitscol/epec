<script>
    $("#{{ $id }}").change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $("#{{ $preview }}").attr('src', ImgSource)
        }
    })
</script>
