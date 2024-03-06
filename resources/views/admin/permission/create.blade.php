@extends('admin.layouts.app')
@section('title') Create Permission @endsection
@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Create Permission</div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form class="row g-3" action="{{ route('admin.permission.store') }}" method="post">
                @csrf
                <div class="col-6">
                    <label for="name" class="form-label">Permission Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" id="name" placeholder="Permission Name"
                        value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
