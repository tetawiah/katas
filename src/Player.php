<?php

namespace App;

class Player
{
    public $name;
    public $points = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points++;
    }
}
