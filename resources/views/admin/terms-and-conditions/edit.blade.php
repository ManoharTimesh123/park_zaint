@extends('admin.layouts.app')
@section('title') Edit terms and conditions @endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Edit terms and conditions</div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger mx-4 mb-0 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form class="row g-3" action="{{ route('admin.terms-and-conditions.update', $tAndC->id) }}" method="post" name="terms_and_conditions_form">
                @csrf
                @method('PUT')
                <div class="col-12 pt-1 d-flex justify-content-end"">
					<button id="terms-and-conditions_submit" class="btn btn-secondary" type="submit">
						Update
					</button>
				</div>

				<input type="hidden" id="imageUrls" name="imageUrls" value="{{ $files }}">
				<textarea hidden id="description" name="description" value="{{ $tAndC->description ?? '' }}"></textarea>
            </form>
			<div id="toolbar-container"></div>
			<div id="visual_description" class="border border-3 border-light p-3">
				{!! $tAndC->description !!}
			</div>
        </div>
    </div>
</div>
@endsection
