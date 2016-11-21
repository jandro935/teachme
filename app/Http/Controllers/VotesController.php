<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Auth\Guard;
use TeachMe\Entities\Ticket;

class VotesController extends Controller
{
    public function submit($id, Guard $auth)
    {
        $ticket = Ticket::findOrFail($id);
        $auth->user()->vote($ticket);

        return redirect()->back();
    }

    public function destroy($id, Guard $auth)
    {
        $ticket = Ticket::findOrFail($id);
        $auth->user()->unvote($ticket);

        return redirect()->back();
    }
}
