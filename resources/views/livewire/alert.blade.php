<div>
    @if ($message)
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" aria-label="Close" @click="show = false"></button>
        </div>
    @endif
</div>
