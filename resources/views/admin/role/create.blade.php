@extends('admin.layouts.app')
@section('title') Create Role @endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="d-flex flex-row-reverse justify-content-end mb-3 pb-2 gap-4 align-items-center">
			<h1 class="page-title mb-0">Create Role</h1>
			<a
				class="btn btn-secondary back-link-padding"
				href="{{route('admin.role.index')}}">
				<i class="fa-solid fa-arrow-left-long"></i>
			</a>
		</div>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				@if (session('error'))
					<div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
						{{ session('error') }}
					</div>
				@endif
				<form action="{{ route('admin.role.store') }}" method="post">
					@csrf
					<div class="row g-3">
						<div class="col-6">
							<label for="name" class="form-label text-dark">Role Name</label>
							<input type="text" class="shadow-none form-control @error('name') is-invalid @enderror"
								name="name" id="name" placeholder="Role Name"
								value="{{ old('name') }}" />
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-secondary">
								Create
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
