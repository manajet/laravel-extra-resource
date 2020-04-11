<?php

namespace Manajet\ExtraResource;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Manajet\ExtraResource\Concerns\ExtraParameters;
use Illuminate\Support\Str;

class ExtraResourceCollection extends ResourceCollection {
    use ExtraParameters;

    /**
     * Transform the resource into a JSON array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $resourceClass = Str::replaceFirst('Collection', 'Resource', static::class);

        if(!class_exists($resourceClass)) {
            $resourceClass = Str::replaceFirst('Resource', '', static::class);
        }

        if(class_exists($resourceClass)) {
            $this->collection->transform(function ($model) use ($resourceClass) {
                return (new $resourceClass($model))->using($this->extra);
            });
        }

        return parent::toArray($request);
    }
}
