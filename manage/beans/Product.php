<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/6
 * Time: 18:02
 */
class Product{
    public $goodname;
    public $price;
    public $intro;
    public $size;
    public $img;
    public $count;

    function __construct($goodname,$price,$intro,$size,$img,$count)
    {
        $this->goodname = $goodname;
        $this->price = $price;
        $this->intro = $intro;
        $this->size = $size;
        $this->img = $img;
        $this->count = $count;
    }
}