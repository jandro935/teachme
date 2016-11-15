@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <h1>
                        Solicitudes populares
                        <a href="#" class="btn btn-primary">Nueva solicitud </a>
                    </h1>

                    <p class="label label-info news">Hay {{ $tickets->total() }} solicitudes recientes </p>

                    @foreach($tickets as $ticket)
                        @include('partials/item', compact('ticket'))
                    @endforeach

                    {!! $tickets->render() !!}
                </div>

                <hr>

                <p><a href="" target="_blank">jandro935</a></p>

            </div>
        </div>
    </div>

@endsection
