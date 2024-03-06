@extends('admin.layouts.app')
@section('title') Create Airport @endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
</div>
<div class="container-fluid px-4">
	<div class="card">
		<div class="card-header">Create Airport</div>
		<div class="card-body">
			@if (session('error'))
			<div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
				{{ session('error') }}
			</div>
			@endif
			<form class="row g-3" action="{{ route('admin.airport.store') }}" method="post" name="airport_form">
				@csrf
				<div class="col-6 pt-1">
					<button id="airport_submit" class="btn btn-secondary" type="submit">
						Add New
					</button>
				</div>

				<div class="g-3 row justify-content-center">
					<div class="col-9 d-flex">
						<label for="airport_name" class="form-label text-dark col-6">Airport Name: </label>
						<input type="text" class="shadow-none form-control @error('airport_name') is-invalid @enderror" name="airport_name" id="airport_name" placeholder="Airport Name" value="{{ old('airport_name') }}" />
						@error('airport_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-9 d-flex">
						<label for="cc_email" class="form-label text-dark col-6">CC Email: </label>
						<input type="text" class="shadow-none form-control @error('cc_email') is-invalid @enderror" name="cc_email" id="cc_email" placeholder="CC Email" value="{{ old('cc_email') }}" />
						@error('cc_email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-9 d-flex">
						<label for="airport_status" class="form-label text-dark col-6">Status: </label>
						<select id="airport_status" name="airport_status" class="form-select
								@error('airport_status') is-invalid @enderror">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
						@error('airport_status')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<input type="hidden" id="imageUrls" name="imageUrls" value="">
				<input hidden id="new_items" name="new_items" value=""></input>
				<textarea hidden id="description" name="description"></textarea>
			</form>
			<div class="mt-5">
				<span id="terminals"></span>
			</div>
			<div class="d-flex col-12 mt-5 mb-3 justify-content-start">
				<span class="form-label text-dark col-3 mt-4">Terminals: </span>
				<div class="col-3">Name
					<input type="text" class="shadow-none form-control @error('terminal_name') is-invalid @enderror" name="terminal_name" id="terminal_name" placeholder="Terminal Name" value="{{ old('terminal_name') }}" />
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="col-3">Short Name
					<input type="text" class="shadow-none form-control @error('shortname') is-invalid @enderror" name="shortname" id="shortname" placeholder="Short Name" value="{{ old('shortname') }}" />
					@error('shortname')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="col-3">Status
					<select id="terminal_status" name="terminal_status" class="form-select
								@error('terminal_status') is-invalid @enderror">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
					@error('terminal_status')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="col-12 d-flex justify-content-end">
				<button id="add_terminal" class="btn btn-secondary">
					Add Terminals
				</button>
			</div>
			<label>Airport instructions and information.</label>
			<div id="toolbar-container"></div>
			<div id="visual_description" class="border border-3 border-light p-3">
			</div>
		</div>
	</div>
@endsection