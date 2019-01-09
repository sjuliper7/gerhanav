<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'  => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'story' => $this->story,
            'images'=> $this->images,
            'weight'=> $this->weight,
            'viewed' => $this->viewed,
            'id_status'=> $this->id_status,
            'id_category'=> $this->id_category,
            'id_store'=> $this->id_store,
        ];
    }
}
