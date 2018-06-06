<?php
namespace Api\Controller;

class ApiController extends BaseApiController {

    private $microService;

    public function __construct($microService)
    {
        $this->microService = $microService;
    }

    public function homeAction(){

        $data = [
            'navBarList' => [

            ],
            'blocks' => []
        ];

        //nav
        $data['navBarList'] = [
            [
                'title'=>'新品优惠',
                'pic'=>'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
                'url'=>''
            ],
            [
                'title'=>'新品优惠',
                'pic'=>'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
                'url'=>''
            ],
            [
                'title'=>'新品优惠',
                'pic'=>'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
                'url'=>''
            ]
        ];

        //newGoodsList
        $goodsService = $this->microService->get('GoodsService');

        $goodsList = $goodsService->goodsLst([]);

        $data['newGoodsList'] = [
//            ['sku'=>'20180607_001','title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
//            ['sku'=>'20180607_001','title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
//            ['sku'=>'20180607_001','title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
//            ['sku'=>'20180607_001','title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
//            ['sku'=>'20180607_001','title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png']
        ];

        $xianshi = [];

        $i = 0;

        $banjia = [];

        foreach ($goodsList as $goods){

            if($i<4){
                array_push($xianshi,[
                    'sku'=>$goods->sku,
                    'title'=>$goods->title,
                    'price' => number_format($goods->price/100,2),
                    'pic' => $goods->pic
                ]);
            }

            if($i>=4&&$i<8){
                array_push($banjia,[
                    'sku'=>$goods->sku,
                    'title'=>$goods->title,
                    'price' => number_format($goods->price/100,2),
                    'pic' => $goods->pic
                ]);
            }

            $i++;


        }

        //blocks
        $data['blocks'] = [
            [
                'title'=> '限时特价',
                'list' => $xianshi

            ],

            [
                'title'=> '第二件半价',
                'list' => $banjia

            ],
        ];



        return $this->success($data);
    }

    public function newGoodsListAction(){

        $page = $this->request->getQuery('page');

        $goodsService = $this->microService->get('GoodsService');

        $goodsList = $goodsService->goodsLst(['page'=>$page]);

        $data = [
          'newGoodsList' => []
        ];

        foreach ($goodsList as $goods) {
            array_push($data['newGoodsList'], [
                'sku' => $goods->sku,
                'title' => $goods->title,
                'price' => number_format($goods->price / 100, 2),
                'pic' => $goods->pic
            ]);
        }

        return $this->success($data);
    }


    private function generateTree(&$tree,$categoryTree,$pid){

        foreach ($categoryTree[$pid] as $category){
            $category->categoryPic = preg_replace('/img.ismbao.com/','weixin.ismbao.com',$category->categoryPic);
            $treeTemp = [
                'title' => $category->categoryName,
                'pic' => empty($category->categoryPic)?'':$category->categoryPic,
                'list' => []
            ];
            if(!empty($categoryTree[$category->id])){
                $this->generateTree($treeTemp['list'],$categoryTree,$category->id);
            }

            $tree[] = $treeTemp;

        }

    }

    /**
     * 渲染商品类目
     */
    public function catAction(){

        $categoryService = $this->microService->get('CategoryService');
        //categoryTree

        $categoryTree = $categoryService->categoryTree();


        $tree = [];

        $this->generateTree($tree,$categoryTree,0);


        $data = [
                'cat'=>[

                    [
                        'text' => '烟酒饮料',
                        'list'=>[
                            [
                                'title' => '白酒',
                                'pic' => '',
                                'list' => [
                                    ['title' => '瓶装白酒','pic'=>'']
                                ]
                            ],
                        ]
                    ],



                ]
        ];

        $data['cat'] = $tree;

        return $this->success($data);
    }

    /**
     * 购物车数据
     */
    public function cartAction(){
        /**
         * cartInfo:{
        goodsList:[
        {
        title:'为家清洁毛巾',
        pic:'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png',
        specifText:'ping',
        units:1,
        num:1,
        price:14,
        total:14,
        isCheck:false,
        },
        {
        title:'为家清洁毛巾',
        pic:'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png',
        specifText:'ping',
        units:1,
        num:1,
        price:14,
        total:14,
        isCheck:true,
        },
        ],
         */
        $cartService = $this->microService->get('CartService');
        $cartList = $cartService->cartByUid(['uid'=> 1]);

        $data = [
            'cartInfo' => [
                'goodsList' => [
//                     [
//                         'title' => '为家清洁毛巾',
//                         'pic' => 'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png',
//                         'specifText' => '瓶',
//                         'units' => 1,
//                         'sku' => '2312312312',
//                         'num' => 2,
//                         'price' => 14,
//                         'isCheck'=>false,
//                     ]
                ],
                'totalPrice'=> 0,
            ]
        ];

        foreach ($cartList as $cartItem){
            array_push($data['cartInfo']['goodsList'],[
                'title' => $cartItem->title,
                'pic' => empty($cartItem->pic)?'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png':$cartItem->pic,
                'specifText' => $cartItem->specifText,
                'units' => $cartItem->units,
                'sku' => $cartItem->sku,
                'num' => $cartItem->num,
                'price' => $cartItem->price/100,
                'isCheck'=>false,
            ]);
        }

        return $this->success($data);
    }


    public function userAction(){

        $data = [
            'userInfo'=>[
              'nickname' => '～～～～',
              'tourl' => '/login',
              'dpay' => 0,
              'df' => 0,
              'ds' =>0,
              'dp' =>5
            ]
        ];
        return $this->success($data);
    }


    public function addressListAction(){
        $userService = $this->microService->get('UserService');

        $addressList = $userService->addressList();

        $data = [
            'list'=>
            [
//                ['id' => 1,
//                'name' => '张三',
//                'tel' => '18523922789',
//                'address' => '浙江省杭州市西湖区文三路 138 号东方通信大厦 7 楼 501 室'
//                ],
//                ['id' => 2,
//                    'name' => '利斯',
//                    'tel' => '18523922789',
//                    'address' => '浙江省杭州市西湖区文三路 138 号东方通信大厦 7 楼 501 室'
//                ]
            ],
            'default' => 1,
        ];

        foreach ($addressList as $address){
            array_push($data['list'],[
               'id' => $address->id,
               'name' => $address->name,
               'tel' =>$address->tel,
               'address' => $address->addressDetail
            ]);

            if($address->isDefault == 1){
                $data['default'] = $address->id;
            }
        }

        return $this->success($data);
    }

    public function setDefaultAction(){
        $userService = $this->microService->get('UserService');

        $userService->setDefaultAddress([
           'id' => $this->request->getQuery('id')
        ]);

        return $this->success([]);
    }

    public function addressAction(){
        /**
         * addressInfo:{
        id: '1',
        name: '张三',
        tel: '13000000000',
        province:'',
        city:'',
        county:'',
        address_detail:'浙江省杭州市西湖区文三路 138 号东方通信大厦 7 楼 501 室',
        area_code:'',
        postal_code:'',
        is_default:false
        }
         */

        $userService = $this->microService->get('UserService');



        $id = $this->request->getQuery('id');

        if(empty($id)){
            return $this->success([
                'addressInfo' => []
            ]);
        }

        $address = $userService->getAddressByid(['id'=>$id]);

        $data = [
            'addressInfo' =>[
                'id'=> $address->id,
                'name' => $address->name,
                'tel' => $address->tel,
                'province' => $address->province,
                'city' => $address->city,
                'county' => $address->county,
                'address_detail' => $address->addressDetail,
                'area_code' => $address->areaCode,
                'postal_code' => $address->postalCode,
                'is_default'=> ($address->isDefault==1)?true:false
            ]
        ];

        return $this->success($data);
    }

    public function saveAddressAction(){
        /**
         * addressInfo	{"id":1,"name":"~~~~","tel":"18523922709","province":"重庆","city":"重庆","county":"豫北","address_detail":"浙江省杭州市西湖区文三路+138+号东方通信大厦+7+楼+501+室","area_code":"10010001001","postal_code":"640001","is_default":true}
         */

        $addressInfo = json_decode($this->request->getQuery('addressInfo'),true);
//        $address->uid = $addressDto['uid'];
//        $address->isDefault = $addressDto['isDefault'];
//        $address->postalCode = $addressDto['postalCode'];
//        $address->areaCode = $addressDto['areaCode'];
//        $address->county = $addressDto['county'];
//        $address->city = $addressDto['city'];
//        $address->province = $addressDto['province'];
//        $address->name = $addressDto['name'];
//        $address->tel = $addressDto['tel'];

        $data = [
          'name' => $addressInfo['name'],
          'tel' => $addressInfo['tel'],
          'province' => $addressInfo['province'],
          'city' => $addressInfo['city'],
          'county' => $addressInfo['county'],
          'addressDetail' => $addressInfo['address_detail'],
          'areaCode' => $addressInfo['area_code'],
          'postalCode' => $addressInfo['postal_code'],
          'isDefault' => $addressInfo['is_default'],
          'uid' => 1,
        ];

        $userService = $this->microService->get('UserService');

        $userService->addAddress($data);

        return $this->success([]);
    }

    public function deleteAddressAction(){
        $id = $this->request->getQuery('id');

        $userService = $this->microService->get('UserService');

        $userService->deleteAddress(['id'=>$id]);

        return $this->success([]);
    }

    public function goodsAction(){

        $goodsService = $this->microService->get('GoodsService');

        /**
         * public $id;
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
         */

        $sku = $this->request->getQuery('sku');

        $goods = $goodsService->getGoodsBySku(['sku'=>$sku]);

        $data = [
            'goodsInfo' => [
                'title' =>   $goods->title,
                'sku' => $goods->sku,
                'price' => '12.00',
                'organalPrice' => $goods->originalPrice/100,
                'pic' => 'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
                'pics' => [
//                    'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
//                    'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
//                    'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png'
                ],
                'units' => 1,
                'saleVolume' => 100,
                'specifTitle' => '瓶',
                'specif' => [
//                    ['units'=>1,'title'=>'瓶','pic'=>'https://img.yzcdn.cn/1.jpg','price'=>100],
//                    ['units'=>12,'title'=>'瓶','pic'=>'https://img.yzcdn.cn/1.jpg','price'=>1200]
                ],
            ]
        ];

        foreach ($goods->specifs as $specif){
            array_push($data['goodsInfo']['specif'],[
                'units' => $specif->units,
                'title' => $specif->title,
                'pic' => $specif->pic,
                'price' => $specif->price,
                'originalPrice' => $specif->originalPrices,
            ]);
            if($specif->isDefault == 1){
                $data['goodsInfo']['price'] = number_format($specif->price/100,2);
                $data['goodsInfo']['units'] = $specif->units;
                $data['goodsInfo']['specifTitle'] = $specif->title;
                $data['goodsInfo']['pic'] = $specif->pic;
            }
            array_push($data['goodsInfo']['pics'],$specif->pic);
        }

        return $this->success($data);
    }

    public function addCartAction(){
        $goods = json_decode($this->request->getQuery('goods'),true);
        //string(43) "{"sku":"20180607_002","units":"12","num":1}"
        $cartService = $this->microService->get('CartService');

        $cartService->addGoods2Cart(['goods'=>$goods]);

        return $this->success([]);
    }


    public function goodsListAction(){

        /**
         * goodsList:[
        {
        title:'马来西亚原装进口 过山车(GOTOGO)麦糯糯浓醇巧克力味蛋糕卷 480克（20克×24）',
        price:100,
        pic:'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'
        },
        {
        title:'马来西亚原装进口 过山车(GOTOGO)麦糯糯浓醇巧克力味蛋糕卷 480克（20克×24）',
        price:100,
        pic:'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'
        },
        {
        title:'马来西亚原装进口 过山车(GOTOGO)麦糯糯浓醇巧克力味蛋糕卷 480克（20克×24）',
        price:100,
        pic:'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'
        },
        {
        title:'马来西亚原装进口 过山车(GOTOGO)麦糯糯浓醇巧克力味蛋糕卷 480克（20克×24）',
        price:100,
        pic:'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'
        },
        {
        title:'马来西亚原装进口 过山车(GOTOGO)麦糯糯浓醇巧克力味蛋糕卷 480克（20克×24）',
        price:100,
        pic:'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'
        }
        ]
         */
        $page = $this->request->getQuery('page');

        $keyword = $this->request->getQuery('keyword');

        $categoryId = $this->request->getQuery('categoryId');

        $goodsService = $this->microService->get('GoodsService');

        $goodsList = $goodsService->searchGoodsList([
            'keyword'=>$keyword,
            'class_id'=>$categoryId,
            'page'=>$page,
            'pageSize' => 8
        ]);

        $data = [
            'goodsList'=> [
//                [
//                    'title'=>'马来西亚原装进口 过山车(GOTOGO)麦糯糯浓醇巧克力味蛋糕卷 480克（20克×24）',
//                    'price' => 100,
//                    'sku' => '20180607_001',
//                    'pic' => 'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'
//                ]
            ]
       ];
        foreach ($goodsList as $goods){
            array_push($data['goodsList'],[
                'title'=>$goods->title,
                'price' => number_format($goods->price/100,2),
                'sku' => $goods->sku,
                'pic' => $goods->pic
            ]);
        }

        return $this->success($data);
    }


    public function preOrderAction(){
        $orderService = $this->microService->get('OrderService');

        $goodsList = $this->request->getQuery('goodsList');
        foreach ($goodsList as $i=>$goods){
            $goodsList[$i] = json_decode($goods,true);
        }

        $order = $orderService->preCreateOrder(['goodsList'=>$goodsList]);

        if(empty($order->title)){
            return $this->error('商品不存在');
        }

        foreach ($order->goodsList as &$goods){
            $goods['price'] = $goods['price']/100;
            $goods['total'] = $goods['total']/100;
        }

        $data = [
            'orderInfo'=>[
                'address' => [
                    'name' => $order->address['name'],
                    'tel' => $order->address['tel'],
                    'address' => $order->address['address']
                ],
                'sendType' => $order->sendType,
                'sendTime' => $order->sendTime,
                'payType' => $order->payType,
                'goodsList' => $order->goodsList,
                'status' => $order->status,
                'fList' => $order->fList,
                'price' => $order->price,
                'remark' => $order->remark,
                'orderCode' => $order->orderCode
            ],
            'sendType' =>[

            ]
        ];

        $startTime = time();

        for (;$startTime < strtotime(date('Y-m-d',time()).' 22:00:00');$startTime+=1800){
            array_push($data['sendType'],[
                'title'=> date('H:i',$startTime)."~".date('H:i',$startTime+1800),
                'type' => 1,
                'time' => $startTime
            ]);
        }


        return $this->success($data);
    }

    public function submitOrderAction(){
        $order = json_decode($this->request->getQuery('orderInfo'),true);

        $orderService = $this->microService->get('OrderService');

        $orderService->createOrder([
            'order' => $order
        ]);
        /**
         * {"address":{"name":"周辉","tel":"18523922709","address":"浙江省杭州市西湖区文三路+138+号东方通信大厦+7+楼+501+室"},
         * "sendType":1,"sendTime":1528253193,"payType":1,
         * "goodsList":[{"title":"洽洽怪味花生五香味68g","pic":"http://weixin.ismbao.com/upload/201801/13/1515804761231472.jpg","specif":{"title":"包","units":"1"},"price":3,"num":"1","total":3}],
         * "fList":[{"title":"收取运费","price":2}],
         * "price":300,"remark":"无","orderCode":"JXXX1230123"}
         */
        $data = [];
        return $this->success($data);
    }

    public function orderListAction(){

        $status = $this->request->getQuery('status');

        $orderService = $this->microService->get('OrderService');

        $orderList = $orderService->orderList(['page'=>0,'status'=>$status]);

        $data = [
          'list' => [

          ]
        ];

        $orderStatus =[
            1 => '待支付',
            2 => '待发货',
            3 => '配送中',
            4 => '已取消',
            5 => '已完成',
            6 => '已评价'
        ];

        foreach ($orderList as $order){
            array_push($data['list'],[
                'id' => $order->id,
                'address' => $order->address,
                'sendType' => $order->sendType,
                'sendTime' => $order->sendTime,
                'payType' => $order->payType,
                'goodsList' => $order->goodsList,
                'status' => $order->status,
                'fList' => $order->fList,
                'price' => $order->price,
                'remark' => $order->remark,
                'orderCode' => $order->orderCode,
                'orderStatus' => $orderStatus[$order->status]
            ]);
        }

        return $this->success($data);
    }
}