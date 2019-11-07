<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 17:11
 */
require_once('../model/DetailsService.php');
require_once('../beans/Details.php');

$service = new DetailsService();
$type = $_POST['type'];

switch($type){
    case 'insert':
        $Type1 = $_POST['Type1'];
        $Type2 = $_POST['Type2'];
        $goodname = $_POST['goodname'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $number = $_POST['number'];
        $count = $_POST['count'];
        $img = $_POST['img'];
        $imglist = $_POST['imglist'];
        $detail = $_POST['detail'];
        $showimglist = $_POST['showimglist'];
        $det = new Det($Type1,$Type2,$goodname,$size,$price,$number,$count,$img,$imglist,$detail,$showimglist);
        $service->insertDetails($det);
        break;
    case 'delete':
        $goodId = $_POST['goodId'];
        $service->deleteDetails($goosId);
        break;
    case 'select':
        $service->selectDetails();
        break;
}
