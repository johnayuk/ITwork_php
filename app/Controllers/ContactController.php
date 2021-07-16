<?php

namespace App\Controllers;

use App\Contracts\TicketInterface;
use App\Repositories\TicketRepository;
use App\Contracts\DataInterface;
use App\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController
{

  protected $contact;

  public function __construct(TicketInterface $contact)
  {
      $this->contact = $contact;
  }

  public function getContacts()
  {
      $contact = $this->contact->get_all();

      return $contact;
  }

  public function createContact(ContactRequest $request)
  {
      $validated = $request->validated();

      $contact = $this->contact->create_data($request);

      return $contact;
  }

   public function deleteContact($id)
   {
      $contact = $this->contact->delete_data($id);

      return $contact;
   }


   public function updateContact(ContactRequest $data, $id)
   {
      $validated = $data->validated();


      $contact = $this->contact->update_data($data,$id);

      return $contact;
   }
   

   public function getContact($id)
   {
      $contact = $this->contact->getSingle_data($id);

      return $contact;
   }
}
