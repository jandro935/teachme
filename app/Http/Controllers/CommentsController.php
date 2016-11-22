<?php

namespace TeachMe\Http\Controllers;

use TeachMe\Repositories\CommentsRepository;
use Illuminate\Http\Request;
use TeachMe\Repositories\TicketRepository;

class CommentsController extends Controller
{
    protected $commentRepository;
    protected $ticketRepository;

    public function __construct(TicketRepository $ticketRepository, CommentsRepository $commentsRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->commentRepository = $commentsRepository;
    }

    public function submit($id, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required | max:255',
            'link' => 'url',
        ]);

        $ticket = $this->ticketRepository->findOrFail($id);

        $this->commentRepository->create(
            $ticket,
            currentUser(),
            $request->get('comment'),
            $request->get('link')
        );

        session()->flash('success', 'Tu comentario fue guardado exitosamente');
        return redirect()->back();
    }
}
