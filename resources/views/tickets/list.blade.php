@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <h1>
                        {{ $title }}
                        <hr>
                        <a href="{{ route('tickets.create') }}" class="btn btn-primary">{{ trans('tickets.new_request') }}</a>
                    </h1>

                    <p class="label label-info news">
                        {{--Hay {{ $tickets->total() }} {{ $title }}--}}
                        {{ $text_total }}
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

    {!! Form::open(['id' => 'form-vote', 'route' => ['votes.submit', ':id'], 'method' => 'POST']) !!}
    {!! Form::close() !!}

    {!! Form::open(['id' => 'form-unvote', 'route' => ['votes.destroy', ':id'], 'method' => 'DELETE']) !!}
    {!! Form::close() !!}

@endsection
