<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 22:02
 */
require_once ('../model/OrderService.php');
require_once ('../beans/Order.php');

$type = $_POST['type'];
$service = new OrderService();

switch($type){
    case 'selete':
        $service->orderSelect();
        break;
    case 'insert':
        $userId = $_POST['userId'];
        $goodlist = $_POST['goodlist'];
        $timeset = $_POST['timeset'];
        $status = $_POST['status'];
        $number = $_POST['number'];
        $order = new Order($userId,$goodlist,$timeset,$status,$number);
        $service->orderInsert($order);
        break;
    case 'delete':
        $id = $_POST['id'];
        $service->orderDelete($id);
}

if($status == '0'){
    $service->waitreceiveSelect();
}else if($status == '1'){
    $service->deliveredSelect();
}

$order = new Order($uid,$goodlist,$timeset,$status,$num);
$service->orderSelect($order);
