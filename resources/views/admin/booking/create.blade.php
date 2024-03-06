@extends('admin.layouts.app')
@section('title') Create Booking @endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
</div>
<div class="container-fluid px-4">
	<div class="card">
		<div class="card-header">Create Booking</div>
		<div class="card-body">
			@if (session('error'))
			<div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
				{{ session('error') }}
			</div>
			@endif
			<form class="row g-3" action="{{ route('admin.booking.store') }}" method="post" name="booking_form">
				@csrf

				<div class="col-6 pt-1">
					<button id="booking_submit" class="btn btn-secondary" type="submit">
						Add New
					</button>
				</div>

				<div class="g-3 row justify-content-center">
					<div class="col-6 d-flex">
						<label for="name" class="form-label text-dark col-6">Name: </label>
						<input type="text" class="shadow-none form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}" />
						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="email" class="form-label text-dark col-6">Email: </label>
						<input type="email" class="shadow-none form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}" />
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="phone" class="form-label text-dark col-6">Phone: </label>
						<input type="tel" class="shadow-none form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') }}" />
						@error('phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="airport" class="form-label text-dark col-6">Select Airport: </label>
						<select id="airport" name="airport" class="form-select
								@error('airport') is-invalid @enderror">
							<option value="" selected>Select airport</option>
							@foreach ($airports as $airport)
							<option value="{{ $airport->id }}" {{ old('airport') == $airport->id ? 'selected="selected"' : '' }}>
								{{ $airport->name }}
							</option>
							@endforeach
						</select>
						@error('airport')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="product_id" class="form-label text-dark col-6">Select Product: </label>
						<select id="product_id" name="product_id" class="form-select @error('product_id') is-invalid @enderror">
							@foreach ($products as $product)
								<option value="{{ $product->id }}" {{ old('product') == $product->id ? 'selected="selected"' : '' }}>
									{{ $product->name }}
								</option>
							@endforeach
						</select>
						@error('product_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="company_name" class="form-label text-dark col-6">Company Name: </label>
						<input type="text" class="shadow-none form-control @error('company_name') is-invalid @enderror" name="company_name" id="company_name" placeholder="Company Name" value="{{ old('company_name') }}" />
						@error('company_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="outbound_flight" class="form-label text-dark col-6">Outbound Flight: </label>
						<input type="text" class="shadow-none form-control @error('outbound_flight') is-invalid @enderror" name="outbound_flight" id="outbound_flight" placeholder="Outbound Flight" value="{{ old('outbound_flight') }}" />
						@error('outbound_flight')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="inbound_terminal" class="form-label text-dark col-6">Arrival Terminal: </label>
						<select id="inbound_terminal" name="inbound_terminal" class="form-select
								@error('inbound_terminal') is-invalid @enderror">
							<option value="" selected>Select Terminal</option>
						</select>
						@error('inbound_terminal')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="outbound_terminal" class="form-label text-dark col-6">Departure Terminal: </label>
						<select id="outbound_terminal" name="outbound_terminal" class="form-select
								@error('outbound_terminal') is-invalid @enderror">
							<option value="" selected>Select Terminal</option>
						</select>
						@error('outbound_terminal')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="inbound_flight" class="form-label text-dark col-6">Inbound Flight: </label>
						<input type="text" class="shadow-none form-control @error('inbound_flight') is-invalid @enderror" name="inbound_flight" id="inbound_flight" placeholder="Inbound Flight" value="{{ old('inbound_flight') }}" />
						@error('inbound_flight')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="addons_id" class="form-label text-dark col-6">Add on: </label>
						<select id="addons_id" name="addons_id[]" class="form-control text-dark @error('addons_id') is-invalid @enderror" multiple>
							@foreach ($addons as $addon)
								<option value="{{ $addon->id }}" {{ in_array($addon->id, old('addons_id', [])) ? 'selected' : '' }}>{{$addon->name}}</option>
							@endforeach
						</select>
						@error('addons_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="datepicker" class="form-label text-dark col-6">Travel start date:</label>
						<input type="date" id="datepicker" name="travel_start_date" class="shadow-none form-control @error('travel_start_date') is-invalid @enderror" min="{{ date('Y-m-d') }}">
						@error('travel_start_date')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="datepicker" class="form-label text-dark col-6">Travel end date:</label>
						<input type="date" id="datepicker" name="travel_end_date" class="shadow-none form-control @error('travel_end_date') is-invalid @enderror" min="{{ date('Y-m-d') }}">
						@error('travel_end_date')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					
					<div class="col-6 d-flex">
						<label for="no_of_passengers" class="form-label text-dark col-6">No. of passengers: </label>
						<input type="number" class="shadow-none form-control @error('no_of_passengers') is-invalid @enderror" name="no_of_passengers" id="no_of_passengers" placeholder="No. of passengers" value="{{ old('no_of_passengers') }}" />
						@error('no_of_passengers')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="col-6 d-flex">
						<label class="form-label text-dark col-6">Vehicles: </label>
						<button id="add_vehicle" class="btn btn-secondary">
							Add Vehicles
						</button>
					</div>
				</div>
				<input hidden id="new_items" name="new_items" value=""></input>
			</form>
			<div id="vehicles" class="col-12 d-flex"></div>
		</div>
	</div>
@endsection