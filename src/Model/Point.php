<?php

namespace Yuana\Model;

class Point 
{
    public $lat;
    public $lng;

    public function __construct(float $lat, float $lng)
    {
        if (empty($lat)) {
            throw new \Exception('lat is required');
        }

        if (empty($lng)) {
            throw new \Exception('lng is required');
        }

        $this->lat = $lat;
        $this->lng = $lng;
    }
}