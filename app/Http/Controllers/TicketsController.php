<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use TeachMe\Entities\Ticket;

//use TeachMe\Entities\TicketComment;

class TicketsController extends Controller
{

    public function latest()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->paginate(10);

        return view('tickets/list', compact('tickets'));
    }

    public function popular()
    {
        return view('tickets/list');
    }

    public function open()
    {
        $tickets = Ticket::where('status', 'open')->paginate(10);

        return view('tickets/list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = Ticket::where('status', 'closed')->paginate(10);

        return view('tickets/list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = Ticket::findOrFail($id);

//        $comments = TicketComment::select('ticket_comments.*', 'users.name')
//            ->join('users', 'ticket_comments.user_id', '=', 'users.id')
//            ->where('ticket_id', $id)
//            ->get();

        // Ojo al pasar la variable $ticket a la función compact... va entre comillas
        return view('tickets/details', compact('ticket'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request, Guard $auth)
    {
        $this->validate($request, [
            'title' => 'required|max:120'
        ]);

        $ticket = $auth->user()->tickets()->create([
            'title' => $request->get('title'),
            'status' => 'open'
        ]);

        // This is another way to do it
//        $ticket = new Ticket();
//        $ticket->title = $request->get('title');
//        $ticket->status = 'open';
//        $ticket->user_id = $auth->user()->id;
//        $ticket->save();

        return Redirect::route('tickets.details', $ticket->id);
    }
}
