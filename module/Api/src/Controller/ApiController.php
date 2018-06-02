<?php
namespace Api\Controller;

class ApiController extends BaseApiController {


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

        //blocks
        $data['blocks'] = [
          [
              'title'=> '限时特价',
              'list' => [
                  ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
                  ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
                  ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
                  ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
              ]

          ],

            [
                'title'=> '第二件半价',
                'list' => [
                    ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
                    ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
                    ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
                    ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
                ]

            ],
        ];

        //newGoodsList

        $data['newGoodsList'] = [
            ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
            ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
            ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
            ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'],
            ['sku'=>1,'title'=>'统一鲜橙多','price'=>'2.5','pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png']
        ];



        return $this->success($data);
    }



    public function catAction(){

        $data = [
            [
                'text' => '烟酒饮料',
                'list'=>[
                    'title' => '白酒',
                    'pic' => '',
                    'list' => [
                        'title' => '瓶装白酒','pic'=>''
                    ]
                ]
            ],

        ];

        return $this->success($data);
    }

    public function cartAction(){
        $data = [];

        return $this->success($data);
    }


    public function userAction(){

        $data = [
          'nickname' => '～～～～',
          'tourl' => '/login',
          'dpay' => 0,
          'df' => 0,
          'ds' =>0,
          'dp' =>5
        ];
        return $this->success($data);
    }


    public function addressListAction(){

        $data = [
            'list'=>
            [
                'id' => 1,
                'name' => '张三',
                'tel' => '18523922789',
                'address' => '浙江省杭州市西湖区文三路 138 号东方通信大厦 7 楼 501 室'
            ],
            'default' => 1,
        ];

        return $this->success($data);
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
        $data = [
            'id'=>1,
            'name' => '~~~~',
            'tel' => '18523922709',
            'province' => '重庆',
            'city' => '重庆',
            'county' => '豫北',
            'address_detail' => '浙江省杭州市西湖区文三路 138 号东方通信大厦 7 楼 501 室',
            'area_code' => '10010001001',
            'postal_code' => '640001',
            'is_default'=> true
        ];

        return $this->success($data);
    }

    public function goodsAction(){

        $data = [
            'title' =>   '思蕴语露面巾 （颜色随机 毛巾）',
            'sku' => '12312312',
            'price' => '24.00',
            'organalPrice' => '28.00',
            'pic' => 'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
            'pics' => [
                'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
                'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png',
                'http://img.zcool.cn/community/019f4e57207bc432f875a3990cbb6b.PNG@1280w_1l_2o_100sh.png'
            ],
            'units' => 1,
            'saleVolume' => 100,
            'specifTitle' => '瓶',
            'specif' => [
                ['units'=>1,'title'=>'瓶','pic'=>'https://img.yzcdn.cn/1.jpg','price'=>1],
                ['units'=>12,'title'=>'瓶','pic'=>'https://img.yzcdn.cn/1.jpg','price'=>12]
            ],

        ];

        return $this->success($data);
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
        $data = [
            [
                'title'=>'马来西亚原装进口 过山车(GOTOGO)麦糯糯浓醇巧克力味蛋糕卷 480克（20克×24）',
                'price' => 100,
                'pic' => 'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png'
            ]
        ];

        return $this->success($data);
    }


    public function preOrderAction(){

        $data = [
            'orderInfo'=>[
                'address' => [
                    'name' => '~~~~',
                    'tel' => '18523922789',
                    'address' => '重庆市渝北区环山国际'
                ],
                'sendType' => 1,
                'sendTime' => time(),
                'payType' => 1,
                'goodsList' => [
                    [
                        'title' =>'农夫山泉550ml',
                        'pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png',
                        'specif'=>['title'=>'瓶','units'=>1],
                        'price'=>2.5,
                        'num'=>2,
                        'total'=>5
                    ]
                ],
                'fList' => [
                    [
                        'title' => '收取运费',
                        'price' => 2
                    ]
                ],
                'price' => 700,
                'remark' => '',
                'orderCode' => 'JXHY10923213'
            ],
            'sendType' =>[
                ['title'=>'18:30 - 19:00','type'=>1,'time'=>time()]

            ]
        ];

        return $this->success($data);
    }

    public function orderListAction(){
        $data = [
          'list' => [
              [
                  'address' => [
                      'name' => '~~~~',
                      'tel' => '18523922789',
                      'address' => '重庆市渝北区环山国际'
                  ],
                  'sendType' => 1,
                  'sendTime' => time(),
                  'payType' => 1,
                  'goodsList' => [
                      [
                          'title' =>'农夫山泉550ml',
                          'pic'=>'http://weixin.ismbao.com/tb/80x80/upload/201805/19/1526697380869576.png',
                          'specif'=>['title'=>'瓶','units'=>1],
                          'price'=>2.5,
                          'num'=>2,
                          'total'=>5
                      ]
                  ],
                  'fList' => [
                      [
                          'title' => '收取运费',
                          'price' => 2
                      ]
                  ],
                  'price' => 700,
                  'remark' => '',
                  'orderCode' => 'JXHY10923213'
              ]
          ]
        ];
        return $this->success($data);
    }
}