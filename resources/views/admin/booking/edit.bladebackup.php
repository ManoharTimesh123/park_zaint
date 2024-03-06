@extends('admin.layouts.app')
@section('title') Edit Booking @endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
</div>
<div class="container-fluid px-4">
	<div class="card">
		<div class="card-header">Edit Booking</div>
		<div class="card-body">
			@if (session('error'))
			<div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
				{{ session('error') }}
			</div>
			@endif
			<form class="row g-3" action="{{ route('admin.booking.update', $booking->id) }}" method="post" name="booking_form">
				@csrf
				@method('PUT')
				<div class="col-6">
					
				</div>
				<div class="col-6 pt-1">
					<button id="booking_submit" class="btn btn-secondary" type="submit">
						Update
					</button>
				</div>

				<div class="g-3 row justify-content-center">
					<div class="col-6 d-flex">
						<label for="name" class="form-label text-dark col-6">Name: </label>
						<input type="text" class="shadow-none form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ $user['name'] }}" />
						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="email" class="form-label text-dark col-6">Email: </label>
						<input readonly type="text" class="shadow-none form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ $user['email'] }}" />
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="phone" class="form-label text-dark col-6">Phone: </label>
						<input type="tel" class="shadow-none form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone" value="{{ $user['phone'] }}" />
						@error('phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="product_id" class="form-label text-dark col-6">Product ID: </label>
						<select disabled id="product_id" name="product_id[]" class="form-control text-dark @error('product_id') is-invalid @enderror" multiple>
							<option value="1" {{ in_array(1, $product_ids) ? 'selected' : '' }}>product 1</option>
							<option value="2" {{ in_array(2, $product_ids) ? 'selected' : '' }}>product 2</option>
							<option value="3" {{ in_array(3, $product_ids) ? 'selected' : '' }}>product 3</option>
						</select>
						@error('product_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="company_name" class="form-label text-dark col-6">Company Name: </label>
						<input type="text" class="shadow-none form-control @error('company_name') is-invalid @enderror" name="company_name" id="company_name" placeholder="Company Name" value="{{ $user['company_name'] }}" />
						@error('company_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="outbound_flight" class="form-label text-dark col-6">Outbound Flight: </label>
						<input type="text" class="shadow-none form-control @error('outbound_flight') is-invalid @enderror" name="outbound_flight" id="outbound_flight" placeholder="Outbound Flight" value="{{ $booking->outbound_flight }}" />
						@error('outbound_flight')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="outbound_airport" class="form-label text-dark col-6">Outbound Airport: </label>
						<input readonly type="text" class="shadow-none form-control @error('outbound_airport') is-invalid @enderror" name="outbound_airport" id="outbound_airport" placeholder="Outbound Airport" value="{{ $booking->airport_id }}" />
						@error('outbound_airport')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="outbound_terminal" class="form-label text-dark col-6">Outbound Terminal: </label>
						<input type="text" class="shadow-none form-control @error('outbound_terminal') is-invalid @enderror" name="outbound_terminal" id="outbound_terminal" placeholder="Outbound Terminal" value="{{ $booking->outbound_terminal_id }}" />
						@error('outbound_terminal')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="inbound_flight" class="form-label text-dark col-6">Inbound Flight: </label>
						<input type="text" class="shadow-none form-control @error('inbound_flight') is-invalid @enderror" name="inbound_flight" id="inbound_flight" placeholder="Inbound Flight" value="{{ $booking->inbound_flight }}" />
						@error('inbound_flight')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="inbound_airport" class="form-label text-dark col-6">Inbound Airport: </label>
						<input readonly type="text" class="shadow-none form-control @error('inbound_airport') is-invalid @enderror" name="inbound_airport" id="inbound_airport" placeholder="Inbound Airport" value="{{ $booking->inbound_airport_id }}" />
						@error('inbound_airport')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="inbound_terminal" class="form-label text-dark col-6">Inbound Terminal: </label>
						<input type="text" class="shadow-none form-control @error('inbound_terminal') is-invalid @enderror" name="inbound_terminal" id="inbound_terminal" placeholder="Inbound Terminal" value="{{ $booking->inbound_terminal_id }}" />
						@error('inbound_terminal')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="addon_id" class="form-label text-dark col-6">Add on: </label>
						<select disabled id="addon_id" name="addon_id[]" class="form-control text-dark @error('addon_id') is-invalid @enderror" multiple>
							<option value="1" {{ in_array(1, $addon_ids) ? 'selected' : '' }}>add on 1</option>
							<option value="2" {{ in_array(2, $addon_ids) ? 'selected' : '' }}>add on 2</option>
							<option value="3" {{ in_array(3, $addon_ids) ? 'selected' : '' }}>add on 3</option>
						</select>
						@error('addon_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-6 d-flex">
						<label for="datepicker" class="form-label text-dark col-6">Travel start date:</label>
						<input readonly type="date" id="datepicker" name="travel_start_date" class="shadow-none form-control @error('travel_start_date') is-invalid @enderror" value="{{ $booking->travel_start_date }}">
					</div>

					<div class="col-6 d-flex">
						<label for="datepicker" class="form-label text-dark col-6">Travel end date:</label>
						<input readonly type="date" id="datepicker" name="travel_end_date" class="shadow-none form-control @error('travel_end_date') is-invalid @enderror" value="{{ $booking->travel_end_date }}">
					</div>

					<div class="col-6 d-flex">
						<label for="no_of_passengers" class="form-label text-dark col-6">No. of passengers: </label>
						<input type="number" class="shadow-none form-control @error('no_of_passengers') is-invalid @enderror" name="no_of_passengers" id="no_of_passengers" placeholder="No. of passengers" value="{{ $booking->no_of_passengers }}" />
						@error('no_of_passengers')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<input hidden id="new_items" name="new_items" value=""></input>
			</form>
			<div id="vehicles" class="col-12 d-flex"></div>
		</div>
	</div>
@endsection