<style>
    .toast-message {
        font-size: 14px;
    }
</style>
<script>
    toastr.options.escapeHtml = true;
    toastr.options.closeButton = false;
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.closeDuration = 1000;
    toastr.options.closeEasing = 'swing';
    toastr.options.newestOnTop = false;
    toastr.options.progressBar = true;
    toastr.options.ltr = true;
</script>

@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>
@endif
@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}")
    </script>
@endif
@if (session('info'))
    <script>
        toastr.info("{{ session('info') }}")
    </script>
@endif
@if (session('warning'))
    <script>
        toastr.warning("{{ session('warning') }}")
    </script>
@endif
