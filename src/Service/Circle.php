<?php
namespace App\Service;

class Circle extends Figure
{
    function __construct(float $radius) {
        $this->data['type'] = 'circle';
        $this->data['radius'] = $radius;
        $this->data['surface'] = round(pi() * $radius ** 2,2);
        $this->data['circumference'] = round(pi() * $radius * 2,2);
    }

    function calculateSurface() : float {
        return $this->$this->data['surface'];
    }
    function calculateDiameter(): float {
        return round($this->$this->data['radius']*2,2);
    }

}


