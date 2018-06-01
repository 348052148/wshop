<?php
namespace Service\Domain\repositorys;

use Service\Domain\models\category\Category;
use Zend\Db\Exception\RuntimeException;

class CategoryRepository implements RepositorysInterface {

    private $tableGateway;

    public function getTable()
    {
        return 'category';
    }

    public function getEntity()
    {
        return Category::class;
    }

    public function setTableGateway($tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }


    public function findById($id){
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


    public function findAll(){
        return $this->tableGateway->select();
    }

    public function save(Category $category)
    {

        $data = [
            'categoryName' => $category->categoryName,
            'pCategoryId' => $category->pCategoryId,
            'categoryCode' => $category->categoryCode,
            'categoryAttr' => $category->categoryAttr,
            'categoryPic' => $category->categoryPic,
            'isShow' => $category->isShow
        ];

        $id = (int) $category->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->findById($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }
}