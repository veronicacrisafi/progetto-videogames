<section>
    <header>
        <h2 class="section-title h3 mb-2">
            {{ __('Profile Information') }}
        </h2>

        <p class="section-copy mb-4">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="settings-form">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input class="form-control" type="text" name="name" id="name" autocomplete="name"
                value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">
                {{ __('Email') }}
            </label>

            <input id="email" name="email" type="email" class="form-control"
                value="{{ old('email', $user->email) }}" required autocomplete="username" />

            @error('email')
                <span class="invalid-feedback d-block mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="section-copy mb-2">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-ghost btn-sm ms-2">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="inline-status text-success mb-0">
                            {{ __('A new verification link has been sent to your email address.') }}</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-brand" type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p id="profile-status" class="inline-status mb-0">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
