@extends('admin.layouts.app')
@section('title') Airport @endsection
@section('content')
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
	Airport
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
				<table class="table table-hover table-bordered">
					<thead>
						<th>Description</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Status</th>
					</thead>
					<tbody>
						<td>{!! $tAndC->description !!}</td>
						<td>{{ $tAndC->created_at }}</td>
						<td>{{ $tAndC->updated_at }}</td>
						@if($tAndC->status == 1)
							<td>Active</td>
						@else
							<td>InActive</td>
						@endif
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection