<?php

namespace App\Controllers;

use App\Contracts\TicketInterface;
use App\Repositories\TicketRepository;
use App\Contracts\DataInterface;
use App\Requests\NewsRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class NewsController
{

  protected $news;

  public function __construct(TicketInterface $news)
  {
      $this->news = $news;
  }

  public function getNews()
  {
      $news = $this->news->get_all();

      return $news;
  }

  public function createNews(NewsRequest $request)
  {
      $validated = $request->validated();

      $news = $this->news->create_data($request);

      return $news;
  }

   public function deleteNews($id)
   {
      $news = $this->news->delete_data($id);

      return $news;
   }


   public function updateNews(NewsRequest $data, $id)
   {

      $validated = $data->validated();



      $news = $this->news->update_data($data,$id);

      return $news;
   }
   

   public function getTicket($id)
   {
      $news = $this->news->getSingle_data($id);

      return $news;
   }
}
