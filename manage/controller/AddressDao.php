<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/4
 * Time: 16:25
 */
require_once ('../model/AddressService.php');
require_once ('../beans/Address.php');

$type = $_POST['type'];
$service = new AddressService();

switch($type){
    case 'insert':
        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $region = $_POST['region'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $add = new Address($userId,$name,$tel,$region,$address,$status);
        $service->insertAddress($add);
        break;
    case 'delete':
        $id = $_POST['id'];
        $service->deleteAddress($id);
        break;
    case 'update':
        $id = $_POST['id'];
        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $region = $_POST['region'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $add = new Address($userId,$name,$tel,$region,$address,$status);
        $service->updateAddress($id,$add);
        break;
    case 'selete':
        $service->selecteAddress();
        break;
}
