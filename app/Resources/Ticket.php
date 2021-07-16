<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ticket extends JsonResource
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
            'des_from' => $this->des_from,
            'des_to' => $this->des_to,
            'depart' => $this->depart,
            'returning' => $this->returning,
            'adult' => $this->adult,
            'children' => $this->children,
            'f_class' => $this->f_class,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
