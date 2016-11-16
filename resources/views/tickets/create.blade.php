@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Formulario aquí</h2>

                @include('partials/errors')

                {!! Form::open(['route' => 'tickets.store', 'method' => 'POST']) !!}
                    <button type="submit" class="btn btn-primary">Enviar solicitud</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
