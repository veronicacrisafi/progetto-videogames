<section>
    <header>
        <h2 class="section-title h3 mb-2">
            {{ __('Update Password') }}
        </h2>

        <p class="section-copy mb-4">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="settings-form">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
            <input class="form-control" type="password" name="current_password" id="current_password"
                autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <span class="invalid-feedback d-block mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('New Password') }}</label>
            <input class="form-control" type="password" name="password" id="password" autocomplete="new-password">
            @error('password', 'updatePassword')
                <span class="invalid-feedback d-block mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"
                autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <span class="invalid-feedback d-block mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-brand">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p id="status" class="inline-status mb-0">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
