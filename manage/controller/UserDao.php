<?php
/**
 * Created by PhpStorm.
 * User: LX
 * Date: 2019/11/1
 * Time: 19:36
 */
require_once ('../model/UserService.php');
require_once ('../beans/User.php');

$type = $_POST['type'];
$service = new UserService();

if($type == 'login'){
    $name = $_POST['username'];
    $pswd = $_POST['password'];

    $service->userLogin($name,$pswd);
}else if($type == 'register'){
    $name = $_POST['username'];
    $pswd = $_POST['password'];
    $tel = $_POST['tel'];
    $sex = $_POST['sex'];
    $user = new User($name,$pswd,$tel,$sex);

    $service->addUser($user);
}