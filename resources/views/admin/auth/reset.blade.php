@extends('admin.layouts.auth')
@section('title')
    Reset password
@endsection
@section('content')
	<section class="login-sec">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="card shadow-lg border-0 rounded-0 login-card">
						<div class="card-body p-0">
							<div class="row">
								<div class="col-sm-5 login-card-title-col p-lg-0 d-flex align-items-center">
									<div class="login-card-title-main bg-white text-center py-5">
										<h3 class="fw-normal mb-4">Meet & Greet Parking management software</h3>
										<a href="/" class="" target="_blank">
											<img src="{{ Vite::asset('resources/images/webology-logo.svg') }}"
												alt="logo"
												class="img-fluid"
											/>
										</a>
									</div>
								</div>
								<div class="col-sm-7 bg-dark p-5 mh-43">
									<div class="d-block card-image text-end">
										<img src="{{ Vite::asset('resources/images/logo.svg') }}"
											alt="logo"
											class="img-fluid"
										/>
									</div>
									<div class="card-body">
                                        <form method="POST" action="{{ route('admin.password.update') }}">
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $data['token'] }}">

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    @if(session('email') === false)
                                                        <span role="alert">
                                                            <strong>Invalid email</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Reset Password') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection