<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Circle;
use App\Service\Triangle;
use App\Service\GeometryCalculator;

class ApiController extends AbstractController
{
    /**
     * @Route("/circle/{radius}", methods={"GET","HEAD"}, name="circle")
     */
    public function getCircle(string $radius): JsonResponse
    {
        $fRadius = floatval($radius);
        if($fRadius>0) {
            $circle = new Circle($fRadius);
            return $this->json($circle->toArray());    
        }
        return $this->errorResponce();
    }

    /**
     * @Route("/triangle/{a}/{b}/{c}", methods={"GET","HEAD"}, name="triangle")
     */
    public function getTriangle(string $a, string $b, string $c): JsonResponse
    {
        if($a>0 && $b>0 && $c>0) {
            $triangle = new Triangle($a, $b, $c);
            return $this->json($triangle->toArray());
        }
        return $this->errorResponce();
    }

    /**
     * @Route("/sum/{radius}/{a}/{b}/{c}", methods={"GET","HEAD"}, name="sum")
     */
    public function getSum(string $radius, string $a, string $b, string $c): JsonResponse
    {
        if($radius>0 && $a>0 && $b>0 && $c>0) {
            $triangle = new Triangle($a, $b, $c);
            $circle = new Circle($radius);
            $calculator = new GeometryCalculator();
            return $this->json( $calculator->sum($triangle, $circle) );
        }
        return $this->errorResponce();
    }

    private function errorResponce(): JsonResponse
    {
        return new JsonResponse(['type' => 'error', 'code' => 400, 'desc' => 'Invalid parameter'], 400);
    }
}