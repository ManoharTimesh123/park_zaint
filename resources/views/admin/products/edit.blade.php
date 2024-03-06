@extends('admin.layouts.app')
@section('title') Update products @endsection
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Update product</div>
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
            <form class="row g-3" action="{{ route('admin.products.update', $products->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <label for="name" class="form-label">Product name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" id="name" value="{{$products['name']}}" placeholder="Product name"
                        value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="code" class="form-label">Product code</label>
                    <input type="text" value="{{$products['code']}}" class="form-control @error('code') is-invalid @enderror"
                        name="code" id="code" placeholder="Product code"
                        value="{{ old('code') }}" />
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Product Description" rows="4" cols="50">{{ old('description') }}{{$products['description']}}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select
                        @error('status') is-invalid @enderror">
                        <option value="1" {{ $products->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $products->status == '0' ? 'selected' : '' }}>Inactive</option>
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
