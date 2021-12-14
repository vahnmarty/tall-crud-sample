<script>
    Livewire.on('sweetalert2', param => {
        Swal.fire(
            param['title'] ?? '',
            param['message'],
            param['type']
        )
    });
</script>