@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <h1>
                        {{ trans(Route::currentRouteName() . '_title') }}
                        <hr>
                        <a href="#" class="btn btn-primary">Nueva solicitud</a>
                    </h1>

                    <p class="label label-info news">
                        {{--Hay {{ $tickets->total() }} {{ $title }}--}}
                        {{ Lang::choice(Route::currentRouteName() . '_total', $tickets->total()) }}
                    </p>

                    @foreach($tickets as $ticket)
                        @include('partials/item', compact('ticket'))
                    @endforeach

                    {!! $tickets->render() !!}
                </div>

                <hr>

                <p><a href="#" target="_blank">jandro935</a></p>

            </div>
        </div>
    </div>

@endsection
