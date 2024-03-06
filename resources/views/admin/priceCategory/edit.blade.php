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
			<form class="row g-3" action="{{ route('admin.pricecategory.update', $pricecategory[0]['id']) }}" method="post">
				@csrf
				@method('PUT')
				<label> <b><u>Pricing categories</u></b> </label>
				<div class="col-6">
					<label for="newcategory" class="form-label">Update Category</label>
					<input type="text" class="form-control @error('code') is-invalid @enderror" name="newcategory"
						id="newcategory" placeholder="New Category Name" value="{{ $pricecategory[0]['name'] ? $pricecategory[0]['name'] : old('newcategory') }}" />
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
				@foreach($pricecategory[0]['airport_product_category'] as $price)
					<div class="col-3">
						<label for="day" class="form-label">For {{ $price['no_of_days'] }} Days</label>
						<input type="number" class="form-control alldays @error('day' . $price['no_of_days']) is-invalid @enderror"
							name="prices[]" data-itemid="{{ $price['no_of_days'] }}" placeholder="€" value="{{$price['price'] ? $price['price'] : old('day' . $price['no_of_days']) ?? 0 }}" />
						@error('day' . $price['no_of_days'])
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				@endforeach

				<div class="col-12">
					<button type="submit" class="btn btn-secondary">Update</button>
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