<?php

namespace App\Model;

class  UserModel{

    public function getData()
    {
        return ['id'=>1000,
                'name'=>'lll',
                'data'=>'这是一条数据',
                'dataArr'=>[1,3,4,5,6,6,77,4,4,4,3,2,3,4,5,547,5747,7,54],
                'update' => time()
        ];
    }
}