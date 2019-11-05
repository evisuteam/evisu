<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/4
 * Time: 16:25
 */
class Address{
    public $userId;
    public $name;
    public $tel;
    public $region;//地区
    public $address;//
    public $status;//

    function __construct($userId,$name,$tel,$region,$address,$status)
    {
        $this->userId;
        $this->name;
        $this->tel;
        $this->region;
        $this->address;
        $this->status;
    }
}