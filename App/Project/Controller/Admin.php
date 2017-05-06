<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class  Admin extends Controller {

    public function action(){

        $model = new UserModel();
        $data = $model->getData();

        //给 view 赋值
        $this->assign('id',$data['id'])->assign('data',$data['data'])->assign('arr',$data['dataArr']);

        //显示视图
        $this->display('info.html');
    }
}