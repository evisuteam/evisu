<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/5
 * Time: 11:57
 */
require_once('../model/ShoppingcartService.php');
require_once('../beans/Shoppingcart.php');

$service = new ShoppingcartService();
$type = $_POST['type'];

switch($type){
    case 'select':
        $service->selectShopping();
        break;
    case 'insert':
        $userId = $_POST['userId'];
        $goodId = $_POST['goodId'];
        $size = $_POST['size'];
        $count = $_POST['count'];
        $shop = new Shoppingcart($userId,$goodId,$size,$count);
        $service->insertShopping($shop);
        break;
    case 'delete':
        $id = $_POST['id'];
        $service->deleteShopping($id);
        break;
}