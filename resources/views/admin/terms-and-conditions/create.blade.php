@extends('admin.layouts.app')
@section('title') Create terms and conditions @endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
</div>
<div class="container-fluid px-4">
	<div class="card">
		<div class="card-header">Create terms and conditions</div>
		<div class="card-body">
			@if (session('error'))
			<div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
				{{ session('error') }}
			</div>
			@endif
			<form class="row g-3" action="{{ route('admin.terms-and-conditions.store') }}" method="post" name="terms_and_conditions_form">
				@csrf

				<input type="hidden" id="imageUrls" name="imageUrls" value="">
				<input type="hidden" id="description" name="description" value="">

				<div class="col-6 p-1">
					<button id="terms-and-conditions_submit" class="btn btn-secondary" type="submit">
						Add New
					</button>
				</div>
			</form>
			<div id="toolbar-container"></div>
			<div id="visual_description" class="border border-3 border-light p-3">
			</div>
		</div>
	</div>
@endsection