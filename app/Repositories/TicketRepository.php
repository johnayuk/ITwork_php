<?php

namespace App\Repositories;

use App\Contracts\TicketInterface;
use App\Http\Controllers\Controller;
use App\Resources\Ticket as ResourcesTicket;
use App\Ticket;
use Illuminate\Http\Request;
use App\Transfomer\Transform;

class TicketRepository implements TicketInterface
{

    use Transform;

     public function get_all()
     {
         try {

            $ticket = Ticket::all();
            // return $this->success("All Ticket", $ticket);

            return ResourcesTicket::collection($ticket,);

         } catch (\Exception $e) {
            return back()->withError($e->getMessage());
         }
     }

     
     public function getSingle_data($id)
     {
        try {
           
         $ticket = Ticket::find($id);

         if (!$ticket) {
            return response()->json([
              'message' =>'Ticket does not EXIST',
            ],404);
         }

         return ResourcesTicket::collection($ticket,);
           
        } catch (\Exception $e) {
           
         //  return $this->error($e->getMessage(), $e->getCode());
         return back()->withError($e->getMessage(), $e->getCode());
        }
     }

      public function create_data( $data)
      {
         // $ticket = new Ticket();

        try {
         $ticket =  Ticket::create([
            'des_from' => $data['des_from'],
            'des_to' => $data['des_to'],
            'depart' => $data['depart'],
            'returning' => $data['returning'],
            'adult' => $data['adult'],
            'children' => $data['children'],
            'f_class' => $data['f_class'],



          
            
          ]);
             
         
         return new ResourcesTicket($ticket);

        } catch (\Exception $e) {
         return back()->withError($e->getMessage(), $e->getCode());
        }
      }

      public function delete_data($id)
      {
          try {
            
             $ticket = Ticket::find($id);

             if (!$ticket) {
                return response()->json([
                  'message' =>'Ticket does not EXIST',
                ],404);
             }

             $ticket->delete();

            //  return $this->success("Ticket Deleted", $ticket);

            return new ResourcesTicket($ticket);

          } catch (\Exception $e) {
            return back()->withError($e->getMessage(), $e->getCode());
          }
      }


      public function update_data(Request $data,$id)
      {

         try {
           
            $ticket = Ticket::find($id);

            if (!$ticket) {
               return response()->json([
                 'message' =>'Ticket does not EXIST',
               ],404);
            }

             $ticket->des_from = $data->des_from;
             $ticket->des_to = $data->des_to;
             $ticket->depart = $data->depart;
             $ticket->returning = $data->returning;
             $ticket->adult = $data->adult;
             $ticket->children = $data->children;
             $ticket->f_class = $data->f_class;

            //  $ticket->user()->associate($data->user());


             $ticket->save();
            
             return new ResourcesTicket($ticket);
         
         } catch (\Exception $e) {
            return back()->withError($e->getMessage(), $e->getCode());
         }

      }

      // $image   = $data->file('image');
      //        $filename   = $image->getClientOriginalName();
      //       //  dd($filename);

      //   //Fullsize
      //   $image->move(public_path().'/full/',$filename);

      // //   dd($image);


      //   $image_resize = Image::make(public_path().'/full/'.$filename);
      // //   dd($image_resize);

      //   $image_resize->fit(300, 300);
      // //   dd($image_resize);

      //   $image_resize->save();
}
