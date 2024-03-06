@extends('admin.layouts.auth')
@section('title')
    Invalid link
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
                                        <div class="card-header">
											{{ __('Invalid or expired verification link!') }}<br>
											{{ __('Before proceeding, please recheck your verification link or try generating new reset password link.') }}
										</div>
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
