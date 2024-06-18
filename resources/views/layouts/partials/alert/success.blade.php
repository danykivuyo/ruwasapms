@if (Session::has('success'))
<div id="successAlert" class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successAlert = document.getElementById('successAlert');

        if (successAlert) {
            setTimeout(function() {
                if (successAlert) {
                    successAlert.style.display = 'none';
                }
            }, 4000);
        }
    });
</script>
@endif
