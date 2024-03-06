@extends('admin.layouts.auth')
@section('title')
    Verify mail
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
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif

                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                        <form class="d-inline" method="POST" action="{{ route('admin.verification.resend') }}">
                                            @csrf
                                            <input hidden required name="email" value="{{ $data['email'] }}"/>
                                            <button type="submit" class="btn btn-link p-1 m-1 align-baseline">{{ __('click here to request another') }}</button>.
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