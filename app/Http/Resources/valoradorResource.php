<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class valoradorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user' => $this->valorador->name,
            'imgUser' => $this->valorador->img,
            'comentari' => $this->comentario,
            'valoracion' => $this->valoracion,
            'created_at' => $this->created_at
        ];
    }
}
