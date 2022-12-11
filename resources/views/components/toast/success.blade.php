 <script type="text/javascript">
     @if (session()->has('success'))

         $(document).Toasts('create', {
             class: 'bg-success',
             title: '{{ session('success') }}',
             autohide: true,
             delay: 1000,
             icon: 'fas fa-check fa-lg',
         })
     @endif
 </script>
