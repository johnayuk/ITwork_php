<?php

namespace App\Controllers;

use App\Contracts\TicketInterface;
use App\Repositories\TicketRepository;
use App\Requests\TicketRequest;
use Illuminate\Http\Request;

class TicketController
{

  protected $ticket;

  public function __construct(TicketInterface $ticket)
  {
      $this->ticket = $ticket;
  }

  public function getTickets()
  {
      $tickets = $this->ticket->get_all();

      return $tickets;
  }

  public function createTicket(TicketRequest $request)
  {
      $validated = $request->validated();

      $tickets = $this->ticket->create_data($request);

      return $tickets;
  }

   public function deleteTicket($id)
   {
      $ticket = $this->ticket->delete_data($id);

      return $ticket;
   }


   public function updateTicket(TicketRequest $data, $id)
   {
      $validated = $data->validated();


      $ticket = $this->ticket->update_data($data,$id);

      return $ticket;
   }
   

   public function getTicket($id)
   {
      $ticket = $this->ticket->getSingle_data($id);

      return $ticket;
   }
}
