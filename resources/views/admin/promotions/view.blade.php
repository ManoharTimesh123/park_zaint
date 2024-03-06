@extends('admin.layouts.app')
@section('title') Addons @endsection
@section('content')
<div class="d-flex gap-2 align-items-center mb-4 pb-2">
    Addons
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
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Discount type</th>
                                <th>Promotion amount</th>
                                <th>expires_at</th>
                                <th>Maximum Spend</th>
                                <th>Minimum Spend</th>
                                <th>Allowed Emails</th>
                                <th>use limit/coupon</th>
                                <th>user limit</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $promotions['code'] }}</td>
                                <td>{{ $promotions['description'] }}</td>
                                <td>{{ $promotions['discount_type'] }}</td>
                                <td>{{ $promotions['amount'] }}</td>
                                <td>{{ $promotions['expire'] }}</td>
                                <td>{{ $promotions['maximum_spend'] }}</td>
                                <td>{{ $promotions['minimum_spend'] }}</td>
                                <td>
                                    @php
                                    echo (implode(',' ,array_column($emails['emails']->toArray(), 'email')));
                                    @endphp
                                </td>
                                <td>{{ $promotions['use_limit'] }}</td>
                                <td>{{ $promotions['user_limit'] }}</td>
                                <td>{{ $promotions['created_at'] }}</td>
                                <td>{{ $promotions['updated_at'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    @if ($getAllPromotionsAddonsAndProducts['products']->ToArray() || $getAllPromotionsAddonsAndProducts['addons']->ToArray())
                    <h3> Related Products And Addons. </h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product/Addon Name</th>
                                    <th>Is Exclude</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($getAllPromotionsAddonsAndProducts['products']->ToArray() as $products)
                                <tr>
                                    <td>{{$i}}</td>
                                    @php
                                    $i++;
                                    @endphp
                                    <td>{{ $products['products']['name'] }}</td>
                                    <td>{{ $products['is_exclude'] ? 'true' : 'false' }}</td>
                                    <td>{{ $products['products']['created_at'] }}</td>
                                    <td>{{ $products['products']['updated_at'] }}</td>
                                </tr>
                            @endforeach
                            @foreach ($getAllPromotionsAddonsAndProducts['addons']->ToArray() as $addons)
                                <tr>
                                    <td>{{$i}}</td>
                                    @php
                                    $i++;
                                    @endphp
                                    <td>{{ $addons['addons']['name'] }}</td>
                                    <td>{{ $addons['is_exclude'] ? 'true' : 'false' }}</td>
                                    <td>{{ $addons['addons']['created_at'] }}</td>
                                    <td>{{ $addons['addons']['updated_at'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection