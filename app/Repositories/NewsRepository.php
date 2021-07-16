<?php

namespace App\Repositories;

use App\Contracts\DataInterface;
use App\Contracts\TicketInterface;
use App\Resources\News as NewsResource;
use App\NewsModel;
use Illuminate\Http\Request;
use App\Transfomer\Transform;
use Intervention\Image\Facades\Image;

class NewsRepository implements TicketInterface
{

    use Transform;

     public function get_all()
     {
         try {

            $news = NewsModel::all();
            // return $this->success("All Ticket", $news);
// return response()->json([
//    $news
// ]);
            return NewsResource::collection($news);

         } catch (\Exception $e) {
            return back()->withError($e->getMessage());
         }
     }

     
     public function getSingle_data($id)
     {
        try {
           
         $news = NewsModel::find($id);

         if (!$news) {
            return response()->json([
              'message' =>'Ticket does not EXIST',
            ],404);
         }

         return new NewsResource($news);
           
        } catch (\Exception $e) {
           
         //  return $this->error($e->getMessage(), $e->getCode());
         return back()->withError($e->getMessage(), $e->getCode());
        }
     }

      public function create_data($data)
      {
        //  $ticket = new Ticket();

        try {
         
            
             
        $image   = $data->file('image');
        $filename   = $image->getClientOriginalName();
        //Fullsize
        $image->move(public_path().'/full/',$filename);

        $image_resize = Image::make(public_path().'/full/'.$filename);

        $image_resize->fit(300, 300);

        $image_resize->save();


        $news= new NewsModel();
        $news->title = $data->title;
        $news->body = $data->body;
        $news->sub_title = $data->sub_title;
        $news->image = $filename;
      //   dd($news);

        $news->save();
         //  return $this->success("Ticket created",$ticket);
         return new NewsResource($news);
         

        } catch (\Exception $e) {
         return back()->withError($e->getMessage(), $e->getCode());
        }
      }

      public function delete_data($id)
      {
          try {
            
             $news = NewsModel::find($id);

             if (!$news) {
                return response()->json([
                  'message' =>'News does not EXIST',
                ],404);
             }

             $news->delete();

            //  return $this->success("Ticket Deleted", $ticket);

            return new NewsResource($news);

          } catch (\Exception $e) {
            return back()->withError($e->getMessage(), $e->getCode());
          }
      }


      public function update_data(Request $data,$id)
      {

         try {
           
            $news = NewsModel::find($id);

            if (!$news) {
               return response()->json([
                 'message' =>'News does not EXIST',
               ],404);
            }

            
              $image   = $data->file('image');
             $filename   = $image->getClientOriginalName();
            //  dd($filename);

        //Fullsize
        $image->move(public_path().'/full/',$filename);

      //   dd($image);


        $image_resize = Image::make(public_path().'/full/'.$filename);
      //   dd($image_resize);

        $image_resize->fit(300, 300);
      //   dd($image_resize);

        $image_resize->save();
           

            $news->title = $data->title;
            $news->body = $data->body;
            $news->sub_title = $data->sub_title;
            $news->save();
            
             return new NewsResource($news);
         
         } catch (\Exception $e) {
            return back()->withError($e->getMessage(), $e->getCode());
         }

      }
}
