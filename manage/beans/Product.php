<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/6
 * Time: 18:02
 */
<<<<<<< HEAD
class Pro{
    public $type1;
    public $type2;
=======
class Product{
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
    public $goodname;
    public $price;
    public $intro;
    public $size;
    public $img;
<<<<<<< HEAD
    public $imglist;
    public $detail;
//    public $showimglist;

    function __construct($type1,$type2,$goodname,$size,$price,$number,$count,$img,$imglist,$detail)
    {
        $this->Type1 = $type1;
        $this->Type2 = $type2;
=======
    public $count;

    function __construct($goodname,$price,$intro,$size,$img,$count)
    {
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
        $this->goodname = $goodname;
        $this->price = $price;
        $this->intro = $intro;
        $this->size = $size;
        $this->img = $img;
<<<<<<< HEAD
        $this->imglist = $imglist;
        $this->detail = $detail;
//        $this->showimglist = $showimglist;
=======
        $this->count = $count;
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
    }
}