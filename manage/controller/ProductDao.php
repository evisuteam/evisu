<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/6
 * Time: 18:01
 */
require_once ('../model/ProductService.php');
require_once ('../beans/Product.php');

<<<<<<< HEAD

$service = new ProductService();

=======
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
$type = $_POST['type'];
$service = new ProductService();

switch($type){
    case 'insert':
<<<<<<< HEAD
        $type1 = $_POST['type1'];
        $type2 = $_POST['type2'];
=======
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
        $goodname = $_POST['goodname'];
        $price = $_POST['price'];
        $intro = $_POST['intro'];
        $size = $_POST['size'];
        $img = $_POST['img'];
<<<<<<< HEAD
        $imglist = $_POST['imglist'];
        $detail = $_POST['detail'];
//        $showimglist = $_POST['showimglist'];
        $pro = new Pro($type1,$type2,$goodname,$size,$price,$number,$count,$img,$imglist,$detail);
=======
        $count = $_POST['count'];
        $pro = new Product($goodname,$price,$intro,$size,$img,$count);
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
        $service->insertProduct($pro);
        break;
    case 'delete':
        $id = $_POST['id'];
        $service->deleteProduct($id);
        break;
    case 'update':
        $id = $_POST['id'];
<<<<<<< HEAD
        $type1 = $_POST['type1'];
        $type2 = $_POST['type2'];
=======
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
        $goodname = $_POST['goodname'];
        $price = $_POST['price'];
        $intro = $_POST['intro'];
        $size = $_POST['size'];
        $img = $_POST['img'];
<<<<<<< HEAD
        $imglist = $_POST['imglist'];
        $detail = $_POST['detail'];

        $pro = new Pro($type1,$type2,$goodname,$size,$price,$number,$count,$img,$imglist,$detail);
=======
        $count = $_POST['count'];
        $pro = new Product($goodname,$price,$intro,$size,$img,$count);
>>>>>>> ab75cd5b5afc9846df37f89885379c62ed3b825f
        $service->updateProduct($id,$pro);
        break;
    case 'select':
        $service->selectProduct();
        break;
}