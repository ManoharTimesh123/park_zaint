@extends('admin.layouts.auth')
@section('title')
    Login
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
									<h1 class="text-center font-weight-light my-4 text-white">Sign in</h3>
									<form method="POST" action="{{ route('admin.post-login') }}" class="p-5">
										@if (session('error'))
											<div class="alert alert-danger mb-3 p-2" role="alert">
												{{ session('error') }}
											</div>
										@endif
										@csrf
										<div class="form-group mb-3">
											<label class="form-label" for="email">Email address</label>
											<div class="input-group">
												<span class="input-group-text bg-white" id="basic-addon1">
													<img src="{{ Vite::asset('resources/images/email-user.svg') }}"
														alt="user"
														class="img-fluid"
													/>
												</span>
												<input
														class="form-control
												@error('email') is-invalid @enderror"
														name="email" type="email" id="email"
														value="{{ old('email') }}" />
												@error('email')
														<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
														</span>
												@enderror
											</div>
										</div>
										<div class="form-group mb-3">
											<label class="form-label" for="password">Password</label>
											<div class="input-group">
												<span class="input-group-text bg-white" id="basic-addon1">
													<img src="{{ Vite::asset('resources/images/lock.svg') }}" alt="user"
														class="img-fluid"
													/>
												</span>
												<input
														class="form-control
												@error('password') is-invalid @enderror"
														name="password" type="password" id="password" />
												@error('password')
														<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
														</span>
												@enderror
											</div>
										</div>
										<div class="mb-3 form-check text-center">
											<input type="checkbox"
												class="form-check-input float-none"
												id="rememberCheckbox"
                                                name="remember_me"
                                                {{ old('remember_me') ? 'checked' : '' }}
                                            />
											<label
												class="form-check-label"
												for="rememberCheckbox"
											>
												Remember password
											</label>
										</div>
										<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
											<button
												class="btn btn-primary login-btn d-block w-100"
												type="submit"
											>
												Sign in
											</button>
										</div>
										<div class="mt-3 text-center">
											<span class="text-white">Forgot password?</span>
											<a href="{{ route('admin.forgot.password') }}">click here</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')
    @parent
    <script type="module"></script>
@endsection
