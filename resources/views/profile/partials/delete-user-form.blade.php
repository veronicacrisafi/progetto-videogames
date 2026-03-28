<section>
    <header>
        <h2 class="section-title h3 mb-2">
            {{ __('Delete Account') }}
        </h2>

        <p class="section-copy mb-4">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-account-modal">
        {{ __('Delete Account') }}
    </button>

    <div class="modal fade" id="delete-account-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="delete-account-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content app-modal">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" id="delete-account-title">Delete Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="section-title h4 mb-3">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>
                    <p class="section-copy mb-0">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-ghost" data-bs-dismiss="modal">Cancel</button>

                    <form method="post" action="{{ route('profile.destroy') }}" class="w-100">
                        @csrf
                        @method('delete')

                        <div class="input-group">
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="{{ __('Password') }}" />

                            @error('password', 'userDeletion')
                                <span class="invalid-feedback d-block mt-2 w-100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button type="submit" class="btn btn-danger">
                                {{ __('Delete Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
