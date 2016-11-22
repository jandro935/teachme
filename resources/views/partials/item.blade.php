<div data-id="{{ $ticket->id }}" class="well well-sm ticket">
    <h4 class="list-title">
        {{--<a href="{{ route('tickets.details', $ticket) }}">{!! Html::splitTitle($ticket->title) !!}</a>--}}
        <a href="{{ route('tickets.details', $ticket) }}">{!! $ticket->title !!}</a>

        @include('partials/status', compact($ticket))
    </h4>

    <p>
        @if(Auth::check())

            <a href="#" {!! Html::classes(['btn btn-primary btn-vote', 'hidden' => currentUser()->hasVoted($ticket)]) !!}
                title="Votar por este tutorial">
                <span class="glyphicon glyphicon-thumbs-up"></span> Votar
            </a>

            <a href="#" {!! Html::classes(['btn btn-hight btn-unvote', 'hidden' => !currentUser()->hasVoted($ticket)]) !!}
                title="Quitar el voto a este tutorial">
                <span class="glyphicon glyphicon-thumbs-down"></span> Quitar voto
            </a>

        @endif

        <span>Autor: {{ $ticket->author->name }} </span>

        <span class="votes-count">{{ $ticket->num_votes }} {{ trans('tickets.votes') }}</span>
        - <span class="comments-count">{{ $ticket->num_comments }} {{ trans('tickets.comments') }}</span>

        <p class="date-t"><span class="glyphicon glyphicon-time"></span> {{ $ticket->created_at->format('d/m/Y h:ia') }}</p>
    </p>
</div>
