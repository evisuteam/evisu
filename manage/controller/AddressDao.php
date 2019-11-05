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


