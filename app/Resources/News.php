<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class News extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'title' => $this->title,
            'sub_title' =>$this->sub_title,
            'body' => $this->body,
            // 'image' =>  $this->image,
            'image' => asset('full/' . $this->image),
            // asset('images/products/' . $this->image->name)
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
