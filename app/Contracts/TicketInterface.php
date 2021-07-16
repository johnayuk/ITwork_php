<?php

namespace App\Contracts;

use App\Requests\TicketRequest;
use Illuminate\Http\Request;

interface TicketInterface
{

    public function get_all();


    public function create_data($data);

    
    public function delete_data($id);

    public function getSingle_data($id);

    public function update_data(Request $data,$id);
}
