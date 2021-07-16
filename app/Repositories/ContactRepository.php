<?php

namespace App\Repositories;

use App\Contracts\TicketInterface;
use App\Http\Controllers\Controller;
use App\Resources\ContactResource;
use App\Contact;
use Illuminate\Http\Request;
use App\Transfomer\Transform;

class ContactRepository implements TicketInterface
{

    use Transform;

     public function get_all()
     {
         try {

            $contact = Contact::all();
            // return $this->success("All Ticket", $ticket);

            return ContactResource::collection($contact);

         } catch (\Exception $e) {
            return back()->withError($e->getMessage());
         }
     }

     
     public function getSingle_data($id)
     {
        try {
           
         $contact = Contact::find($id);

         if (!$contact) {
            return response()->json([
              'message' =>'Contact does not EXIST',
            ],404);
         }

         return new ContactResource($contact);
           
        } catch (\Exception $e) {
           
         //  return $this->error($e->getMessage(), $e->getCode());
         return back()->withError($e->getMessage(), $e->getCode());
        }
     }

      public function create_data( $data)
      {
        //  $ticket = new Ticket();

        try {
         $contact =  Contact::create([
            'realname' => $data['realname'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
          ]);
         //  return $this->success("Ticket created",$ticket);
         return new ContactResource($contact);

        } catch (\Exception $e) {
         return back()->withError($e->getMessage(), $e->getCode());
        }
      }

      public function delete_data($id)
      {
          try {
            
             $contact = Contact::find($id);

             if (!$contact) {
                return response()->json([
                  'message' =>'Ticket does not EXIST',
                ],404);
             }

             $contact->delete();

            //  return $this->success("Ticket Deleted", $ticket);

            return new ContactResource($contact);

          } catch (\Exception $e) {
            return back()->withError($e->getMessage(), $e->getCode());
          }
      }


      public function update_data(Request $data,$id)
      {

         try {
           
            $contact = Contact::find($id);

            if (!$contact) {
               return response()->json([
                 'message' =>'Ticket does not EXIST',
               ],404);
            }

             $contact->name = $data->name;
             $contact->subject = $data->subject;
             $contact->message = $data->message;
             $contact->email = $data->email;

             $contact->save();
            
             return new ContactResource($contact);
         
         } catch (\Exception $e) {
            return back()->withError($e->getMessage(), $e->getCode());
         }

      }
}
