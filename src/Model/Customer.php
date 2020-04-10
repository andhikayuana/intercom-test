<?php

namespace Yuana\Model;

class Customer
{
    public $name;
    public $user_id;
    public $point;

    public function __construct(float $lat, float $lng, string $name, int $user_id)
    {
        if (empty($name)) {
            throw new \Exception("name is required");
        }

        if ($user_id < 1) {
            throw new \Exception("user_id is required");
        }

        $this->point = new Point($lat, $lng);
        $this->name = $name;
        $this->user_id = $user_id;
    }
}
