@extends('admin.layouts.app')
@section('title') Create promotion @endsection
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Create promotion</div>
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
            <form class="row g-3" action="{{ route('admin.promotions.store') }}" method="post">
                @csrf
                <div class="col-12">
                    <label for="code" class="form-label">promotion code</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                        name="code" id="code" placeholder="promotion code"
                        value="{{ old('code') }}" />
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Promotion Description" rows="4" cols="50">{{ old('description') }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="Discount type" class="form-label">Discount Type</label>
                    <select id="discount_type" name="discount_type" class="form-select
                        @error('discount_type') is-invalid @enderror">
                        <option value="Fixed Price">Fixed Price</option>
                        <option value="Fixed Percentage">Fixed Percentage</option>
                    </select>
                    @error('discount_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="promotion amount" class="form-label">promotion amount</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror"
                        name="amount" id="amount" placeholder="Promotion Amount"
                        value="{{ old('amount') }}"/>
                    @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="promotion amount" class="form-label">Promotion expiry date:</label>
                    <input type="date" class="form-control @error('expire') is-invalid @enderror"
                        name="expire" id="expire" placeholder="Promotion Expire Date"
                        value="{{ old('expire') }}" min="{{ date('Y-m-d') }}"/>
                    @error('expire')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="col-12">
                    <label for="Minimum Spend" class="form-label">Minimum Spend</label>
                    <input type="number" class="form-control @error('minimum_spend') is-invalid @enderror"
                        name="minimum_spend" id="minimum_spend" placeholder="Minimum Spend"
                        value="{{ old('minimum_spend') }}" />
                    @error('minimum_spend')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="maximum Spend" class="form-label">Max Spend</label>
                    <input type="number" class="form-control @error('maximum_spend') is-invalid @enderror"
                        name="maximum_spend" id="maximum_spend" placeholder="Max Spend"
                        value="{{ old('maximum_spend') }}" />
                    @error('maximum_spend')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="products_and_addons" class="form-label">Products And Addons</label>
                    <select id="products_and_addons" name="products_and_addons[]" class="form-select
                        @error('products_and_addons') is-invalid @enderror" multiple>
                        @foreach($products as $value)
                            <option value="{{$value->strip_product_id}}">{{$value->name}}</option>
                        @endforeach

                        @foreach($addons as $value)
                            <option value="{{$value->strip_product_id}}">{{$value->name}}</option>
                        @endforeach

                    </select>
                    @error('products_and_addons')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="exclude_products_and_addons" class="form-label">Exclude Products And Addons</label>
                    <select id="exclude_products_and_addons" name="exclude_products_and_addons[]" class="form-select
                        @error('exclude_products_and_addons') is-invalid @enderror" multiple>
                        @foreach($addons as $value)
                            <option value="{{$value->strip_product_id}}" data-type="addons{{$value->name}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @error('exclude_products_and_addons')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="allowed_email" class="form-label">Allowed Email</label>
                    <input type="text" class="form-control @error('allowed_email') is-invalid @enderror"
                        name="allowed_email" id="allowed_email" placeholder="Allowed comma seprated emails"
                        value="{{ old('allowed_email') }}" />
                    @error('allowed_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="col-12">
                    <label for="use_limit" class="form-label">Use Limit</label>
                    <input type="number" class="form-control @error('use_limit') is-invalid @enderror"
                        name="use_limit" id="use_limit" placeholder="Use Limit"
                        value="{{ old('use_limit') }}" />
                    @error('use_limit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="user_limit" class="form-label">User Limit</label>
                    <input type="number" class="form-control @error('user_limit') is-invalid @enderror"
                        name="user_limit" id="user_limit" placeholder="User Limit"
                        value="{{ old('user_limit') }}" />
                    @error('user_limit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary">Create promotion</button>
                </div>
            </form>
            <style> label {
                color: black !important;
            }</style>
        </div>
    </div>
</div>
@endsection
