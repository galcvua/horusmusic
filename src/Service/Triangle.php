<?php
namespace App\Service;

class Triangle extends Figure
{
    function __construct(float $a, float $b, float $c) {
        $this->data['type'] = 'triangle';
        $this->data['a'] = $a;
        $this->data['b'] = $b;
        $this->data['c'] = $c;
        $this->data['circumference'] = $a + $b + $c;
        $p = $this->data['circumference']/2;
        $this->data['surface'] = round(sqrt($p * ($p-$a) * ($p-$b) * ($p-$c)),2);
    }    
}


