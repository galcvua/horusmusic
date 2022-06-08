<?php
namespace App\Service;
abstract class Figure{
    protected $data = [];
    public function toArray() {
        return $this->data;
    }
    function __get($name) {
        return $this->data[$name];
    }
}