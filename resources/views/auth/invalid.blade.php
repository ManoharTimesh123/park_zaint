@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Invalid or expired verification link!') }}</div>

                <div class="card-body">
                    {{ __('Before proceeding, please recheck your verification link or try generating new reset password link.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
