<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/4
 * Time: 16:34
 */
class Pro{
    public $Type1;
    public $Type2;
    public $goodname;
    public $size;
    public $price;
    public $number;
    public $count;
    public $img;
    public $imglist;
    public $detail;
    public $showimglist;

    function __construct($Type1,$Type2,$goodname,$size,$price,$number,$count,$img,$imglist,$detail,$showimglist)
    {
        $this->Type1 = $Type1;
        $this->Type2 = $Type2;
        $this->goodname = $goodname;
        $this->size = $size;
        $this->price = $price;
        $this->number = $number;
        $this->count = $count;
        $this->img = $img;
        $this->imglist = $imglist;
        $this->detail = $detail;
        $this->showimglist = $showimglist;
    }
}