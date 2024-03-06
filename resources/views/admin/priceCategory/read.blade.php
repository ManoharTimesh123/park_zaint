@extends('admin.layouts.app')
@section('title') Pricing @endsection
@section('content')

<div class="container-fluid px-4">
	<div class="card">
		<div class="card-header">Pricing</div>
		<div class="card-body">
			<style>
				label {
					color: black !important;
				}
			</style>
				<div class="col-6">
					<label for="newcategory" class="form-label">{{$pricecategory[0]['name']}} (Category Name)</label>
				</div>
				<table class="table table-hover table-bordered">
					<thead>
						<th>ID</th>
						<th>No Of Days</th>
						<th>Price</th>
						<th>Created At</th>
						<th>Updated At</th>
					</thead>
					<tbody>
					@foreach($pricecategory[0]['airport_product_category'] as $price)
						<tr>
							<td>{{ $price['id'] }}</td>
							<td>Day {{ $price['no_of_days'] }}</td>
							<td>{{ floatval($price['price']) }}</td>
							<td>{{ $price['created_at'] }}</td>
							<td>{{ $price['updated_at'] }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				
		</div>
	</div>
</div>
@endsection