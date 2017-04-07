<?php

namespace App\Core;

class Controller{
    public $data = [];

    public function assign($key=null,$value = null)
    {
        if (!array_key_exists($key,$this->data)) {
            $this->data[$key] = $value;
        }
        return $this;
    }

    public function display($viewName){

        $filePath = 'App/Project/View/'.$viewName;
        if (is_file($filePath) && file_exists($filePath)){
            ob_start();
            extract($this->data);
            include $filePath;
            $echo_out = ob_get_contents();
            $echo_out = str_replace('__ROOT__',$_SERVER['SCRIPT_NAME'],$echo_out);
            ob_end_clean();
//            \App\Core\Cache\Cache::set(cacheVar('url'),$echo_out);

            echo  $echo_out;

        }
    }
    private function outPut($out_string){
        if (empty($out_string)){
            echo '变量为空！';
        }else{
            echo  $out_string;
        }
    }
}