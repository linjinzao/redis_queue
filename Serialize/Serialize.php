<?php
namespace RedisQueue\Serialize;

class Serialize
{
    public function serialize($array)
    {
        $className = $array['serialize'];
        if(!class_exists($className)){
            throw new Error("class is not exists!");
        }
        $serialize = new $calssName();
        return $serialize->doSerialize($array);
    }
}