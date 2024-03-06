@extends('admin.layouts.app')
@section('title') Bookings @endsection
@section('content')
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
	<h3 class="page-title">Bookings</h3>
    <img
      src="{{ Vite::asset('resources/images/right-arrow.svg') }}"
      alt="auth-profile"
      class="img-fluid auth-img rounded-circle border border-white bg-white transition-x"
    >
  </div>
<div class="col-md-12 divide-y-1 dashboard-card-main-col">
	<div class="row">
		<div class="col-12">
			<div class="card no-scale">
				@if (session('message'))
					<div class="alert alert-success alert-dismissible fade show mx-4 mb-0 mt-3" role="alert">
						{{ session('message') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif
				<div class="card-body">
					<div class="d-flex">
						<div class="col-3 d-flex align-items-center justify-content-center">
							<label>Product: </label>
							<select id="product-id-filter" class="form-select">
								<option value="">All</option>
								<option value="1">Product 1</option>
								<option value="2">Product 2</option>
								<option value="3">Product 3</option>
							</select>
						</div>
						<div class="col-3 d-flex align-items-center justify-content-center">
							<label>Airport: </label>
							<select id="airport-id-filter" class="form-select">
								<option value="">All</option>
								<option value="1">Airport 1</option>
								<option value="2">Airport 2</option>
								<option value="3">Airport 3</option>
							</select>
						</div>
						<div class="col-3 d-flex align-items-center justify-content-center">
							<label>Terminal: </label>
							<select id="terminal-id-filter" class="form-select">
								<option value="">All</option>
								<option value="1">Terminal 1</option>
								<option value="2">Terminal 2</option>
								<option value="3">Terminal 3</option>
							</select>
						</div>
					</div>
					<div class="col-6 d-flex mt-1 align-items-center justify-content-center">
							From: <input type="date" name="start_date" id="start_date" value="" class="form-select">
							To: <input type="date" name="end_date" id="end_date" value="" class="form-select">
					</div>
					{{ $dataTable->table() }}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }} 
@endpush
