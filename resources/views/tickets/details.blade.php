@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title-show">
                {{--{!! Html::splitTitle($ticket->title) !!}--}}
                {!! $ticket->title !!}

                @include('partials/status', compact($ticket))
            </h2>

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <p class="date-t">
                <span class="glyphicon glyphicon-time"></span> {{ $ticket->created_at->format('d/m/Y h:ia') }} --
                {{ $ticket->author->name }}
            </p>

            <h4 class="label label-info news">{{ count($ticket->voters) }} {{ trans('tickets.votes') }}</h4>

            <p class="vote-users">
                @foreach($ticket->voters as $user)
                    <span class="label label-info">{{ $user->name }}</span>
                @endforeach
            </p>

            @if (Auth::check())

                @if(!currentUser()->hasVoted($ticket))
                    {!! Form::open(['route' => ['votes.submit', $ticket->id], 'method' => 'POST']) !!}
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-thumbs-up"></span> {{ trans('tickets.vote') }}
                        </button>
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['votes.destroy', $ticket->id], 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-hight btn-unvote">
                            <span class="glyphicon glyphicon-thumbs-down"></span> {{ trans('tickets.remove_vote') }}
                        </button>
                    {!! Form::close() !!}
                @endif

            @endif

            <h3>{{ trans('tickets.new_comment') }}</h3>

            @include('partials/errors')

            {!! Form::open(['route' => ['comments.submit', $ticket->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    <label for="comment">{{ trans('tickets.comment') }}:</label>
                    <textarea rows="4" class="form-control" name="comment" cols="50" id="comment">{{ old('comment') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="link">{{ trans('tickets.link') }}:</label>
                    <input class="form-control" name="link" type="text" id="link" value="{{ old('link') }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ trans('tickets.send_comment') }}</button>
            {!! Form::close() !!}

            <h3>{{ trans('tickets.comments') }} ({{ count($ticket->comments) }})</h3>

            @foreach($ticket->comments as $comment)
                <div class="well well-sm">
                    <p><strong>{{ $comment->user->name }}</strong></p>
                    <p>{{ $comment->comment }}</p>
                    @if ($comment->link)
                        <p>
                            <a href="{{ $comment->link }}" target="_blank" rel="nofollow">{{ $comment->link }}</a>
                        </p>
                    @endif
                    <p class="date-t">
                        <span class="glyphicon glyphicon-time"></span>
                        {{ $comment->created_at->format('d/m/Y h:ia') }}
                    </p>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
