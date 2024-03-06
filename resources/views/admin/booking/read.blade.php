@extends('admin.layouts.app')
@section('title') Booking @endsection
@section('content')
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
	Booking
</div>
<input hidden id="booking_id" value="{{ $booking->id }}"></input>
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
				<table class="table table-hover table-bordered">
					<thead>
						<th>SNo.</th>
						<th>Product Name</th>
						<th>Airport Name</th>
						<th>No of passengers</th>
						<th>Travel start date</th>
						<th>Travel end date</th>
						<th>Outbound Terminal</th>
						<th>Inbound Terminal</th>
						<th>Total price</th>
						<th>Payment Status</th>
						<th>Created At</th>
						<th>Updated At</th>
					</thead>
					<tbody>
						<td>1</td>
						<td>
						@foreach ($booking->productAndAddon as $product)
							{{ $product->products->name ?? '' }}
						@endforeach
						</td>
						<td>{{ $booking->airport->name }}</td>
						<td>{{ $booking->no_of_passengers }}</td>
						<td>{{ $booking->travel_start_date }}</td>
						<td>{{ $booking->travel_end_date }}</td>

						
						<td>
							@foreach ($booking->airport->terminals as $terminal)
								{{ $terminal->id == $booking->outbound_terminal_id ? $terminal->name : '' }}
							@endforeach
						</td>
						<td>
							@foreach ($booking->airport->terminals as $terminal)
								{{ $terminal->id == $booking->inbound_terminal_id ? $terminal->name : '' }}
							@endforeach
						</td>
						<td>{{ $booking->total_price }}</td>
						@if(isset($booking->bookingpaymentinfo[0]))
							<td>{{ $booking->bookingpaymentinfo[0]->status }}</td>
						@else
							<td>N/A</td>
						@endif
						<td>{{ $booking->created_at }}</td>
						<td>{{ $booking->updated_at }}</td>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
	Customer
</div>
<div class="col-md-12 divide-y-1 dashboard-card-main-col">
	<div class="row">
		<div class="col-12">
			<div class="card no-scale">
				<div class="card-body">
				<table class="table table-hover table-bordered">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Company name</th>
					</thead>
					<tbody>
						<td>{{ $user['name'] }}</td>
						<td>{{ $user['email'] }}</td>
						<td>{{ $user['phone'] }}</td>
						<td>{{ $user['company_name'] }}</td>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
	Vehicle Details
</div>
<div class="col-md-12 divide-y-1 dashboard-card-main-col">
	<div class="row">
		<div class="col-12">
			<div class="card no-scale">
				<div class="card-body">
				<table class="table table-hover table-bordered">
					<thead>
						<th>Reg. no.</th>
						<th>Maker</th>
						<th>Model</th>
						<th>Colour</th>
					</thead>
					<tbody>
					@foreach((is_string($booking->vehicle_details) ? json_decode($booking->vehicle_details, true) : $booking->vehicle_details) ?? [] as $data)
						<tr>
							<td>{{ $data['reg_no'] ?? $data['reg_no'] }}</td>
							<td>{{ $data['maker'] ?? $data['maker'] }}</td>
							<td>{{ $data['model'] ?? $data['model'] }}</td>
							<td>{{ $data['color'] ?? $data['color'] }}</td>
						</tr>
					@endforeach


					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="d-flex gap-2 align-items-center mb-4 pb-2" id="add_note_btn">
	Add Notes
</div>
<div class="row">
	<div class="col-12">
		<div class="card no-scale">
			<div class="card-body">
				<button class="btn btn-secondary" id="add_note">Add note</button>
			</div>
			<div>
				<span id="notes"></span>
				@foreach(array_reverse($notes) as $note)
					<div class="d-flex m-2">
						<span class="col-12">
							<a href="" data-id="{{ $note['id'] }}" class="note-edit">Edit</a>&emsp;<a href="" data-id="{{ $note['id'] }}" class="note-delete">Delete</a>
							<textarea required class="shadow-none form-control note">{{ $note['description'] }}</textarea>
						</span>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection