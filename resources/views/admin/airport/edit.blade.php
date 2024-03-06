@extends('admin.layouts.app')
@section('title') Edit Airport @endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Edit Airport</div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form class="row g-3" action="{{ route('admin.airport.update', $airport->id) }}" method="post" name="airport_form">
                @csrf
                @method('PUT')
                <div class="col-12 pt-1 d-flex justify-content-end"">
					<button id="airport_submit" class="btn btn-secondary" type="submit">
						Update
					</button>
				</div>

                <div class="g-3 row justify-content-center">
					<div class="col-9 d-flex">
						<label for="airport_name" class="form-label text-dark col-6">Airport Name: </label>
						<input type="text" class="shadow-none form-control @error('airport_name') is-invalid @enderror" name="airport_name" id="airport_name" placeholder="Airport Name" value="{{ $airport->name ?? '' }}" />
						@error('airport_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="col-9 d-flex">
						<label for="cc_email" class="form-label text-dark col-6">CC Email: </label>
						<input type="text" class="shadow-none form-control @error('cc_email') is-invalid @enderror" name="cc_email" id="cc_email" placeholder="CC Email" value="{{ $airport->cc_email ?? '' }}" />
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
                            <option value="1" {{ $airport->status == 1 ? 'selected="selected"' : '' }}> Active </option>
                            <option value="0" {{ $airport->status == 0 ? 'selected="selected"' : '' }}> InActive </option>
                        </select>
						@error('airport_status')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<input type="hidden" id="imageUrls" name="imageUrls" value="{{ $files }}">
				<input hidden id="new_items" name="new_items" value=""></input>
				<input hidden id="update_items" name="update_items" value=""></input>
				<textarea hidden id="description" name="description" value="{{ $airport->description ?? '' }}"></textarea>
            </form>
			<div class="mt-5">
				<span id="terminals"></span>
				@foreach($airport->terminals as $terminal)
				<div class="d-flex justify-content-end">
					<input required hidden type="text" value="{{ $terminal['id'] }}" name="terminal_update_ids[]"/>
					<span class="col-3"><input required type="text" value="{{ $terminal['name'] }}" class="shadow-none form-control" name="terminal_name_update[]"/></span>
					<span class="col-3"><input required type="text" value="{{ $terminal['shortname'] }}" class="shadow-none form-control" name="terminal_shortname_update[]"/></span>
					<span class="col-3">
						<select class="form-select" name="terminal_status_update[]">
							<option value="1" @if ($terminal['status'] == 1) selected @endif>Active</option>
							<option value="0" @if ($terminal['status'] == 0) selected @endif>Inactive</option>
						</select>
					</span>
				</div>
				@endforeach
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
				{!! $airport->description !!}
			</div>
        </div>
    </div>
</div>
@endsection
