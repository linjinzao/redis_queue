<?php

namespace RedisQueue\Service;

abstract class AService
{
    /**
     * 连接对象
     */
    protected $connectObj;
    /**
     * 生产者执行结果
     */
    protected $res;
    /**
     * 序列器
     */
    protected $serialize;
    /**
     * 连接对象
     */
    public abstract function connect();
    /**
     * 获取连接对象
     */
    public abstract function getConnect();
    /**
     * 发送消息到队列服务器
     */
    public abstract function send(array $array);
}