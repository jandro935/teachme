<?php

namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;


class TicketRepository
{
    protected function selectTicketsList()
    {
        return Ticket::selectRaw(
            'tickets.*, '
            .'(SELECT COUNT(*) FROM ticket_comments WHERE ticket_comments.ticket_id = tickets.id) AS num_comments, '
            .'(SELECT COUNT(*) FROM ticket_votes WHERE ticket_votes.ticket_id = tickets.id) AS num_votes'
        )
            ->with('author');
    }

    public function paginateLatest()
    {
        return $this->selectTicketsList()
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function paginateOpen()
    {
        return $this->selectTicketsList()
            ->where('status', 'open')
            ->paginate(10);
    }

    public function paginateClosed()
    {
        return $this->selectTicketsList()
            ->where('status', 'closed')
            ->paginate(10);
    }

    public function findOrFail($id)
    {

//        $comments = TicketComment::select('ticket_comments.*', 'users.name')
//            ->join('users', 'ticket_comments.user_id', '=', 'users.id')
//            ->where('ticket_id', $id)
//            ->get();

        return Ticket::findOrFail($id);
    }
}
