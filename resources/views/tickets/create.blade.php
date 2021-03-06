@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{ trans('tickets.new_request') }}</h2>

                @include('partials/errors')

                {!! Form::open(['route' => 'tickets.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Título') !!}
                    {!! Form::textarea('title', null, [
                            'rows' => 2,
                            'class' => 'form-control',
                            'placeholder' => 'Describe brevemente de qué quieres que trate el tutorial'
                        ]) !!}
                </div>
                <p>
                    <button type="submit" class="btn btn-primary">{{ trans('tickets.send_request') }}</button>
                </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
