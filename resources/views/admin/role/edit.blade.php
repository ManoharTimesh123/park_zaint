@extends('admin.layouts.app')
@section('title') Edit Role @endsection
@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Edit Role</div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form class="row g-3" action="{{ route('admin.role.update', $role->id) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="col-6">
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" id="name" placeholder="Role Name"
                        value="{{ $role->name ?? '' }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
