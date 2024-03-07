<div>
    <div class="card-body">
        <h2 class="h2 text-center mb-4">Masuk ke Kindy Care</h2>
        <div class="mb-3">
            <label class="form-label required">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com"
                autocomplete="off" wire:model="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label class="form-label required">
                Password
            </label>
            <div class="input-group input-group-flat">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Your password" autocomplete="off" wire:model="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-footer">
            <button type="button" class="btn btn-primary w-100" wire:click="login"
                wire:loading.attr="disabled">Masuk</button>
        </div>
    </div>
    @script
        <script>
            $wire.on('login-error', (data) => {
                toastr.error(data)
            });
        </script>
    @endscript
</div>
