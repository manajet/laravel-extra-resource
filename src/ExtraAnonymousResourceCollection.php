<?php

namespace Manajet\ExtraResource;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Manajet\ExtraResource\Concerns\ExtraParameters;

class ExtraAnonymousResourceCollection extends AnonymousResourceCollection {
    use ExtraParameters;

    /**
     * Transform the resource into a JSON array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->map->using($this->extra);
        return $this->collection->map->toArray($request)->all();
    }
}
