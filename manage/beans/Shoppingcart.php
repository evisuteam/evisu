<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/6
 * Time: 9:05
 */
class Shoppingcart{
    public $userId;
    public $goodId;
    public $size;
    public $count;

    function __construct($userId,$goodId,$size,$count)
    {
        $this->userId = $userId;
        $this->goodId = $goodId;
        $this->size = $size;
        $this->count = $count;
    }
}