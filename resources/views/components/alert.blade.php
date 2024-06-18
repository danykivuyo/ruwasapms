@if (Session::has('success'))
<div id="successAlert" class="alert alert-primary">
    {{Session::get('success')}}
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