<?php

namespace Manajet\ExtraResource;

use Illuminate\Http\Resources\Json\JsonResource;
use Manajet\ExtraResource\Concerns\ExtraParameters;
use Illuminate\Support\Collection;

class ExtraJsonResource extends JsonResource {
    use ExtraParameters;

    public function transformCollection(Collection $collection, $transformer, $soft = false)
    {
        // if($soft === true) {
        //     $transformer = $transformer->soft();
        // }
        // return $collection->map(
        //     fn ($item) => $transformer->transform($item)
        // )->toArray();
    }

    /**
     * Create new anonymous resource collection.
     *
     * @param  mixed  $resource
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public static function collection($resource)
    {
        return tap(new ExtraAnonymousResourceCollection($resource, static::class), function ($collection) {
            if (property_exists(static::class, 'preserveKeys')) {
                $collection->preserveKeys = (new static([]))->preserveKeys === true;
            }
        });
    }
}
