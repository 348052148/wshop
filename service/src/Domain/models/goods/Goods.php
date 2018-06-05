<?php
namespace Service\Domain\models\goods;

use Service\Domain\models\EntityInterface;

class Goods  implements EntityInterface {
    public $id;
    public $sku;
    public $title;
    public $subTitle;
    public $pic;
    public $specificat; // 规格
    public $originalPrice; //原价
    public $categoryId;
    public $type;
    public $mode;
    public $tags;
    public $desc;
    public $specifs;

    public function __construct()
    {

    }

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->sku = !empty($data['sku']) ? $data['sku'] : null;
        $this->title = !empty($data['title']) ? $data['title'] : null;
        $this->subTitle = !empty($data['subTitle']) ? $data['subTitle'] : null;
        $this->pic = !empty($data['pic']) ? $data['pic'] : null;
        $this->originalPrice = !empty($data['originalPrice']) ? $data['originalPrice'] : null;
        $this->categoryId = !empty($data['categoryId']) ? $data['categoryId'] : null;
        $this->type = !empty($data['type']) ? $data['type'] : null;
        $this->tags = !empty($data['tags']) ? explode(';',$data['tags']) : [];
        $this->mode = !empty($data['mode']) ? $data['mode'] : [];
        $this->desc = !empty($data['desc']) ? $data['desc'] : [];

        $this->specificat = [];
        $specifArr = !empty($data['specif']) ? explode(':',$data['specif']) : [];
        $specifTitle = !empty($data['specifTitle']) ? explode(':',$data['specifTitle']) : [];
        foreach ($specifArr as $i=>$specif){
            $this->specificat[] = ['name'=>$specifTitle[$i],'units'=>$specif];
        }
    }

    public function exchangeData()
    {
        $specif = '';
        $specifTitle = '';

        foreach ($this->specificat as $specifcat){
            $specif .= $specifcat->units.":";
            $specifTitle .= $specifcat->name;
        }

        $data = [
            'sku' => $this->sku,
            'title'  => $this->title,
            'subTitle'  => $this->subTitle,
            'pic'  => $this->pic,
            'originalPrice'  => $this->originalPrice*100,
            'categoryId'  => $this->categoryId,
            'type'  => $this->type,
            'mode' =>$this->mode,
            'tags' => implode(';',$this->tags),
            'specif' => $specif,
            'specifTitle' => $specifTitle,
        ];
        return $data;
    }


}