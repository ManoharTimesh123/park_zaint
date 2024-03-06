@extends('admin.layouts.app')
@section('title') Customers @endsection
@section('content')
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
	<h3 class="page-title">Customers</h3>
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
					<div class="col-6">
						<select id="account-type-filter" class="form-select">
							<option value="">All</option>
							<option value="Individual">Individual</option>
							<option value="Corporate">Corporate</option>
						</select>
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
