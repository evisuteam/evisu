<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 17:11
 */
require_once('../model/ProductService.php');
require_once('../beans/Product.php');

$service = new ProductService();
$type = $_POST['type'];
switch($type){
    case 'insert':
        $type1 = $_POST['type1'];
        $type2 = $_POST['type2'];
        $goodname = $_POST['goodname'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $number = $_POST['number'];
        $count = $_POST['count'];
        $img = $_POST['img'];
        $imglist = $_POST['imglist'];
        $detail = $_POST['detail'];
        $pro = new Product($type1,$type2,$goodname,$size,$price,$number,$count,$img,$imglist,$detail);
        $service->insertProduct($pro);
        break;
    case 'delete':
        $id = $_POST['id'];
        $service->deleteProduct($id);
        break;
    case 'select':
        $service->selectProduct();
        break;
    case 'update':
        $id = $_POST['id'];
        $type1 = $_POST['type1'];
        $type2 = $_POST['type2'];
        $goodname = $_POST['goodname'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $number = $_POST['number'];
        $count = $_POST['count'];
        $img = $_POST['img'];
        $imglist = $_POST['imglist'];
        $detail = $_POST['detail'];
        $pro = new  Product($type1,$type2,$goodname,$size,$price,$number,$count,$img,$imglist,$detail);
        $service->updateProduct($id,$pro);
        break;

}
