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
						<th>ID</th>
						<th>Name</th>
						<th>Slug</th>
						<th>CC Email</th>
						<th>Description</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Status</th>
					</thead>
					<tbody>
						<td>{{ $airport->id }}</td>
						<td>{{ $airport->name }}</td>
						<td>{{ $airport->slug }}</td>
						<td>{{ $airport->cc_email }}</td>
						<td>{!! $airport->description !!}</td>
						<td>{{ $airport->created_at }}</td>
						<td>{{ $airport->updated_at }}</td>
						@if($airport->status == 1)
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
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
	Terminals
</div>
<div class="col-md-12 divide-y-1 dashboard-card-main-col">
	<div class="row">
		<div class="col-12">
			<div class="card no-scale">
				<div class="card-body">
				<table class="table table-hover table-bordered">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Shortname</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Status</th>
					</thead>
					@foreach($airport->terminals as $terminal)
						<tbody>
							<td>{{ $terminal->id }}</td>
							<td>{{ $terminal->name }}</td>
							<td>{{ $terminal->shortname }}</td>
							<td>{{ $terminal->created_at }}</td>
							<td>{{ $terminal->updated_at }}</td>
							@if($terminal->status == 1)
								<td>Active</td>
							@else
								<td>InActive</td>
							@endif
						</tbody>
					@endforeach
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection