@extends("layouts.user_layout")
@section("style") @endsection

@section("wrapper")
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
        <div class="col mx-auto">
            <div class="mb-4 text-center">
                <img src="<?= asset('assets/images/logo-img.png'); ?>" width="180" alt="" />
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">
                            <h3 class="">{{ __('Confirm Password') }}</h3>
                            <hr />
                        </div>

                        <div class="form-body">
                            {{ __('Please confirm your password before continuing.') }}

                            <br /><br />

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm Password') }}
                                        </button>
                                        
                                        <br /><br />
                                        
                                        {{-- @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif --}}


                                        <a class="dropdown-item" href="{{ route('password.reset', ['token' => csrf_token() ]) }}" target="_blank"
                                            onclick="document.getElementById('reset-form').submit();"> <!-- event.preventDefault(); -->
                                            <i class='bx bx-log-out-circle'></i> {{ __('Reset Password') }}
                                        </a>
                                        <form id="reset-form" action="{{ route('password.reset', ['token' => csrf_token() ]) }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script") @endsection