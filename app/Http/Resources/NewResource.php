<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'image' => $this->image_path,
            'created_at' =>$this->created_at,
            'category'=>CategoryResource::make($this->whenLoaded('category')),


        ];

    }

}
