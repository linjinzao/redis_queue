<?php
namespace RedisQueue\Serialize;

interface ISerialize
{
    /**
     * 序列化
     * 
     */
    public function doSerialize(array $array);

    /**
     * 反序列化
     */
    public function unSerialize($str);
}