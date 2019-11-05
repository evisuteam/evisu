<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 17:11
 */
require_once ('../model/ProductService.php');
require_once ('../beans/Product.php');

$service = new ProductService();
$type = $_POST['type'];

switch($type){
    case 'insert':

        break;
    case 'delete':

        break;
    case 'update':

        break;
    case 'selete':

        break;
}
