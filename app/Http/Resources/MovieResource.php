<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        ;;return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title, 
            'summary' => $this->summary,
            'cover_image' => $this->cover_image,
            'genres' => $this->genres,
            'author' => $this->author,

            'tags' => $this->tags,
            'imdb_ratings' => $this->imdb_ratings,
            'pdf_download_link' => $this->pdf_download_link,
            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
