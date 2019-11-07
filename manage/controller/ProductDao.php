<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/6
 * Time: 18:01
 */
require_once ('../model/ProductService.php');
require_once ('../beans/Product.php');

$type = $_POST['type'];
$service = new ProductService();

switch($type){
    case 'insert':
        $goodname = $_POST['goodname'];
        $price = $_POST['price'];
        $intro = $_POST['intro'];
        $size = $_POST['size'];
        $img = $_POST['img'];
        $count = $_POST['count'];
        $pro = new Product($goodname,$price,$intro,$size,$img,$count);
        $service->insertProduct($pro);
        break;
    case 'delete':
        $id = $_POST['id'];
        $service->deleteProduct($id);
        break;
    case 'update':
        $id = $_POST['id'];
        $goodname = $_POST['goodname'];
        $price = $_POST['price'];
        $intro = $_POST['intro'];
        $size = $_POST['size'];
        $img = $_POST['img'];
        $count = $_POST['count'];
        $pro = new Product($goodname,$price,$intro,$size,$img,$count);
        $service->updateProduct($id,$pro);
        break;
    case 'select':
        $service->selectProduct();
        break;
}