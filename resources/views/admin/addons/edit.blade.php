@extends('admin.layouts.app')
@section('title') Update addons @endsection
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Update Addon</div>
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
            <form class="row g-3" action="{{ route('admin.addons.update', $addons['Addon']->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <label for="name" class="form-label">Addon name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$addons['Addon']['name']}}" placeholder="Addon name" value="{{ old('name') }}" />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="code" class="form-label">Addon code</label>
                    <input type="text" value="{{$addons['Addon']['code']}}" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="Addon code" value="{{ old('code') }}" />
                    @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div id="alloption">
                    @php
                        $i = 1;
                    @endphp
                    @foreach($addons_options['AddonOption'] as $options)
                    <div class="col-12 option" style="display: flex;">
                        <div class="col-6 p-2">
                            @if($i == 1)
                                <label for="option_name" class="form-label">Addon options:</label>
                            @endif
                                
                            <input type="text" value="{{$options->name}}" class="form-control @error('option_name') is-invalid @enderror" name="option_name[]" placeholder="Option name" />
                            @error('option_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-6 p-2">
                            @if($i == 1)
                                <label for="option_price" class="form-label">Addon prices:</label>
                            @endif
                            <input type="number" step="any" class="form-control @error('option_price') is-invalid @enderror" name="option_price[]" id="option_price" value="{{$options->price}}" placeholder="Option price" />
                            @error('option_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="button" onclick = "removeoption(this)" class="p-0 border-0 bg-transparent">
                            <img
                                src="{{ Vite::asset('resources/images/delete.svg') }}"
                                alt="delete"
                            >
                        </button>
                    </div>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </div>

                <div class="col-6 pt-1">
                    <a href="#" onclick="addmore()">Add another option</a>
                </div>
                <script>
                    function removeoption(button) {
                        $(button).closest('.option').remove();
                    }
                    function addmore() {
                        var optionname = $('<input>');
                        optionname.attr({
                            'type': 'text',
                            'class': 'form-control',
                            'name': 'option_name[]',
                            'placeholder': 'Option name',
                        });
                        var optionprice = $('<input>');
                        optionprice.attr({
                            'type': 'number',
                            'step': 'any', // Allows decimal input
                            'class': 'form-control',
                            'name': 'option_price[]',
                            'placeholder': 'Option price',
                        });
                        $("#alloption").append(
                            $('<div class="col-12 option" style="display: flex;"></div>').append(
                                $('<div class="col-6 p-2"></div>').append(optionname),
                                $('<div class="col-6 p-2"></div>').append(optionprice),
                                $('<button type="button" onclick = "removeoption(this)" class="p-0 border-0 bg-transparent"></button>').append(
                                    $('<img src="{{ Vite::asset("resources/images/delete.svg") }}" alt="delete">')
                                )

                            )
                        );
                    }
                </script>

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Addon Description" rows="4" cols="50">{{ old('description') }}{{$addons['Addon']['description']}}</textarea>

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
                        <option value="1" {{ $addons['Addon']->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $addons['Addon']->status == '0' ? 'selected' : '' }}>Inactive</option>
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