<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 22:04
 */
class Order{
//    public $userId;
    public $goodlist;
    public $timeset;
    public $status;
    public $number;

    function __construct($goodlist,$timeset,$status,$number)
    {
        $this->goodlist = $goodlist;
        $this->timeset = $timeset;
        $this->status = $status;
        $this->number = $number;
    }
}