<?php
namespace RedisQueue\Serialize;

include_once("ISerialize.php");
class JsonSerialize implements ISerialize
{
    /**
     * 序列化
     */
    public function doSerialize(array $array)
    {
        return json_encode($array);
    }

    /**
     * 反序列化
     */
    public function unSerialize($str)
    {
        return json_decode($str,true);
    }
}