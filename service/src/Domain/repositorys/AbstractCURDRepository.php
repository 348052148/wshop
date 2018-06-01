<?php
namespace Service\Domain\repositorys;

use Service\Domain\models\EntityInterface;

abstract class  AbstractCURDRepository implements RepositorysInterface {

    protected $tableGateway;

    public function getTableGateway()
    {
        return $this->tableGateway;
    }
    public function setTableGateway($tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function save(EntityInterface $entity)
    {

        $data = $entity->exchangeData();

        $id = (int) $entity->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->findById($id)) {
            throw new \RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function findAll(){

        return $this->tableGateway->select();
    }

    public function findById($id){

        $id = (int) $id;

        $rowset = $this->tableGateway->select(['id'=>$id]);

        $row = $rowset->current();

        if (! $row) {
            throw new \RuntimeException(sprintf(
                'Could not find row with identifier %d',
                1
            ));
        }

        return $row;
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}