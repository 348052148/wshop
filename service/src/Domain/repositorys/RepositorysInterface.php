<?php
namespace Service\Domain\repositorys;

interface RepositorysInterface {
    public function getEntity();

    public function getTable();

    public function setTableGateway($tableGateway);

    public function getTableGateway();
}