@if (Session::has('error'))
<div id="successAlert" class="alert alert-danger">
    {{Session::get('error')}}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successAlert = document.getElementById('successAlert');

        if (successAlert) {
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 4000);
        }
    });
</script>
@endif