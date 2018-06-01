<?php
namespace Service\Domain\models;

interface EntityInterface {

    public function exchangeArray(array $data);

    public function exchangeData();

}