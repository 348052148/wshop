<?php
namespace Servcie\Domain\goods;

class Specificat {

    private $specificatName; //规格名称

    private $specificatUnit; //规格单位

    public function __construct($name,$units)
    {
        $this->specificatName = $name;
        $this->specificatUnit = $units;
    }
}