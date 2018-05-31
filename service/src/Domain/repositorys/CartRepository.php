<?php
namespace Service\Domain\repositorys;




use Service\Domain\models\cart\Cart;
use Zend\Db\Exception\RuntimeException;

class CartRepository implements RepositorysInterface {

    private $tableGateway;

    public function getEntity()
    {
        return Cart::class;
    }

    public function getTable()
    {
        return 'cart';
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }

    public function setTableGateway($tableGateway)
    {
       $this->tableGateway = $tableGateway;
    }

    public function findAll(){

        return $this->tableGateway->select();
    }

    public function findOne($id){

        $id = (int) $id;

        $rowset = $this->tableGateway->select(['id'=>$id]);

        $row = $rowset->current();

        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                1
            ));
        }

        return $row;
    }

    public function save(Cart $cart)
    {
        $data = [
            'artist' => $cart->uid,
            'title'  => $cart->title,
        ];

        $id = (int) $cart->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->findOne($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}