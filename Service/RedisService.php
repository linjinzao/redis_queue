<?php

namespace RedisQueue\Service;

use Predis;
use RedisQueue\Serialize\Serialize;
include_once("AService.php");
include_once("../config.php");
class RedisService extends AService
{
    public function __construct()
    {
        $this->serialize = new Serialize();
    }
    public function connect()
    {
        $this->connectObj = new Client($config['redis']);
    }

    public function getConnect()
    {
        return $this->connectObj;
    }

    /**
     * 
     * @param array['serialize']  序列器
     * @param array['topic']  主题
     * @param array['key'] 分区
     * @param array['value']  
     */
    public function send($array,$callback = "")
    {
        //TODO 序列化 回调函数处理  分区处理
        $serialize = $this->doSerialize($array);
        $key = $array['topic'].":".$array['key'];
        $this->res =$this->connectObj->lpush($key,$str);
        if($callback == ""){
            return $this;
        }
    }
    /**
     * 获取队列执行结果
     */
    public function getRes()
    {
        return $this->res;
    }

    //序列化
    protected function doSerialize($array)
    {
        return $this->serialize->serialize($array);
    }
}