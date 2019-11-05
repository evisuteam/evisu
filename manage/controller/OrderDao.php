<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 22:02
 */
require_once ('../model/OrderService.php');
require_once ('../beans/Order.php');

//$type = $_POST['type'];
$service = new OrderService();

$uid = $_POST['uid'];
$goodlist = $_POST['goodlist'];
$timeset = $_POST['timeset'];
$status = $_POST['status'];
$num = $_POST['num'];

$order = new Order($uid,$goodlist,$timeset,$status,$num);
$service->orderSelect($order);
