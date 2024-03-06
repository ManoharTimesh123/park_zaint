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
                                <th>Name</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Options</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $addons['Addon']->name }}</td>
                                <td>{{ $addons['Addon']->code }}</td>
                                <td>{{ $addons['Addon']->description }}</td>
                                <td>{{ $addons['Addon']->slug }}</td>
                                @if($addons['Addon']->status == 1)
                                <td>Active</td>
                                @else
                                <td>Inactive</td>
                                @endif
                                <td>
                                    @foreach($addons_options['AddonOption'] as $options)
                                    {{ $options->name }} - {{ $options->price }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $addons['Addon']->created_at }}</td>
                                <td>{{ $addons['Addon']->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection