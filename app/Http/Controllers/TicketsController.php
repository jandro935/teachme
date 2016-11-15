<?php

namespace TeachMe\Http\Controllers;

use TeachMe\Entities\Ticket;

class TicketsController extends Controller
{
    public function latest()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->paginate(20);

        return view('tickets/list', compact('tickets'));
    }

    public function popular()
    {
        return view('tickets/list');
    }

    public function open()
    {
        return view('tickets/list');
    }

    public function closed()
    {
        return view('tickets/list');
    }

    public function details($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Ojo al pasar la variable $ticket a la función compact... va entre paréntesis
        return view('tickets/details', compact('ticket'));
    }
}
