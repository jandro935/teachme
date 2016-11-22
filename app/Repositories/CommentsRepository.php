<?php

namespace app\Repositories;

use TeachMe\Entities\Entity;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Entities\User;
use TeachMe\Repositories\BaseRepository;

class CommentsRepository extends BaseRepository
{
    /**
     * @return Entity
     */
    public function getModel()
    {
        return new TicketComment();
    }

    public function create(Ticket $ticket, User $user, $comment, $link = '')
    {
        $comment = new TicketComment(compact(['comment', 'link']));
        $comment->user_id = $user->id;
        $ticket->comments()->save($comment);
    }
}
