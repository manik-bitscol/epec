<script type="text/javascript">
    $(document).on('click', '.delete-form', function(e) {

        e.preventDefault();

        let form = $(this).closest('form');
        Swal.fire({
            title: "Are your sure want to delete this page !",
            text: 'Once deleted, you will not be able to recover',
            icon: 'warning',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Delete',
            denyButtonText: `Don't Delete`,
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                form.submit();
            } else {
                Swal.fire('Your Data is safe', '', 'info')
            }
        });
    });
</script>
