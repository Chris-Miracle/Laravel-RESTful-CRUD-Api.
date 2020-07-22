<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Member extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return[
            'id' =>$this->id,
            'name' =>$this->name,
            'email' =>$this->email,
            'phone' =>$this->phone,
            'address' =>$this->address,
            'quote' =>$this->quote
        ];
    }

    public function with($request){
        return [
            'Api_Version' => '1.0.0',
            'Developer' => url('https://github.com/Chris-Miracle')
        ];
    }
}
