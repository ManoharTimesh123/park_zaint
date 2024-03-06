@extends('admin.layouts.app')
@section('title') Create Customer @endsection
@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Create Customer</div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form class="row g-3" action="{{ route('admin.customers.store') }}" method="post">
                @csrf
                <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" id="name" placeholder="Name"
                        value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                        name="email" id="email" placeholder="Email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" id="phone" placeholder="Phone"
                        value="{{ old('phone') }}" />
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="account_type" class="form-label">Account type</label>
                    <select id="account_type" name="account_type" class="form-select
                        @error('account_type') is-invalid @enderror">
                        <option {{ old('account_type') == 'individual' ? 'selected="selected"' : '' }} >Individual</option>
                        <option {{ old('account_type') == 'corporate' ? 'selected="selected"' : '' }} >Corporate</option>
                    </select>
                    @error('account_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select
                        @error('status') is-invalid @enderror">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status')
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
