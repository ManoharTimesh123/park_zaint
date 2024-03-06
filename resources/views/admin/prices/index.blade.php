@extends('admin.layouts.app')
@section('title') Pricing @endsection
@section('content')

<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Pricing</div>
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
            <form class="row g-3" action="{{ route('admin.prices.store') }}" method="post">
                @csrf
                <label class="form-label"><b><u>Price Schedule</u></b></label>

                <div class="col-4">
                    <label for="month" class="form-label"><h6>Months</h6></label>
                    <select id="month" name="month" class="form-select
                        @error('month') is-invalid @enderror" onchange = "selectmonthcategory()">
                        @foreach($months as $value)
                            <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-4">
                    <label for="category" class="form-label"><h6>Airport</h6></label>
                    <select id="monthairport" name="monthairport" class="form-select
                        @error('monthairport') is-invalid @enderror" onchange = "selectmonthcategory()">
                        <option value="0">No Select</option>
                        @foreach($airport as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @error('monthairport')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-4">
                    <label for="category" class="form-label"><h6>Product</h6></label>
                    <select id="monthairportproduct" name="monthairportproduct" class="form-select
                        @error('monthairportproduct') is-invalid @enderror" onchange = "selectmonthcategory()">
                        <option value="0">No Select</option>
                        @foreach($products as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @error('monthairportproduct')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @php 
                    $nodays = env('NOOFDAYS');
                @endphp
                @for($i = 1; $i <= $nodays; $i++)
                    <div class="col-3">
                        <label for="discount_type" class="form-label">Day {{ $i }}</label>
                        <select name="monthcategories" class="form-select monthcategories
                            @error('monthcategories') is-invalid @enderror" data-itemid="{{ $i }}">
                            <option value="0">No Select</option>
                            @foreach($categories as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                        @error('day' . $i)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endfor
                <div class="col-12">
                    <button type="button" id="days" onclick="savemonthcategorys()" class="btn btn-secondary">Save</button>
                </div>

            </form>
            <style> label {
                color: black !important;
            }</style>

            <script>

                function selectmonthcategory() {
                    var airportId = $("#monthairport").val();
                    var monthairportproduct = $("#monthairportproduct").val();
                    var month = $("#month").val();
                    let data = {
                            month: month,
                            airport_id: airportId,
                            product_id: monthairportproduct
                    };
                    axios.post("/admin/fetch-category/", data)
                    .then(function (response) {
                        if (response.status === 200) {
                            $(".monthcategories").each(function () {
                                var matchid = $(this).attr('data-itemid');
                                var optionsHTML = '<option value="0">No Select</option>'; // Create an empty string to store new options
                                response.data.forEach(function (category) {
                                    var hasMatch = category.airpot_month_day_category.some(function (monthcategory) {
                                        return monthcategory.date == matchid;
                                    });
                                    optionsHTML += '<option value="' + category.id + '" ' + (hasMatch ? 'selected' : '') + '>' + category.name + '</option>';
                                });
                                $(this).html(optionsHTML);
                            });
                            $("#categories").prop('disabled', false); // Enable the select element
                        } else {
                            alert("Error: " + response.statusText);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                }


                function savemonthcategorys() {
                    var month = document.getElementById('month').value;
                    var airport = document.getElementById('monthairport').value;
                    var monthairportproduct = document.getElementById('monthairportproduct').value;

                    var monthobj = [];
                    var key = '';
                    $('.monthcategories').each(function(){
                        key = $(this).attr('data-itemid');
                        monthobj[key] = $(this).val();
                    });

                    let data = {
                            month: month,
                            airport_id: airport,
                            product_id: monthairportproduct,
                            monthcategories: monthobj
                        };

                    axios.post("{{route('admin.savemonthcategorys')}}", data)
                    .then(function (response) {
                        if(response.status == 200) {                                    
                            alert('Category added successfully');
                            location.reload();
                        } else {
                            alert("Error: " + response.statusText);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });

                }
            </script>

        </div>
    </div>
</div>
@endsection
