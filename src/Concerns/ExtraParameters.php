<?php

namespace Manajet\ExtraResource\Concerns;

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
    public function using(array $data)
    {
        $this->extra = $data;

        return $this;
    }
}
