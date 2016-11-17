<div data-id="{{ $ticket->id }}" class="well well-sm request">
    <h4 class="list-title">
        {{--<a href="{{ route('tickets.details', $ticket) }}">{!! Html::splitTitle($ticket->title) !!}</a>--}}
        <a href="{{ route('tickets.details', $ticket) }}">{!! $ticket->title !!}</a>

        @include('partials/status', compact($ticket))
    </h4>

    <p>
        {{--<a href="#" class="btn btn-primary btn-vote" title="Votar por este tutorial">--}}
            {{--<span class="glyphicon glyphicon-thumbs-up"></span> Votar--}}
        {{--</a>--}}

        {{--<a href="#" class="btn btn-hight btn-unvote hide">--}}
            {{--<span class="glyphicon glyphicon-thumbs-down"></span> No votar--}}
        {{--</a>--}}

        <span>Autor: {{ $ticket->author->name }} </span>

        <span class="votes-count">{{ $ticket->voters()->count() }} {{ trans('tickets.votes') }}</span>
        - <span class="comments-count">{{ $ticket->comments()->count() }} {{ trans('tickets.comments') }}</span>

        <p class="date-t"><span class="glyphicon glyphicon-time"></span> {{ $ticket->created_at->format('d/m/Y h:ia') }}</p>
    </p>
</div>
