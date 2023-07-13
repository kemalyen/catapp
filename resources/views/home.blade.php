@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <img src="{{ "/images/{$image->path}" }}" class="img-fluid mx-auto d-block" alt="">
                        <div class="mt-2 p-3">
                            {!! $image->description !!}
                        </div>


                            @if ($user->hasRole('Admin'))
                                <a class="btn btn-lg btn-primary mx-auto d-block" href="{{ route('edit') }}">Update the image</a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
