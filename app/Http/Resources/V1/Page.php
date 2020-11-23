<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class Page extends JsonResource
{

    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'title_ru' => $this->title_ru,
            'content' => html_entity_decode(mb_substr(strip_tags($this->content), 0, 650, "utf-8")),
            'content_ru' => html_entity_decode(mb_substr(strip_tags($this->content_ru), 0, 650, "utf-8")),
        ];
    }
}
