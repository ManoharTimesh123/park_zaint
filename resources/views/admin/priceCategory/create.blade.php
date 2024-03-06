@extends('admin.layouts.app')
@section('title') Pricing @endsection
@section('content')

<div class="container-fluid px-4">
	<div class="card">
		<div class="card-header">Pricing</div>
		<div class="card-body">
			@if (session('error'))
			<div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
				{{ session('error') }}
			</div>
			@endif
			@error('id')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
			<form class="row g-3" action="{{ route('admin.pricecategory.store') }}" method="post">
				@csrf
				<label> <b><u>Pricing categories</u></b> </label>
				<div class="col-6">
					<label for="newcategory" class="form-label">Create New Categories</label>
					<input type="text" class="form-control @error('code') is-invalid @enderror" name="newcategory"
						id="newcategory" placeholder="New Category Name" value="{{ old('newcategory') }}" />
					@error('newcategory')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				</br>
				</br>
				</br>
				</br>
				<label class="form-label"><b><u>Day rates</u></b></label>
				@php
				$nodays = env('NOOFDAYS');
				@endphp
				@for($i = 1; $i <= $nodays; $i++) 
					<div class="col-3">
						<label for="day" class="form-label">For {{ $i }} Days</label>
						<input type="number" class="form-control alldays @error('day' . $i) is-invalid @enderror"
							name="prices[]" data-itemid="{{ $i }}" placeholder="€" value="{{ old('day' . $i) ?? 0 }}" />
						@error('day' . $i)
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					@endfor

					<div class="col-12">
						<button type="submit" class="btn btn-secondary">Create</button>
					</div>

			</form>
			<style>
				label {
					color: black !important;
				}
			</style>

		</div>
	</div>
</div>
@endsection