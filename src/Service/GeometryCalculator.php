<?php
namespace App\Service;

class GeometryCalculator {
    public function sum(Figure $f1, Figure $f2) : array
    {
        return [
            'type' => 'calculator',
            'operation' => 'sum',
            'count' => 2,
            'circumference' => round($f1->circumference + $f2->circumference,2),
            'surface' => round($f1->surface + $f2->surface,2)
            ];
    }

    public function sumDiameters(Circle $f1, Circle $f2) : float {
        return round(2*($f1->radius + $f2->radius),2);
    }

    public function sumCircumference(Figure $f1, Figure $f2) : float {
        return round($f1->circumference + $f2->circumference,2);
    }

    public function sumSurface(Figure $f1, Figure $f2) : float {
        return round($f1->surface + $f2->surface,2);
    }
}