<script type="text/javascript">
    @if (session()->has('error'))

        $(document).Toasts('create', {
            class: 'bg-error',
            title: '{{ session('error') }}',
            autohide: true,
            delay: 1000,
            icon: 'fas fa-times fa-lg',
        })
    @endif
</script>
