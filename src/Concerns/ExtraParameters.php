<?php

namespace Manajet\ExtraResource\Concerns;

use Illuminate\Support\Arr;

trait ExtraParameters {
    /**
     * The extra data that can be used to construct the resource array.
     *
     * @var array
     */
    protected $extra = [];


    /**
     * Add extra data to construct the resource array.
     *
     * @param array $data
     * @return $this
     */
    public function using($data = [])
    {
        $this->extra = $data;

        return $this;
    }

    public function hasExtra($path)
    {
        return Arr::has($this->extra, $path);
    }

    public function getExtra($path = null, $default = null)
    {
        return Arr::get($this->extra, $path, $default);
    }

    public function usingWhen($condition, $data)
    {
        if($condition) {
            $this->using($data);
        }
    }

    public function usingWhenHasValue($data)
    {
        if($data) {
            $this->using($data);
        }
    }
}
