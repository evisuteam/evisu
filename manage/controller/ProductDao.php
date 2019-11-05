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
        $Type1 = $_POST['Type1'];
        $Type2 = $_POST['Type2'];

        insertProduct($pro);
        break;
    case 'delete':
        deleteProduct();
        break;
    case 'update':

        break;
    case 'selete':

        break;
}
