<?php
namespace App\Project\Controller;

use Core\Controller;
use App\Project\Model\UserModel;

class  Admin extends Controller {

    public function action(array $param = null){
        //从model获取数据

        $model = new UserModel();
        $data = $model->getData();
        
        //给 view 赋值
        $this->assign('id',$data['id'])->assign('data',$data['data'])->assign('arr',$data['dataArr']);

        //显示视图
        $this->display('info.html');
    }
}