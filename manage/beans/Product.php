<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/4
 * Time: 16:34
 */
class Pro{
    public $type1;
    public $type2;
    public $goodname;
    public $size;
    public $price;
    public $number;
    public $count;
    public $img;
    public $imglist;
    public $detail;
//    public $showimglist;

    function __construct($type1,$type2,$goodname,$size,$price,$number,$count,$img,$imglist,$detail)
    {
        $this->Type1 = $type1;
        $this->Type2 = $type2;
        $this->goodname = $goodname;
        $this->size = $size;
        $this->price = $price;
        $this->number = $number;
        $this->count = $count;
        $this->img = $img;
        $this->imglist = $imglist;
        $this->detail = $detail;
//        $this->showimglist = $showimglist;
    }
}