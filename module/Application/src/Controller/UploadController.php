<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class UploadController extends AbstractActionController{

    public function indexAction(){
        /**
         * array(1) {
        ["file"]=>
        array(5) {
        ["name"]=>
        string(38) "u=1972873509,2904368741&fm=27&gp=0.jpg"
        ["type"]=>
        string(10) "image/jpeg"
        ["tmp_name"]=>
        string(14) "/tmp/phpWCQ8Tv"
        ["error"]=>
        int(0)
        ["size"]=>
        int(31019)
        }
        }
         */

        $des = 'upload/images/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],$des);



        die(json_encode(['code'=>0,'file'=>$des]));

    }
}