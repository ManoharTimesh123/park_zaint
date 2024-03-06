@extends('admin.layouts.app')
@section('title') Edit Customer @endsection
@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Edit Customer</div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form class="row g-3" action="{{ route('admin.customers.update', $user->id) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="col-6">
                    <input hidden name="id" value="{{ $user->id }}"></input>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" id="name" placeholder="Name"
                        value="{{ $user->name }}" />
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
                        value="{{ $user->email }}" />
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
                        value="{{ $user->phone }}" />
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
                            <option value="Individual" {{ $user->account_type == 'Individual' ? 'selected' : '' }}>Individual</option>
                            <option value="Corporate" {{ $user->account_type == 'Corporate' ? 'selected' : '' }}>Corporate</option>
                        </option>
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
                        <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
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
